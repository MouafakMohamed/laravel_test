<?php

namespace App\Http\Controllers\Prof;

use App\Annance;
use App\Categorie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\Classe;
use App\Club;
use App\Student;
use App\Student_file;
use App\Transport;
use App\Parent_student;
use App\Parents;
use App\User;
use App\Staff;
use App\Frai;
use App\Cycle;
use App\Examen;
use App\Trajet;
use App\Friends;
use App\Timeline;
use App\Student_image;
use App\prof_classe;
use App\SalleModel;
use App\Matiere;
use App\Note;
use App\Club_Students;
use App\Exam_class;
use App\Prof;
use App\Salaire;

class Students extends Controller
{
    public function __construct()
    {
        Carbon::setlocale('fr');
    }
    
    public function ClassProfil($id)
    {
        $class = Classe::find($id);

        $class1 = prof_classe::where('class', $id)->where('prof', Auth::guard('prof')->user()->id)->count();
        if ($class1 === 0) {
            return view('errors.404');
        }

        $students = Student::where('class', $id)->orderBy('class_num', 'ASC')->get();

        return view('prof/class_profil', ['class' => $class, 'students' => $students]);
    }

    public function ClassProfilEdit()
    {
        request()->validate([
            'class_num' => 'required'
        ]);

        $student = Student::find(request()->id);
        $test = Student::where('class_num', request()->class_num)->where('class', request()->class)->get();
        foreach ($test as $key) {
            request()->session()->flash('delete', 'Ce numéro est déja utuliser par une autre éléve');

            return back();
        }

        $student->class_num = request()->class_num;

        $student->save();

        session()->flash('create', 'Le numéro est modifier avec succés');

        return back();

    }

