<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Matiere;
use App\Classe;
use App\Cycle;
use App\Student;
use App\Devoire;
use App\Absence;
use App\Emploi;
use Illuminate\Support\Carbon;
use App\prof_classe;
use Illuminate\Support\Facades\Auth;

class Devoires extends Controller
{
    public function __construct()
    {
        Carbon::setlocale('fr');
    }
    public function Devoires()
    {
        $devoires=array();
        $classes = prof_classe::where('prof',Auth::guard('prof')->user()->id)->get();
        foreach ($classes as $class) {
            $n = 0;
            $devoires1 = Devoire::where('class', $class->class)->where('matiere', $class->matiere)->get();
            foreach ($devoires1 as $key) {
                $class = Classe::find($key->class);
                $devoires1[$n]->class = $class;
                $matiere = Matiere::find($key->matiere);
                $devoires1[$n]->matiere = $matiere;
                array_push($devoires, $devoires1[$n]);
                $n++;
            }
        }

        $n = 0;
        foreach ($classes as $class) {
            $class = Classe::find($class->class);
            $classes[$n]->class_id = $class->id;
            $classes[$n]->class_name = $class->name;
            $n++;
        }
        $cycles = Cycle::get();
        return view('prof.devoires', ['devoires' => $devoires,'cycles' => $cycles,'classes' => $classes]);
    }

    public function DevoiresPost()
    {
        request()->validate([
            'class' => 'required',
            'date' => 'required',
        ]);

        $classes = prof_classe::where('prof',Auth::guard('prof')->user()->id)->where('class',request()->class)->get();
        foreach ($classes as $class) {
            $matiere = Matiere::find($class->matiere);
        }

        if (request()->hasFile('image')) {
            $image = request()->image;
            //$image1 = time().'1'.$image->getClientOriginalExtension();
                $image1 = time().'.'.$image->getClientOriginalExtension();
            request()->image->move('images/devoires/', $image1);
            $image = 'images/devoires/'.$image1;
        }else{
            $image = '';
        }

        $devoire = new Devoire();

        $devoire->class = request()->class;
        $devoire->matiere = $matiere->id;
        $devoire->date2 = request()->date;
        $devoire->date1 = date('d/m/Y');
        $devoire->image = $image;
        $devoire->desc = request()->desc;

        $devoire->save();

        request()->session()->flash('create', "l'ajoute a été succes");

        return back();
    }

    public function DevoiresEdit()
    {
        request()->validate([

            'date' => 'required',
        ]);

        $devoire = Devoire::find(request()->id);

        if (request()->hasFile('image')) {
            $image = request()->image;
            //$image1 = time().'1'.$image->getClientOriginalExtension();
                $image1 = time().'.'.$image->getClientOriginalExtension();
            request()->image->move('images/devoires/', $image1);
            $image = 'images/devoires/'.$image1;
            if ($devoire->image != "") {
                if(file_exists(public_path().'/'.$devoire->file))
                {
                    unlink(public_path().'/'.$devoire->file);
                }else{
                    unlink($devoire->file);
                }
            }
        }else{
            $image = $devoire->image;
        }

        $devoire->date2 = request()->date;
        $devoire->image = $image;
        $devoire->desc = request()->desc;

        $devoire->save();

        request()->session()->flash('create', "le devoire a été modifier avec succès");

        return back();
    }

    public function delete_devoire($id)
    {
        $devoire = Devoire::findOrFail($id);

        if ($devoire->image != "") {
            if(file_exists(public_path().'/'.$devoire->image))
            {
                unlink(public_path().'/'.$devoire->image);
            }else{
                unlink($devoire->image);
            }
        }
        $devoire->delete();

        session()->flash('delete','Le devoire est supprimer ');

        return back();

    }

