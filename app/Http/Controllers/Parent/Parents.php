<?php

namespace App\Http\Controllers\Parent;

use App\Classe;
use App\Http\Controllers\Controller;
use App\Matiere;
use App\Parent_student;
use App\Prof;
use App\Devoire;
use App\Timeline;
use App\prof_classe;
use App\SalleModel;
use App\Student;
use App\User;
use App\Frai;
use App\Emploi;
use App\Parents as AppParents;
use App\Prix;
use App\Staff;
use App\Student_image;
use App\Tracabilite;
use App\Trajet;
use App\Transport;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class Parents extends Controller
{
    public function __construct()
    {
        Carbon::setlocale('fr');
    }

    public function index()
    {
        $students = Parent_student::where('parent', Auth::guard('parent')->user()->id)->get();
        $n = 0;
        foreach ($students as $student1) {
            $student = Student::find($student1->student);
            $students[$n]->student = $student;
            $n++;
        }
       return view('parent.choose', ['students' => $students]);
    }

    public function Dashboard()
    {
        return view('parent.home');
    }

    public function Dashboard_post()
    {
        request()->validate(['id' => 'required']);
        $student = Student::find(request()->id);
        session()->put('student', $student);
        return view('parent.home');
    }

    public function Professeurs()
    {

        $profs = prof_classe::where('class', session()->get('student')->class)->get();
        $n = 0;
        foreach ($profs as $prof1) {
            $prof = Prof::find($prof1->prof);
            $profs[$n]->prof = $prof;
            $matiere = Matiere::find($prof1->matiere);
            $profs[$n]->matiere = $matiere->name;
            $n++;
        }
        return view('parent.Professeurs', ['profs' => $profs]);
    }

    public function devoirs()
    {
        $devoires = array();
        $class_prof = prof_classe::where('class', session()->get('student')->class)->get();
        foreach ($class_prof as $value) {
            $class = Classe::find($value->class);
            $devoire = Devoire::where('class' , $class->id)->whereDate('date2', '>=', date('Y-m-d'))->get();
            foreach ($devoire as $value1) {
                $matiere = Matiere::find($value1->matiere);
                $value1->matiere = $matiere->name; 
                array_push($devoires, $value1);
            }
        }

        return view('parent.devoires', ['devoires' => $devoires]);
    }

    public function gallery()
    {
        $images = Student_image::where('student_id' , session()->get('student')->id)->get();
        return view('parent.gallery', ['images' => $images]);
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
                $emploi = Emploi::where('class', session()->get('student')->class)->where('heur',$times[$i])->where('jour',$day)->get();
                $emploi1 = Emploi::where('class', session()->get('student')->class)->get();
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

        return view('parent.Emploi', [
                                            'times' => $times,
                                            'days' => $days,
                                            'cours_id' => $cours_id,
                                            'days' => $days,
                                            'cours' => $cours,
                                            'cours1' => $cours1,
                                            ]);
    }

    public function Transport()
    {
        $transport = Transport::find(session()->get('student')->transport);
        $accom = Staff::find($transport->accom);
        $choffeur = Staff::find($transport->choffeur);
        if (session()->get('student')->trajet == null) {
            $transport->trajet = '';
        }else{
            $trajet = Trajet::find(session()->get('student')->trajet);
            $transport->trajet = $trajet->name;
        }
        $transport->accom = $accom;
        $transport->choffeur = $choffeur;

        return view('parent.transport', ['transport'=> $transport]);
    }

    public function Timeline()
    {
        $timelines = Timeline::where('student_id', session()->get('student')->id)->orderBy('id', 'DESC')->get();
        $k = 0;
        foreach($timelines as $timeline2){
            if ($timeline2->name == 'admin') {
                $user = User::find($timeline2->by);
                $timelines[$k]->by = $user->nom;
                $timelines[$k]->image_user = $user->logo;
                $timelines[$k]->date = Carbon::parse($timeline2->created_at)->diffForHumans();
            }elseif($timeline2->name == 'prof'){
                $user = Prof::find($timeline2->by);
                $timelines[$k]->image_user = $user->image;
                $timelines[$k]->by = $user->pre.' '.$user->nom;
                $timelines[$k]->date = Carbon::parse($timeline2->created_at)->diffForHumans();
            }elseif($timeline2->name == 'staff'){
                $user = Staff::find($timeline2->by);
                $timelines[$k]->image_user = $user->image;
                $timelines[$k]->by = $user->pre.' '.$user->nom;
                $timelines[$k]->date = Carbon::parse($timeline2->created_at)->diffForHumans();
            }elseif($timeline2->name == 'parent'){
                $user = AppParents::find($timeline2->by);
                $timelines[$k]->image_user = $user->image;
                $timelines[$k]->by = $user->pre.' '.$user->nom;
                $timelines[$k]->date = Carbon::parse($timeline2->created_at)->diffForHumans();
            }
            $k++;
        }

        dd($timelines);

        $counter = count($timelines);
        return view('parent.timeline', ['timelines' => $timelines,'counter' => $k]);
    }

    public function add_timeline()
    {
        request()->validate([
            'sujet' => ['required'],
        ]);

        if (request()->hasFile('image')) {
            $image = request()->image;
            $image1 = time().'1.'.$image->getClientOriginalExtension();
            request()->image->move('images/files/', $image1); 
            $image = 'images/files/'.$image1;
        }else{
            $image = '';
        }

        $student = Student::findOrFail(session()->get('student')->id);

        Timeline::create([
            'name' => 'admin',
            'sujet' => request()->sujet,
            'image' => $image,
            'date' => date('d/m/Y'),
            'student_id' => session()->get('student')->id,
            'by' => Auth::guard('parent')->user()->id,
        ]);

        $tra = new Tracabilite();
        $tra->name = 'Parents';
        $tra->genre = 'ajouter';
        $tra->text = ' a ajouter une commentaire sur le profil de l\'éléve "'.$student->nom.' '.$student->pre.'"';

        $tra->save();

        session()->flash('create', 'Le commentaire est ajouter avec succès');

        return back();
        
    }

    public function Download_timeline_file($id){

        $file = Timeline::findOrFail($id);

        if(file_exists(public_path().$file->image))
        {
            return response()->download(public_path().'/'.$file->image);
        }else{
            return response()->download($file->image);
        }
    }

    public function Frai()
    {
        $student = session()->get('student');
        if (date('m') >= 9) {
            $year = date('Y');
        }else{
            $year = date('Y')-1;
        }
        $date1 = explode('-', $student->date_d);
        $m = $date1[1];
        $y = $date1[0];
        
        if ($y == $year) {
            if ($m < 9) {
                $m = '09';
                if (date('m') < 9) {
                    $t = date('m') + 4;
                }else{
                    $t = date('m')-8;
                }
            }else{
                if (date('m') < 9) {
                    $t = date('m') + 13 - $m;
                }else{
                    $t = date('m') + 1 - $m;
                }
            }
        }elseif ($y == $year+1) { 
            $year = $y;
            if (date('m') < 7 ) {
                $t = date('m')-$m;
            }elseif(date('m') == 7 or date('m') == 8){
                $t = 7-$m;
            }
        }elseif ($y < $year) {
                $m = '09';
                if(date('m') < 9){
                    if (date('m') == 7 or date('m') == 8) {
                        $t = 6 + 4;
                    }else{
                        $t = date('m') + 4; 
                    }
                }else{
                    $t = 0;
                    if (date('m') == 7 or date('m') == 8) {
                        $t = 10;
                    }elseif(date('m') < 9){
                        $t = date('m') - $m;
                    }else{
                        $t = 1;
                    }
                }
        }
        $mois = array();
        $prix = Prix::where('student', $student->id)->first();
        $data15 = explode('-', $student->date_d);
        $bigint = $data15[1];
        
        $show = 'oui';
        for ($i=0; $i < 10; $i++) { 
            if($prix['m'.$bigint] > 0){
                $show = 'non';
            }
            if ($bigint == '06') {
                $i = 100;
            }elseif($bigint == 12){
                $bigint = 0;
            }
            $bigint++;
            if ($bigint < 10) {
                $bigint = '0'.$bigint;
            }
        }
        for ($i=0; $i < $t; $i++) { 
            $salaire = Frai::where('student', $student->id)->where('date', $m.'-'.$year)->get();
            $ok = $m.'-'.$year; 
            if (count($salaire) == 0) {
                $ok1 = array('ok' => $ok,'etat' => 'non','prix' => $prix['m'.$m] );
                array_push($mois,$ok1);
                //array_push($mois,);
            }else{
                $ok1 = array('ok' => $ok,'etat' => 'oui','prix' => $prix['m'.$m] );
                array_push($mois,$ok1);
                //array_push($pays,);
            }
            if ($m == 12) {
                $m = 1;
            }else{
                $m = $m+1;
            }
            if ($m < 10) {
                $m = '0'.$m;
            }
        }
        $student->mois = $mois;
        return view('parent.Frai', ['student' => $student]);
    }

    public function logout()
    {
        Auth::guard('parent')->logout();
        return redirect('space/login');
    }
}