    public function student_profil($id)
    {
        $student = Student::findOrFail($id);
        $class = prof_classe::where('class', $student->class)->where('prof', Auth::guard('prof')->user()->id)->count();
        if ($class === 0) {
            return view('errors.404');
        }
        $files = Student_file::where('student_id', $id)->get();
        $transport = Transport::find($student->transport);
        $transports = Transport::get();
        $parent = Parent_student::where('student',$id)->get();
        $categorie = Categorie::find($student->categorie);
        $student->categorie = $categorie->name;
        $n = 0;
        $t = 0;
        $freres = array();
        foreach ($parent as $key) {
            $item = Parents::find($key->parent);
            $parent[$n]->parent = $item;
            $relations =  Parent_student::where('parent',$parent[$n]->parent->id)->get();
            foreach ($relations as $row) {
                $student1 = Student::find($row->student);
                $freres[$t] = $student1;
                $t++;
            }
            
            $n++;
        }
        if (date('m') >= 9) {
            $year = date('Y');
        }else{
            $year = date('Y')-1;
        }
        $m = '09';
        $n = 0;
        $frais = [];
        for ($i=0; $i < 10; $i++) { 
                    $salaires = Frai::where('student', $student->id)->where('date', $m.'-'.$year)->get();
                    if (count($salaires) != 0) {
                        foreach ($salaires as $salaire) {
                            $frais[$n] = $salaire;
                        }
                        if ($m == '12') {
                            $m = '01';
                            $year = $year+1;
                        }else{
                            $m = $m+1;
                            if ($m < 10) {
                                $m = '0'.$m;
                            }
                        }
                        $n++;
                    }else{
                        $m = $m+1;
                        if ($m < 10) {
                            $m = '0'.$m;
                        }
                    }
        }
        $cycle = Cycle::find($student->cycle);
        $cycles = Cycle::where('categorie', $student->categorie)->get();
        $trajet = Trajet::find($student->trajet);
        $trajets = Trajet::where('transport', $student->transport)->get();
        $class = Classe::find($student->class);
        $classes = Classe::where('cycle_id', $student->cycle)->get();
        $friend = Friends::where('student1', $student->id)->orwhere('student2', $student->id)->take(9)->get();
        $a = 0;
        $friends = array();
        foreach ($friend as $ishe) {
            if ($ishe->student1 == $student->id) {
                $friend1 = Student::find($ishe->student2);
                $friends[$a] = $friend1;
                $a++;
            }elseif($ishe->student2 == $student->id){
                $friend1 = Student::find($ishe->student1);
                $friends[$a] = $friend1;
                $a++;
            }
        }
        $timeline = Timeline::where('student_id', $student->id)->orderBy('id', 'DESC')->take(4)->get();
        $k = 0;
        foreach($timeline as $timeline1){
            if ($timeline1->name == 'admin') {
                $user = User::find($timeline1->by);
                $timeline[$k]->by = $user->nom;
                $timeline[$k]->image_user = $user->logo;
                $timeline[$k]->date = Carbon::parse($timeline1->created_at)->diffForHumans();
            }elseif($timeline1->name == 'prof'){
                $user = Prof::find($timeline1->by);
                $timeline[$k]->image_user = $user->image;
                $timeline[$k]->by = $user->pre.' '.$user->nom;
                $timeline[$k]->date = Carbon::parse($timeline1->created_at)->diffForHumans();
            }elseif($timeline1->name == 'staff'){
                $user = Staff::find($timeline1->by);
                $timeline[$k]->image_user = $user->image;
                $timeline[$k]->by = $user->pre.' '.$user->nom;
                $timeline[$k]->date = Carbon::parse($timeline1->created_at)->diffForHumans();
            }elseif($timeline1->name == 'parent'){
                $user = Parents::find($timeline1->by);
                $timeline[$k]->image_user = $user->image;
                $timeline[$k]->by = $user->pre.' '.$user->nom;
                $timeline[$k]->date = Carbon::parse($timeline1->created_at)->diffForHumans();
            }
            $k++;
        }
        $k = 0;
        $timelines = Timeline::where('student_id', $student->id)->orderBy('id', 'DESC')->get();
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
                $user = Parents::find($timeline2->by);
                $timelines[$k]->image_user = $user->image;
                $timelines[$k]->by = $user->pre.' '.$user->nom;
                $timelines[$k]->date = Carbon::parse($timeline2->created_at)->diffForHumans();
            }
            $k++;
        }
        $images = Student_image::where('student_id', $student->id)->take(9)->get();
        $a = 0;
        if ($student->sex == 'Garçon') {
            return view('prof.student_profil_g', [
                'student' => $student,
                'class' => $class,
                'images' => $images,
                'friends' => $friends,
                'freres' => $freres,
                'parents' => $parent,
                'classes' => $classes,
                'transport' => $transport,
                'transports' => $transports,
                'cycle' => $cycle,
                'cycles' => $cycles,
                'trajet' => $trajet,
                'trajets' => $trajets,
                'timeline' => $timeline,
                'timelines' => $timelines,
                'files' => $files,
                'frais' => $frais
                ]);
        }elseif ($student->sex == 'Fille') {
            return view('prof.student_profil_f', [
                'student' => $student,
                'class' => $class,
                'images' => $images,
                'friends' => $friends,
                'freres' => $freres,
                'parents' => $parent,
                'classes' => $classes,
                'transport' => $transport,
                'transports' => $transports,
                'cycle' => $cycle,
                'cycles' => $cycles,
                'trajet' => $trajet,
                'trajets' => $trajets,
                'timeline' => $timeline,
                'timelines' => $timelines,
                'files' => $files,
                'frais' => $frais
                ]);
        }

    }

    public function add_timeline()
    {
        request()->validate([
            'sujet' => ['required', 'string', 'max:255'],
        ]);

        if (request()->hasFile('image')) {
            $image = request()->image;
            $image1 = time().'1.'.$image->getClientOriginalExtension();
            request()->image->move('images/files/', $image1); 
            $image = 'images/files/'.$image1;
        }else{
            $image = '';
        }
        Timeline::create([
            'name' => 'prof',
            'sujet' => request()->sujet,
            'image' => $image,
            'date' => date('d/m/Y'),
            'student_id' => request()->id,
            'by' => Auth::guard('prof')->user()->id,
        ]);

        session()->flash('create', 'Le commentaire est ajouter avec succès');

        return back();
        
    }

    public function Examen()
    {
        $exams = Examen::where('prof', Auth::guard('prof')->user()->id)->get();
        $t = 0;
        foreach ($exams as $exam) {
            $classes1 = Exam_class::where('exam', $exam->id)->get();
            $p = 0;
            foreach ($classes1 as $classe) {
                $class = Classe::find($classe->class);
                $classes[$p] = $class;
                $p++;
            }
            $exams[$t]->classes = $classes;
            $t++;
        }
        $classes = prof_classe::where('prof',Auth::guard('prof')->user()->id)->get();
        $n = 0;
        foreach ($classes as $class) {
            $class1 = Classe::find($class->class);
            $classes[$n]->class_name =  $class1->name;
            $classes[$n]->class_id =  $class1->id;
            $n++;
        }
        return view('prof/exams', ['exams' => $exams ,'classes' => $classes]);
    }

    public function ExamenPost()
    {
        request()->validate([
            'name' => 'required',
            'class' => 'required',
            'image' => 'required||mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!empty(request()->image)) {
            $image = request()->image;
            $image1 = time().'1.'.$image->getClientOriginalExtension();
            request()->image->move('exams/', $image1); 
            $image = 'exams/'.$image1;
        }else{
            $image = '';
        }

        $examen = new Examen();
        $examen->name = request()->name;
        $examen->desc = request()->desc;
        $examen->prof = Auth::guard('prof')->user()->id;
        $examen->fichier = $image;

        $examen->save();

        foreach (request()->class as $class) {

            $test = prof_classe::where('class', $class)->where('prof', Auth::guard('prof')->user()->id)->get();
            foreach ($test as $key ) {
                $matiere = Matiere::find($key->matiere);
            }

           $classExam = new Exam_class();

           $classExam->class = $class;
           $classExam->exam = $examen->id;
           $classExam->matiere = $matiere->name;

           $classExam->save();
            
        }

        session()->flash('create', 'l\'examen est ajouter avec success');

        return back();
    }
    
    public function ExamenEdit()
    {
        request()->validate([
            'name' => 'required',
            'class' => 'required',
        ]);

        $id = request()->id;

        // dd(request()->class);

        $examen = Examen::findOrFail($id);

        $notes = Exam_class::where('exam', $id)->get(); 
        foreach ($notes as $note ) {
            $note->delete();
        }

        foreach (request()->class as $class) {

            $test = prof_classe::where('class', $class)->where('prof', Auth::guard('prof')->user()->id)->get();
            foreach ($test as $key ) {
                $matiere = Matiere::find($key->matiere);
            }

           $classExam = new Exam_class();

           $classExam->class = $class;
           $classExam->exam = $examen->id;
           $classExam->matiere = $matiere->name;

           $classExam->save();
            
        }

        if (!empty(request()->image)) {
            $image = request()->image;
            $image1 = time().'1.'.$image->getClientOriginalExtension();
            request()->image->move('exams/', $image1); 
            $image = 'exams/'.$image1;
            if(file_exists(public_path().'/'.$examen->fichier))
            {
                unlink(public_path().'/'.$examen->fichier);
            }else{
                unlink($examen->fichier);
            }
        }else{
            $image = $examen->fichier;
        }

        $examen->name = request()->name;
        $examen->desc = request()->desc;
        $examen->fichier = $image;

        $examen->save();

        session()->flash('create', 'l\'examen est modifier avec success');

        return back();
    }

    public function delete_exam($id)
    {
        $exam = Examen::findOrFail($id);
        $notes = Exam_class::where('exam', $id)->get(); 
        foreach ($notes as $note ) {
            $note->delete();
        }

        if ($exam->fichier != "") {
            if(file_exists(public_path().'/'.$exam->fichier)){
                unlink(public_path().'/'.$exam->fichier);
            }else{
                unlink($exam->fichier);
            }
        }
        $exam->delete();

        session()->flash('delete','Le\'exam est supprimer avec success ');

        return back();

    }

    public function Note()
    {
        $exams = Examen::get();
        $t = 0;
        $classes = prof_classe::where('prof',Auth::guard('prof')->user()->id)->get();
        $n = 0;
        foreach ($classes as $class) {
            $class1 = Classe::find($class->class);
            $classes[$n]->class_name =  $class1->name;
            $classes[$n]->class_id =  $class1->id;
            $n++;
        }
        $notes = Note::where('prof', Auth::guard('prof')->user()->id)->get();
        $ok = 0;
        foreach ($notes as $note) {
            $class = Classe::find($note->class);
            $student = Student::find($note->eleve);
            $exam = Examen::find($note->exam);
            $notes[$ok]->class = $class->name;
            $notes[$ok]->eleve = $student->nom.' '.$student->pre;
            $notes[$ok]->exam = $exam->name;
            $ok++;
        }
        return view('prof/notes', ['exams' => $exams ,'classes' => $classes,'notes' => $notes]);
    }

    public function NotePost()
    {
        request()->validate([
            'exam' => 'required',
            'note' => 'required',
            'eleve' => 'required',
            'class' => 'required',
        ]);

        $examen = new Note();
        $examen->exam = request()->exam;
        $examen->note = request()->note;
        $examen->eleve = request()->eleve;
        $examen->class = request()->class;
        $examen->prof = Auth::guard('prof')->user()->id;

        $examen->save();

        session()->flash('create', 'la note est enregistrer avec success');

        return back();
    }

    public function delete_note($id)
    {
        $note = Note::findOrFail($id);

        $note->delete();

        session()->flash('delete','La note est supprimer avec success ');

        return back();

    }

    public function clubs()
    {
        $clubs = Club::where('prof', Auth::guard('prof')->user()->id)->get();
        return view('prof/clubs', ['clubs' => $clubs]);
    }

    public function clubProfil($id)
    {
        $clubs = Club::where('prof', Auth::guard('prof')->user()->id)->where('id', $id)->get();
        foreach ($clubs as $club1) {
            $club = $club1;
        }
        
        $annonces = Annance::where('club', $club->id)->get();
        $t = 0;
        foreach ($annonces as $annonce) {
            $annonces[$t]->time = Carbon::parse($annonce->created_at)->diffForHumans();
            $t++;
        }
        $students = Club_Students::where('club' , $id)->get();
        $n = 0;
        foreach ($students as $eleve) {
            $student = Student::find($eleve->student);
            if (!empty($student)) {
                $students[$n]->nom = $student->nom.' '.$student->pre;
                $class = Classe::find($student->class);
                if (!empty($class)) {
                    $students[$n]->class = $class->name ;
                }else{
                    $students[$n]->class = 'pas trouvé';
                }
                $students[$n]->image = $student->image;
                $students[$n]->date = $eleve->date;
                $students[$n]->validate = $eleve->validate;
                $students[$n]->id = $eleve->id;
                $n++;
            }
        }
        return view('prof.club_profil', ['students' => $students,'club' => $club,'annonces' => $annonces]);
    }

    public function profil()
    {
        $salaires = Salaire::where('prof', Auth::guard('prof')->user()->id)->get();
        $salles = SalleModel::get();
        return view('prof.profil', ['salaires' => $salaires,'salles' => $salles]);
    }

    public function securité()
    {
        return view('prof.securité');
    }

    public function update_profil()
    {
                request()->validate([
                    'password' => 'required|string|max:30',
                    'npassword' => 'required|string|max:30|confirmed',
                ]);
                

                $admin = Prof::find(Auth::guard('prof')->user()->id);
                if (Hash::check(request()->password, $admin->password)) {
                    $admin->password = Hash::make(request()->npassword);
                    $admin->save();
                    request()->session()->flash('update','Le mot de passe modifier ');
            
                    return back();
                }else{
                    request()->session()->flash('delete','Le mot de passe est incorrect ');
            
                    return back();
                }
        
    }

    public function annonce()
    {
        request()->validate([
            'title' => 'required',
            'text' => 'required',
            'club' => 'required',
        ]);

        $annonce = new Annance();

        $annonce->title = request()->title;
        $annonce->text = request()->text;
        $annonce->club = request()->club;

        $annonce->save();

        session()->flash('create', 'L\'annonce est crée avec success');

        return back();
    }

    public function delete_annonce($id)
    {
        $annonce = Annance::findOrFail($id);

        $annonce->delete();

        session()->flash('delete', 'l\'annonce est supprimer avec success');

        return back();
    }
}
