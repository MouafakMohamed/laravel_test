<?php

namespace App\Http\Controllers\Space;

use App\Classe;
use App\Commentaire;
use App\Cour;
use App\Cycle;
use App\Devoire;
use App\Http\Controllers\Controller;
use App\Prof;
use App\Emploi;
use App\Matiere;
use App\SalleModel;
use App\prof_classe;
use App\Tracabilite;
use App\Student as AppStudent;
use App\Student_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Student extends Controller
{
    public function index()
    {
        $student = AppStudent::find(Auth::guard('student')->user()->id);
        $classe = Classe::find($student->class);
        $student->class = $classe->name;
        return view('student.menu', ['student' => $student]);
    }

    public function Profs()
    {
        $profs = prof_classe::where('class' , Auth::guard('student')->user()->class)->get();
        $n = 0;
        foreach ($profs as $prof1) {
            $prof = Prof::find($prof1->prof);
            $profs[$n]->prof = $prof;
            $matiere = Matiere::find($prof1->matiere);
            $profs[$n]->matiere = $matiere->name;
            $n++;
        }
        return view('student.Profs1', ['profs' => $profs]);
    }

    public function photos()
    {
        $images = Student_image::where('student_id' , Auth::guard('student')->user()->id)->get();
        return view('student.gallery', ['images' => $images]);
    }

    public function devoires()
    {
        $devoires = array();
        $class_prof = prof_classe::where('class', Auth::guard('student')->user()->class)->get();
        foreach ($class_prof as $value) {
            $class = Classe::find($value->class);
            $devoire = Devoire::where('class' , $class->id)->whereDate('date2', '>=', date('Y-m-d'))->get();
            foreach ($devoire as $value1) {
                $matiere = Matiere::find($value1->matiere);
                $value1->matiere = $matiere->name; 
                array_push($devoires, $value1);
            }
        }

        return view('student.devoires', ['devoires' => $devoires]);
    }

    public function Horaire()
    {
        $times = array('8h30', '9h30', '10h30', '11h30', '12h30', '13h30', '14h30', '15h30', '16h30', '17h30', '18h30');
        $days = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi');
        $cours = array();
        for ($i = 0; $i < 10; $i++) { 
            $cours[$i] = array();
            foreach ($days as $day) {
                $cours[$i][$day] = '';
                $cours1[$i][$day] = '';
                $cours_id[$i][$day] = '';
                $emploi = Emploi::where('class',Auth::guard('student')->user()->class)->where('heur',$times[$i])->where('jour',$day)->get();
                $emploi1 = Emploi::where('class',Auth::guard('student')->user()->class)->get();
                foreach ($emploi as $key) {
                    if (!empty($key)) {
                            $salla = SalleModel::find($key->salle);
                            $mata = Matiere::find($key->matiere);
                            $cours[$i][$day] = $mata->name;
                            $cours_id[$i][$day] = $key->id;
                            $cours1[$i][$day] = $salla->name;
                            
                    }
                }
            }
        }

        return view('student.Emploi', [
                                            'times' => $times,
                                            'days' => $days,
                                            'cours_id' => $cours_id,
                                            'days' => $days,
                                            'cours' => $cours,
                                            'cours1' => $cours1,
                                            ]);
    }

    public function Cours()
    {
        $cycle = Cycle::find(Auth::guard('student')->user()->cycle);
        $cours = Cour::where('cycle', Auth::guard('student')->user()->cycle)->get();
        return view('student.cours', ['cours' => $cours]);
    }


    public function Idee()
    {
        return view('student.idee');
    }

    public function get_idee()
    {
        request()->validate([
            'titre' => 'required|min:8',
            'note' => 'required',
        ]);

        $commentaire = new Commentaire();

        $commentaire->titre = request()->titre;
        $commentaire->note = request()->note;
        $commentaire->student = Auth::guard('student')->user()->id;

        $commentaire->save();

        $tra = new Tracabilite();
        $tra->name = Auth::guard('student')->user()->pre.' '.Auth::guard('student')->user()->nom;
        $tra->genre = 'ajouter';
        $tra->text = ' a ajouter un nouveau commentaire';

        $tra->save();

        request()->session()->flash('create', 'Le commentaire est envoyé avec success .');

        return back();

    }
}