    public function Absences()
    {
        $classes = prof_classe::where('prof',Auth::guard('prof')->user()->id)->get();
        $day = date('D') ; 
        $classe = array();
        $students = array();
        $k = 0;
        $heure = '';
        // if (7 <= date('H') and date('H') <= 20) {
            if (date('i') < 30) {
                $t = date('H') -1;
                if ($t < 10) {
                    $t = '0'.$t;
                }
                $heure = $t.'h30';
                $to = $t+1;
                if ($to < 10) {
                    $to = '0'.$to;
                }
                $heure1 = $to.'h30';
            }else{
                $t = date('H');
                if ($t < 10) {
                    $t = '0'.$t;
                }
                $heure = $t.'h30';
                $to = $t+1;
                if ($to < 10) {
                    $to = '0'.$to;
                }
                $heure1 = $to.'h30';
            }

            if ($day == 'Mon') {
                $jour = 'lundi';
            }elseif($day == 'Tue') {
                $jour = 'mardi';
            }elseif($day == 'Wed') {
                $jour = 'mercredi';
            }elseif($day == 'Thu') {
                $jour = 'jeudi';
            }elseif($day == 'Fri') {
                $jour = 'vendredi';
            }elseif($day == 'Sat') {
                $jour = 'samedi';
            }elseif($day == 'Sun') {
                $jour = '';
            }
            $classe_actuel = 'rien';


            foreach ($classes as $class) {
                $emploi = Emploi::where('class' ,$class->class)
                                ->where('matiere' ,$class->matiere)
                                ->where('heur',$heure)
                                ->where('jour',$jour)->first();
                if ($emploi) {
                    $classe_actuel = $emploi->class;
                }
            }
            
            $classe = Classe::find($classe_actuel);
            if ($classe_actuel == 'rien') {
                $k = 0;
            }else{
                $k = 1;
                for ($i=1; $i < 100; $i++) { 
                    $t --;
                    
                    $hm = $t.'h30';
                    $emploi = Emploi::where('class' ,$classe_actuel)->where('matiere' ,$class->matiere)->where('heur',$hm)->where('jour',$jour)->get();
                    
                    if (count($emploi) > 0) {
                        $heure = $hm;
                    }else{
                        $i = 100;
                    }
                    
                }
                for ($i=1; $i < 100; $i++) {

                    $t ++;
                    $hm = $t.'h30';
                    $emploi = Emploi::where('class' ,$classe_actuel)->where('matiere' ,$class->matiere)->where('heur',$hm)->where('jour',$jour)->get();
                    
                    if (count($emploi)) {
                        $tot = $t+1;
                        $heure1 = $tot.'h30';
                    }else{
                        // dd('makhdamch'.$hm.' => ' . $heure);
                        $i = 100;
                    }
                }
            }

            $oo = 0;
            // dd($heure.' => '.$heure1);
            if ($classe_actuel !== 'rien') {

                $students = Student::where('class', $classe->id)->get();

                foreach ($students as $student) {
                    $absences = Absence::where('student',$student->id)->where('heure',$heure)->where('heure1',$heure1)->where('date',date('Y-m-d'))->where('prof',Auth::guard('prof')->user()->id)->get();
                    $students[$oo]->etat = 'present';
                    $students[$oo]->desc = '';
                    foreach ($absences as $absence) {
                        $students[$oo]->etat = $absence->etat;
                        $students[$oo]->desc = $absence->desc;
                    }
                    $oo++ ;
                }

            }
            
        // }
        //dd($k);
        return view('prof.absences', [
                                    'classes' => $classes,
                                    'students' => $students,
                                    'classe' => $classe,
                                    'k' => $k,
                                    'jour' => $jour,
                                    'heure' => $heure,
                                    'heure1' => $heure1,
                                    ]);
    }

    public function Absences1($id)
    {
        $classes = prof_classe::where('prof',Auth::guard('prof')->user()->id)->get();
        $classe = prof_classe::where('prof',Auth::guard('prof')->user()->id)->where('class',$id)->get();
        $students = Student::where('class', $id)->orderBy('class_num', 'ASC')->get();
        $n=0;
        foreach ($classes as $class) {
            $class = Classe::find($class->class);
            $classes[$n]->class_id = $class->id;
            $classes[$n]->class_name = $class->name;
            $n++;
        }

        return view('prof.absences', ['classes' => $classes,'classe' => $classe,'students' => $students]);
    }
}
