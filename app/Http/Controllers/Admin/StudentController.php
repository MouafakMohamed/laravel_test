<?php

namespace App\Http\Controllers\admin;

use App\Classe;
use App\File;
use App\Cycle;
use App\Devoire;
use App\Frai;
use App\Friends;
use App\Http\Controllers\Controller;
use App\Matiere;
use App\Parent_student;
use App\Parents;
use App\Student;
use App\Absence;
use App\Student_file;
use App\Student_image;
use App\Timeline;
use App\Tracabilite;
use App\Categorie;
use App\Exam_class;
use App\Examen;
use App\Frai_insc;
use App\Note;
use App\Prix;
use App\Prof;
use App\Staff;
use App\Trajet;
use QrCode;
use Illuminate\Http\Request;
use App\Transport;
use App\User;
use App\Visiter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function __construct()
    {
        Carbon::setlocale('fr');
        if (empty(session('anne_actuelle'))) {
            $anne_actuelle = '';
            if (date('m') >= 9) {
                $qsqsqsdqs = date('Y')+1;
                $anne_actuelle = date('Y').'/'.$qsqsqsdqs;
            }else{
                $qsqsqsdqs = date('Y')-1;
                $anne_actuelle = $qsqsqsdqs .'/'.date('Y');
            }
            session()->put('anne_actuelle' , $anne_actuelle);
        }
    }

    function add_salam(){
        $image = request()->file('image');
        $image1 = time().'111111111111111111111111111111111.'.$image->getClientOriginalExtension();
        // request()->image->move('images/students/', $image1); 
        // Storage::disk('public')->putFileAs('images/students', $image, $image1);
        dd($image1);
        // $image = 'images/students/'.$image1;
        

        dd('salam');
    }

    public function student ()
    {
        $transport = Transport::get();
        $categories = Categorie::get();

        return view('admin.add_student',['transports' => $transport,'categories' => $categories]);
    }

    public function studentPost()
    {
        
        request()->validate([
            'nom' => ['required','string','max:20'],
            'pre' => ['required','string','max:20'],
            'categorie' => ['required','string','max:20'],
            'cycle' => ['required','string','max:20'],
            'sex' => ['required','string','max:20'],
            'payement' => ['required'],
        ]);

        if (request()->payement == 'Autre') {
            request()->validate([
                'number' => ['required','string'],
                'prix' => ['required','string'],
            ]);
        }elseif(request()->payement == 'anné' or request()->payement == 'mois'){
            request()->validate([
                'prix' => ['required','string'],
            ]);
        }

        if (request()->hasFile('image')) {
            $image = request()->image;
            $image1 = time().'1.'.$image->getClientOriginalExtension();
            request()->image->move('images/students/', $image1); 
            $image = 'images/students/'.$image1;
        }else{
            if (request()->sex == ('Garçon')) {
                $image = 'images/students/garcon.jpg';
            }else{
                $image = 'images/students/fille.jpg';
            }
        }
        
        $categorie = Categorie::findOrFail(request()->categorie);
        
        
        if (request()->id1) {
            $id1 = request()->id1;
        }else{
            if ($categorie->name === 'Préscolaire') {
                for ($i=0; $i < 100 ; $i++) { 
                    $id1 = 'CS'.rand(11111111 , 99999999); 
                    $query = Student::where('id1', $id1)->get();
                    foreach ($query as $key) {
                        if(!empty($key)){
                            $i = 100;
                        }
                    }
                }
            }elseif ($categorie->name === 'Primaire') {
                for ($i=0; $i < 100 ; $i++) { 
                    $id1 = 'CSP'.rand(11111111 , 99999999); 
                    $query = Student::where('id1', $id1)->get();
                    foreach ($query as $key) {
                        if(!empty($key)){
                            $i = 100;
                        }
                    }
                }
            }elseif ($categorie->name === 'Collège') {
                for ($i=0; $i < 100 ; $i++) { 
                    $id1 = 'CSC'.rand(11111111 , 99999999); 
                    $query = Student::where('id1', $id1)->get();
                    foreach ($query as $key) {
                        if(!empty($key)){
                            $i = 100;
                        }
                    }
                }
            }elseif ($categorie->name === 'Lycée') {
                for ($i=0; $i < 100 ; $i++) { 
                    $id1 = 'CSl'.rand(11111111 , 99999999); 
                    $query = Student::where('id1', $id1)->get();
                    foreach ($query as $key) {
                        if(!empty($key)){
                            $i = 100;
                        }
                    }
                }
            }
        }

        if (!empty(request()->type)) {
            request()->validate([
                'f_name' => ['required','string'],
                'f_cin' => ['required','string'],
                'f_tele' => ['required','string'],
            ]);
        }
        
        $student = new Student;
        

        $student->image = $image;
        $student->facebook = request()->facebook;
        $student->twitter = request()->twitter;
        $student->insta = request()->insta;
        $student->youtube = request()->youtube;
        $student->nom = request()->nom;
        $student->nom1 = request()->nom1;
        $student->pre = request()->pre;
        $student->pre1 = request()->pre1;
        $student->sex = request()->sex;
        $student->date = request()->date;
        $student->adress = request()->adress;
        $student->id1 = $id1;
        $student->incsription_num = request()->incsription_num;
        $student->categorie = request()->categorie;
        $student->cycle = request()->cycle;
        $student->class = request()->class;
        $student->date_d = request()->date_d;
        $student->transport = request()->transport;
        $student->trajet = request()->trajet;
        $student->user = $id1;
        $student->payement = request()->payement;
        $student->password = Hash::make($id1);
        $student->anne = session()->get('anne_actuelle');
        
        $student->save();

        $frais_inscription = new Frai_insc();

        $frais_inscription->student = $student->id;
        $frais_inscription->frais_insc = request()->frais_insc;
        $frais_inscription->Transport = request()->Transport_frai;
        $frais_inscription->Cantine = request()->Cantine;
        $frais_inscription->Guarde = request()->Guarde;

        $frais_inscription->save();

        $num = 0;
        if (request()->payement == 'anné') {
            $year = date('Y');
            $mois1 = explode('-',$student->date_d);
            $mois = $mois1[1];
            for ($i=0 ; $i < 10; $i++) { 
                $frai = new Frai();
                $frai->student = $student->id;
                $frai->massar = $student->id1;
                $frai->date = $mois.'-'.$year;
                $frai->prix = request()->prix;
                $frai->save();

                $mois++;
                
                if ($mois == 7) {
                    $i = 10;
                }elseif($mois == 13){
                    $mois = 1;
                    $year = $year+1;
                }
                if ($mois < 10) {
                    $mois = '0'.$mois;
                }
            }
            $mois1 = explode('-',$student->date_d);
            $mois = $mois1[1];
            $prixes = new Prix();
            for ($b=0; $b < 10; $b++) { 
                $prixes['m'.$mois] = request()->prix;
                if ($mois == '06') {
                    $b = 10;
                }elseif($mois == 12){
                    $mois = 0;
                }

                $mois++;

                if ($mois < 10) {
                    $mois = '0'.$mois;
                }
            }
            $prixes->student = $student->id;
            $prixes->save();

        }elseif(request()->payement == 'Autre'){
            $year = date('Y');
            $mois1 = explode('-',$student->date_d);
            $mois = $mois1[1];
            for ($i=0 ; $i < 10; $i++) { 
                $frai = new Frai();
                $frai->student = $student->id;
                $frai->massar = $student->id1;
                $frai->date = $mois.'-'.$year;
                $frai->prix = request()->prix;
                $frai->save();

                $num++;
                $mois++;
                
                if ($mois == 7) {
                    $i = 10;
                }elseif($mois == 13){
                    $mois = 1;
                    $year = $year+1;
                }
                if ($mois < 10) {
                    $mois = '0'.$mois;
                }
                if ($num == request()->number) {
                   $i = 10;
                }
                
            }
            $mois1 = explode('-',$student->date_d);
            $mois = $mois1[1];
            $prixes = new Prix();
            for ($b=0; $b < 10; $b++) { 
                $prixes['m'.$mois] = request()->prix;
                if ($mois == '06') {
                    $b = 10;
                }elseif($mois == 12){
                    $mois = 0;
                }
                $mois++;
                if ($mois < 10) {
                    $mois = '0'.$mois;
                }
            }
            $prixes->student = $student->id;
            $prixes->save();
        }elseif(request()->payement == 'mois'){
            $mois1 = explode('-',$student->date_d);
            $mois = $mois1[1];
            $prixes = new Prix();
            for ($b=0; $b < 10; $b++) { 
                $prixes['m'.$mois] = request()->prix;
                if ($mois == '06') {
                    $b = 10;
                }elseif($mois == 12){
                    $mois = 0;
                }
                $mois++;
                if ($mois < 10) {
                    $mois = '0'.$mois;
                }
            }
            $prixes->student = $student->id;
            $prixes->save();
        }else{
            $mois1 = explode('-',$student->date_d);
            $mois = $mois1[1];
            $prixes = new Prix();
            for ($b=0; $b < 10; $b++) { 
                $prixes['m'.$mois] = 0;
                if ($mois == '06') {
                    $b = 10;
                }elseif($mois == 12){
                    $mois = 0;
                }
                $mois++;
                if ($mois < 10) {
                    $mois = '0'.$mois;
                }
            }
            $prixes->student = $student->id;
            $prixes->save();
        }

        if (!empty(request()->type)) {
            
            $admin = new Parents;
            $admin->nom = request()->f_name;
            $admin->cin = request()->f_cin;
            $admin->tele = request()->f_tele;
            $admin->image = 'images/homme.jpg';
            $admin->password = Hash::make(request()->cin);

            $admin->save();
            $relation = '';
            $parent = new Parent_student();
            $parent->parent = $admin->id;
            $parent->student = $student->id;
            $parent->tuteur = 'non';
            $parent->relation = $relation;

            $parent->save();
        }

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'ajouter';
        $tra->text = ' a ajouter une nouveau éléve "'.request()->nom.' '.request()->pre.'"';

        $tra->save();

        request()->session()->flash('create', "l'étudiant à été ajouté avec succès");

        return back();
    }

    public function allstudent()
    {
        $students = Student::where('anne', session()->get('anne_actuelle'))->paginate(8);
        return view('admin.Students', ['students' => $students]);
    }

    public function Absence ()
    {
        $class = Classe::find(request()->id);
        $absences = Absence::where('class',request()->id)->where('date',request()->date)->get();

        $day = date('D', strtotime(request()->date));

        if($day == 'Sun'){
            $absences = '';
        }
        
        return view('admin.Absence', ['class' => $class]);
    }
    
    public function exams ()
    {
        $class = Classe::find(request()->id);
        $exams = Exam_class::where('class',request()->id)->get();
        $t = 0;
        foreach ($exams as $exam) {
            $exams[$t]->exam = Examen::find($exam->exam);
            $t++;
        }
        
        $students = Student::where('class', request()->id)->get();
        $n = 0;
        foreach($students as $student){
            if (request()->exam) {
                $note = Note::where('eleve', $student->id)->where('exam', request()->exam)->first();
                if ($note !== null) {
                    $students[$n]->note = $note->note;
                }else{
                    $students[$n]->note = '';
                }
            }else{
                $students[$n]->note = '';
            }
            $n++;
        }
        
        
        return view('admin.Exams', ['class' => $class,'exams' => $exams,'students' => $students]);
    }

    public function students_carts()
    {
        $students = Student::get();
        $t = 0;
        foreach ($students as $student) {
            $class = Classe::find($student->class);
            $students[$t]->class = $class->name;
            $t++;
        }
        return view('admin.id_cart', ['students' => $students]);
    }

    public function student_profil($id)
    {
        $student = Student::findOrFail($id);
        $categories = Categorie::get();
        $cycles = Cycle::get();
        $files = Student_file::where('student_id', $id)->get();
        $transport = Transport::find($student->transport);
        $categorie = Categorie::find($student->categorie);
        $student->categorie = $categorie->name;
        $transports = Transport::get();
        $parent = Parent_student::where('student',$id)->get();
        $parents = Parents::get();
        $prix = Prix::get();
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
                $ok = $m.'-'.$year; 
                if ($student->payement == 'anné') {
                    $ok1 = array('ok' => $ok,'etat' => 'oui','prix' => $prix['m'.$m] );
                    array_push($mois,$ok1);
                }else{
                    $salaire = Frai::where('student', $student->id)->where('date', $m.'-'.$year)->first();
                    if ($salaire) {
                        $ok1 = array('ok' => $ok,'etat' => 'oui','prix' => $salaire->prix );
                        array_push($mois,$ok1);
                        //array_push($pays,);
                    }else{
                        $ok1 = array('ok' => $ok,'etat' => 'non','prix' => $prix['m'.$m] );
                        array_push($mois,$ok1);
                        //array_push($mois,);
                    }
                }
                if ($m == 12) {
                    $m = 1;
                    $year = $year+1;
                }else{
                    $m = $m+1;
                }
                if ($m < 10) {
                    $m = '0'.$m;
                }
            }
            $student->mois = $mois;
            $t = 0;
        $cycle = Cycle::find($student->cycle);
        $trajet = Trajet::find($student->trajet);
        $trajets = Trajet::where('transport', $student->transport)->get();
        $class = Classe::find($student->class);
        $classes = Classe::where('cycle_id', $student->cycle)->get();
        $friend = Friends::where('student1', $student->id)->orwhere('student2', $student->id)->take(9)->get();
        // dd($class);
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
            }elseif($timeline1->name == 'prof'){
                $user = Prof::find($timeline1->by);
                $timeline[$k]->by = $user->nom;
            }elseif($timeline1->name == 'staff'){
                $user = Staff::find($timeline1->by);
                $timeline[$k]->by = $user->nom;
            }elseif($timeline1->name == 'parent'){
                $user = Parents::find($timeline1->by);
                $timeline[$k]->by = $user->pre.' '.$user->nom;
            }
            $k++;
        }
        $k = 0;
        $timelines = Timeline::where('student_id', $student->id)->orderBy('id', 'DESC')->get();
        foreach($timelines as $timeline2){
            if ($timeline2->name == 'admin') {
                $user = User::find($timeline2->by);
                $timelines[$k]->by = $user->pre.' '.$user->nom;
            }elseif($timeline2->name == 'prof'){
                $user = Prof::find($timeline2->by);
                $timelines[$k]->by = $user->pre.' '.$user->nom;
            }elseif($timeline2->name == 'staff'){
                $user = Staff::find($timeline2->by);
                $timelines[$k]->by = $user->pre.' '.$user->nom;
            }elseif($timeline2->name == 'parent'){
                $user = Parents::find($timeline2->by);
                $timelines[$k]->by = $user->pre.' '.$user->nom;
            }
            $k++;
        }
        $images = Student_image::where('student_id', $student->id)->take(9)->get();
        $a = 0;
        if ($student->sex == 'Garçon') {
            return view('admin.student_profil_g', [
                'student' => $student,
                'class' => $class,
                'images' => $images,
                'friends' => $friends,
                'freres' => $freres,
                'parents' => $parent,
                'parents1' => $parents,
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
                'categories' => $categories,
                'prix' => $prix,
                'show' => $show,
                
                ]);
                //'frais' => $frais
        }elseif ($student->sex == 'Fille') {
            return view('admin.student_profil_f', [
                'student' => $student,
                'class' => $class,
                'images' => $images,
                'friends' => $friends,
                'freres' => $freres,
                'parents' => $parent,
                'parents1' => $parents,
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
                'categories' => $categories,
                'prix' => $prix,
                'show' => $show,
                
                ]);//'frais' => $frais
        }

    }

    function Ancien_eleve(){
        $students = Student::where('anne', '!=' ,session()->get('anne_actuelle'))->orWhereNull('anne')->get();
        $n = 0;
        foreach ($students as $student) {
            $cycle = Cycle::find($student->cycle);
            $students[$n]->cycle = $cycle->name;
            $n++;
        }
        return view('admin.Ancien_eleve', ['students' => $students]);
    }
    
    function reinscription($id){
        $student = Student::find($id);
        if ($student->anne == session()->get('anne_actuelle')) {
            return view('errors.404');
        }

        $categories = Categorie::get();
        return view('admin.reinscription', ['student' => $student,'categories' => $categories]);
    }

    public function reinscriptionPost()
    {
        request()->validate([
            'frais_insc' => 'required',
            'Mensualite' => 'required',
            'Transport' => 'required',
            'Cantine' => 'required',
            'Guarde' => 'required',
            'categorie' => 'required',
            'cycle' => 'required',
        ]);

        $student = Student::findOrFail(request()->id);

        $student->transport = '';
        $student->trajet = '';
        $student->class = request()->classe;
        $student->categorie = request()->categorie;
        $student->cycle = request()->cycle;
        $student->class_num = '';
        $student->payement = 'rien';
        $student->anne = session()->get('anne_actuelle');

        $student->save();

        $frais_inscription = new Frai_insc();

        $frais_inscription->student = request()->id;
        $frais_inscription->frais_insc = request()->frais_insc;
        $frais_inscription->Transport = request()->Transport;
        $frais_inscription->Cantine = request()->Cantine;
        $frais_inscription->Guarde = request()->Guarde;

        $frais_inscription->save();

        $prix = Prix::where('student', request()->id)->first();
        $mois = '09';
        for ($i=0; $i < 10; $i++) { 
            $prix['m'.$mois] = request()->Mensualite;
            if ($mois == '06') {
                $i = 100;
            }elseif($mois == 12){
                $mois = 0;
            }
            $mois++;
            if ($mois < 10) {
                $mois = '0'.$mois;
            }
        }

        $prix->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'valider';
        $tra->text = ' a valider le réinscription de l\'éléve "'.$student->nom.' '.$student->pre.'"';

        $tra->save();

        return redirect(url('admin/eleve/profil/'.$student->id));

    }

    public function update_student()
    {
        $student = Student::findOrFail(request()->id);

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'modifier';
        $tra->text = ' a modifier les informations de l\'éléve "'.$student->nom.' '.$student->pre.'"';

        $tra->save();

        if (request()->hidden == 'image') {
            if (request()->hasFile('image')) {
                $image = request()->image;
                $image1 = time().'1.'.$image->getClientOriginalExtension();
                request()->image->move('images/students/', $image1); 
                $image = 'images/students/'.$image1;
                if ($student->image != 'images/students/fille.jpg' and $student->image != 'images/students/garcon.jpg') {
                    if(file_exists(public_path().'/'.$student->image))
                    {
                        unlink(public_path().'/'.$student->image);
                    }else{
                        unlink($student->image);
                    }
                }
            }else{
                $image = $student->image;
            }
    
            if (request()->passe == 'on') {
                $passe = 'oui';
            }else{
                $passe = 'non';
            }

            $student->nom = request()->nom;
            $student->nom1 = request()->nom1;
            $student->pre1 = request()->pre1;
            $student->pre = request()->pre;
            $student->image = $image;
            $student->passe = $passe;
            $student->facebook = request()->facebook;
            $student->twitter = request()->twitter;
            $student->insta = request()->insta;
            $student->youtube = request()->youtube;

            $student->save();

            session()->flash('create', 'les informations à été modifier avec succès');

            return back();

        }
        if (request()->hidden == 'massar') {
            request()->validate([
                'massar' => ['required', 'string', 'max:255', 'unique:students,id1,'.request()->id],
                'sex' => ['required'],
                ]);

            $student->id1 = request()->massar;
            $student->sex = request()->sex;
            $student->date = request()->date;
            $student->incsription_num = request()->incsription_num;
            $student->adress = request()->adress;
            $student->date_d = request()->date_d;

            $student->save();

            session()->flash('create', 'les informations à été modifier avec succès');

            return back();

        }

        if (request()->hidden == 'categorie') {
            request()->validate([
                'categorie' => ['required'],
                'cycle' => ['required'],
            ]);

            $student->categorie = request()->categorie;
            $student->cycle = request()->cycle;
            $student->class = request()->classe;
            $student->transport = request()->transport;
            $student->trajet = request()->trajet;

            $student->save();

            session()->flash('create', 'les informations à été modifier avec succès');

            return back();
        }

        if (request()->hidden == 'blood') {

            $student->blood = request()->blood;
            $student->height = request()->height;
            $student->weight = request()->weight;
            $student->fich = request()->fich;

            $student->save();

            session()->flash('create', 'les informations à été modifier avec succès');

            return back();
        }
        
        if (request()->hidden == 'fich') {

            $student->med_nom = request()->med_nom;
            $student->med_tel = request()->med_tel;
            $student->med_adress = request()->med_adress;

            $student->save();

            session()->flash('create', 'les informations à été modifier avec succès');

            return back();
        }

    }

    public function add_file()
    {
        request()->validate([

            'name' => ['required', 'string', 'max:255'],

        ]);

        $image = request()->image;
        $image1 = time().'1.'.$image->getClientOriginalExtension();
        request()->image->move('images/files/', $image1); 
        $image = 'images/files/'.$image1;

        $student = Student::findOrFail(request()->id);
        
        Student_file::create([
            'name' => request()->name,
            'image' => $image,
            'student_id' => request()->id,
        ]);

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'ajouter';
        $tra->text = ' a ajouter une fichier sur le profil de l\'éléve "'.$student->nom.' '.$student->pre.'"';

        $tra->save();

        session()->flash('create', 'le document est ajouter avec succès');

        return back();
    }
    
    public function add_student_parent()
    {
        request()->validate([

            'parent' => ['required'],

        ]);

        $student = Student::findOrFail(request()->id);
        $parent = Parent::where('cin', request()->parent)->get();
        $existe = Parent_student::where('student' , request()->id)->where('parent', request()->parent)->get();
        if(count($existe) == 0){
            $relation = new Parent_student();
    
            $relation->student = request()->id;
            $relation->parent = request()->id;
    
            $relation->save();
    
    
            $tra = new Tracabilite();
            $tra->name = 'Admin';
            $tra->genre = 'ajouter';
            $tra->text = ' a ajouter un des parents sur le profil de l\'éléve "'.$student->nom.' '.$student->pre.'"';
    
            $tra->save();
    
            session()->flash('create', ' Ajouter avec succès');
    
            return back();
        }else{
            session()->flash('delete', ' ce person est déja existe');
    
            return back();
        }
    }
    public function add_student_prix()
    {
        request()->validate([

            'prix' => 'required|numeric|gt:0',

        ]);

        $student = Student::findOrFail(request()->id);

        $prix = Prix::where('student', request()->id)->first();
        
        $mois1 = explode('-',$student->date_d);
        $mois = $mois1[1];
        for ($i=0; $i < 10; $i++) { 
            $prix['m'.$mois] = request()->prix;
            if ($mois == '06') {
                $i = 100;
            }elseif($mois == 12){
                $mois = 0;
            }
            $mois++;
            if ($mois < 10) {
                $mois = '0'.$mois;
            }
        }
        
        $prix->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'Modifier';
        $tra->text = ' a modifier le prix de l\'éléve "'.$student->nom.' '.$student->pre.'"';

        $tra->save();

        session()->flash('create', 'le prix est modifier avec succès');

        return back();
    }

    public function add_student_frai_multiple()
    {
        request()->validate([

            'prix' => 'required|numeric|gt:0',
            'nombre' => 'required|numeric|gt:0',

        ]);

        $student = Student::findOrFail(request()->id);

        $prix = Prix::where('student', request()->id)->first();

        if (date('m') < 9) {
            $year = date('Y')-1;
            $year1 = date('Y');
        }else{
            $year = date('Y');
            $year1 = date('Y')+1;
        }
        $mois1 = explode('-', $student->date_d);
        $mois = $mois1[1];
        $op = 0;
        for ($i=0; $i < 10; $i++) { 
            $frai = Frai::where('student', $student->id)->where('date', $mois.'-'.$year)->get();
            if (count($frai) == 0) {
                $frai1 = new Frai();
                $frai1->student = $student->id;
                $frai1->massar = $student->id1;
                $frai1->date = $mois.'-'.$year;
                $frai1->prix = request()->prix;

                $frai1->save();

                $op = $op+1;
                if (request()->nombre == $op) {
                    $i = 100;
                }
            }
            if ($mois == '06') {
                $i = 100;
            }elseif($mois == 12){
                $mois = 0;
                $year = $year+1;
            }
            $mois++;
            if ($mois < 10) {
                $mois = '0'.$mois;
            }
        }

        if (request()->nombre > $op) {
            session()->flash('delete', 'les opérations ne sont pas compléte just '.$op.' opérations sont effectuer');
        }else{
            session()->flash('success', 'l\'opération valider avec success');
        }

        return back();

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

        $student = Student::findOrFail(request()->id);

        Timeline::create([
            'name' => 'admin',
            'sujet' => request()->sujet,
            'image' => $image,
            'date' => date('d/m/Y'),
            'student_id' => request()->id,
            'by' => Auth::user()->id,
        ]);

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'ajouter';
        $tra->text = ' a ajouter une commentaire sur le profil de l\'éléve "'.$student->nom.' '.$student->pre.'"';

        $tra->save();

        session()->flash('create', 'Le commentaire est ajouter avec succès');

        return back();
        
    }

    public function Download_timeline_file($id){

        $file = Timeline::findOrFail($id);

        if(file_exists(public_path().'/'.$file->image))
        {
            return response()->download(public_path().'/'.$file->image);
        }else{
            return response()->download($file->image);
        }
    }
    
    public function Download_visiter_file($id){

        $file = Visiter::findOrFail($id);

        if(file_exists(public_path().'/'.$file->image))
        {
            return response()->download(public_path().'/'.$file->image);
        }else{
            return response()->download($file->image);
        }
    }

    public function student_id_card($id)
    {
        $student = Student::findOrFail($id);

        $class = Classe::findOrFail($student->class);

        $admin = User::get()->first();
        
        if ($student->sex == 'Garçon') {
            $box = "box1";
        } elseif ($student->sex == 'Fille') {
            $box = "box";
        }
        return view('admin.Id_card', [
                                        'box' => $box,
                                        'class' => $class,
                                        'student' => $student,
                                        'admin' => $admin
                                    ]);
    }

    public function Parent($id)
    {
        $student = $id;
        return view('admin.Parent', ['student' => $student]);
    }

    public function ParentPost()
    {
        request()->validate([
                    
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nom' => 'required|string|max:25',
            'student' => 'required',
            'type' => 'required',
            'sex' => 'required|string|max:25',
            'pre' => 'required|string|max:25',
            'cin' => 'required|string|max:30|unique:parents',
            'mail' => ['required', 'string', 'max:250','unique:parents'],
            
            ]);

            $admin = new Parents;

            if (request()->hasFile('image')) {
                $image = request()->image;
                $image1 = time().'2.'.$image->getClientOriginalExtension();
                request()->image->move('images/students/', $image1); 
                $image = 'images/students/'.$image1;
            }else{
                if (request()->sex == 'Homme') {
                    $image = 'images/homme.jpg';
                }else{
                    $image = 'images/femme.png';
                }
            }

            if (request()->type == 'Autre') {
                if (request()->relation != "") {
                    $relation = request()->relation;
                }else{
                    $relation = 'rien';
                }
            }else{
                $relation = request()->type;
            }

            $admin->image = $image;
            $admin->nom = request()->nom;
            $admin->pre = request()->pre;
            $admin->cin = request()->cin;
            $admin->sex = request()->sex;
            $admin->tele = request()->tele;
            $admin->mail = request()->mail;
            $admin->adress = request()->adress;
            $admin->facebook = request()->facebook;
            $admin->twitter = request()->twitter;
            $admin->insta = request()->insta;
            $admin->youtube = request()->youtube;
            $admin->user = request()->mail;
            $admin->password = Hash::make(request()->cin);

            $admin->save();

            $parent = new Parent_student();
            $parent->parent = $admin->id;
            $parent->student = request()->student;
            $parent->tuteur = 'non';
            $parent->relation = $relation;

            $parent->save();

            $tra = new Tracabilite();
            $tra->name = 'Admin';
            $tra->genre = 'modifier';
            $tra->text = ' a modifier les informations de "'.request()->nom.' '.request()->pre.'"';

            $tra->save();

            request()->session()->flash('create','Les informations sont crée ');
    
            return back();
    }

    public function Parents()
    {
        $parents = Parents::get();
        $a = 0;
        $b = 0;
        $c = 0;
        if (count($parents) == 0) {
            $students = '';
        }
        foreach ($parents as $row) {
            $relations = Parent_student::where('parent', $row->id)->get();
            foreach ($relations as $relation) {
                $student = Student::where('id',$relation->student)->get();
                $parents[$a]->students = $b;
                foreach ($student as $staff) {
                    $students[$c] = $staff;
                    $students[$c]->parent = $row->id; 
                    if(date('m') >= 9) {
                        $year = date('Y');
                    }else{
                        $year = date('Y')-1;
                    }
                    $date = explode(' ', $staff->created_at);
                    $date1 = explode('-', $date[0]);
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
                    for ($i=0; $i < $t; $i++) { 
                        $salaire = Frai::where('student', $staff->id)->where('date', $m.'-'.$year)->get();
                        $ok = $m.'-'.$year; 
                        if (count($salaire) == 0) {
                            $students[$c]->mois = 'ok';
                            //array_push($mois,);
                        }else{
                            $students[$c]->mois = 'rien';
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
                    $t = 0;
                    $c++;
                }
                $b++;
            }
            $a++;
        }

        return view('admin.Parents', ['parents' => $parents,'students' => $students]);
    }

    public function ParentsGet($id)
    {
        $parent = Parents::findOrFail($id);
        $students = array();
        $relations = Parent_student::where('parent', $id)->get();
        $categories = Categorie::get();
        
        $n = 0;
        foreach ($relations as $relation) {
            $student = Student::find($relation->student);
            $students[$n] = $student; 
            $n++;
        }
        $n = 0;
        foreach ($students as $student) {
            if (date('m') >= 9) {
                $year = date('Y');
            }else{
                $year = date('Y')-1;
            }
            $prix = Prix::where('student', $student->id)->first();
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
                for ($i=0; $i < $t; $i++) { 
                    $salaire = Frai::where('student', $student->id)->where('date', $m.'-'.$year)->get();
                    $ok = $m.'-'.$year; 
                    if (count($salaire) == 0) {
                        $ok1 = array('ok' => $ok,'etat' => 'non','prix' => $prix['m'.$m]);
                        array_push($mois,$ok1);
                    }else{
                        $ok1 = array('ok' => $ok,'etat' => 'oui','prix' => $prix['m'.$m] );
                        array_push($mois,$ok1);
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
                $students[$n]->mois = $mois;
                $t = 0;
                $n++;
        }

        return view('admin.parent_profil', ['parent' => $parent,'students' => $students,'categories' => $categories]);
    }

    public function ParentsEdit($id)
    {
        if (request()->hidden == 'image') {
            request()->validate([
                'nom' => 'required',
                'pre' => 'required'
            ]);
            
            $parent = Parents::findOrFail($id);
            
            if (request()->hasFile('image')) {
                $image = request()->image;
                $image1 = time().'.'.$image->getClientOriginalExtension();
                request()->image->move('images/students/', $image1);
                $image = 'images/students/'.$image1;
                if ($parent->image != 'images/femme.png' and $parent->image != 'images/homme.jpg') {
                    if(file_exists(public_path().'/'.$parent->image))
                    {
                        unlink(public_path().'/'.$parent->image);
                    }else{
                        unlink($parent->image);
                    }
                }
            }else{
                $image = $parent->image;
            }
            
            
            $parent->nom = request()->nom;
            $parent->pre = request()->pre;
            $parent->facebook = request()->facebook;
            $parent->twitter = request()->twitter;
            $parent->insta = request()->insta;
            $parent->youtube = request()->youtube;
            $parent->image = $image;
            
            $parent->save();

            $tra = new Tracabilite();
            $tra->name = 'Admin';
            $tra->genre = 'modifier';
            $tra->text = ' a modifier les informations de "'.request()->nom.' '.request()->pre.'"';

            $tra->save();
            
            request()->session()->flash('create', 'Les informations sont modifier avec succés');
            
            return back();
            
        } elseif(request()->hidden == 'cin'){
            
            request()->validate([
                'cin' => 'required',
                'mail' => 'required|unique:parents,mail,'.$id,
                'tele' => 'required',
                'sex' => 'required',
                ]);
                
            $parent = Parents::findOrFail($id);
            
            $parent->cin = request()->cin;
            $parent->mail = request()->mail;
            $parent->tele = request()->tele;
            $parent->sex = request()->sex;
            $parent->adress = request()->adress;
            
            $parent->save();

            $tra = new Tracabilite();
            $tra->name = 'Admin';
            $tra->genre = 'modifier';
            $tra->text = ' a modifier les informations de "'.request()->nom.' '.request()->pre.'"';

            $tra->save();

            session()->flash('create', 'Les informations sont modifier avec succés');

            return back();
        }
    }
    public function ParentsEdit1($id)
    {
            
            request()->validate([
                'eleve' => 'required',
                'type' => 'required',
                ]);
            $parent = Parents::findOrFail($id);

            $relation = new Parent_student();
            
            $relation->parent = $id;
            $relation->student = request()->eleve;
            $relation->relation = request()->type;
            
            $relation->save();

            $tra = new Tracabilite();
            $tra->name = 'Admin';
            $tra->genre = 'Ajouter';
            $tra->text = ' a ajouter un eleve du "'.$parent->nom.' '.$parent->pre.'"';

            $tra->save();

            session()->flash('create', 'Les informations sont modifier avec succés');

            return back();
    }

    public function delete_Student($id)
    {
        $student = Student::findOrFail($id);
        $relation = Parent_student::where('student', $id)->get();
        foreach ($relation as $test) {
            $test->delete();
        }
        if ($student->image != 'images/students/fille.jpg' and $student->image != 'images/students/garcon.jpg') {
            if(file_exists(public_path().'/'.$student->image))
            {
                unlink(public_path().'/'.$student->image);
            }else{
                unlink($student->image);
            }
        }

        $name = $student->nom.' '.$student->pre;

        $student->delete();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'delete';
        $tra->text = ' a supprimer L\'étudiant "'.$name.'"';

        $tra->save();

        session()->flash('delete', 'L\'étudiant est supprimer avec succés');

        return back();
    }

    public function delete_Parents($id)
    {
        $parent = Parents::findOrFail($id);
        $name = $parent->nom .' '.$parent->pre;
        $relation = Parent_student::where('parent', $id)->get();
        foreach ($relation as $key) {
            $student = Student::find($key->student);
        }

        foreach ($relation as $test) {
            $test->delete();
        }
        if ($parent->image != 'images/femme.png' and $parent->image != 'images/homme.jpg') {
            if(file_exists(public_path().'/'.$parent->image))
            {
                unlink(public_path().'/'.$parent->image);
            }else{
                unlink($parent->image);
            }
        }

        $parent->delete();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'delete';
        $tra->text = ' a supprimer une des parents "'.$name.'"';

        $tra->save();

        session()->flash('delete', 'Ce person est supprimer avec succés');

        return back();
    }

    public function Devoires()
    {
        $devoires = Devoire::paginate(10);
        $categories = Categorie::get();
        $matieres = Matiere::get();
        $n = 0;
        foreach ($devoires as $key) {
            $class = Classe::find($key->class);
            $devoires[$n]->class = $class;
            $matiere = Matiere::find($key->matiere);
            $devoires[$n]->matiere = $matiere;
            $n++;
        }
        $cycles = Cycle::get();
        return view('admin.devoires', ['devoires' => $devoires,'cycles' => $cycles,'categories' => $categories,'matieres' => $matieres]);
    }

    public function DevoiresPost()
    {
        
        request()->validate([
            'class' => 'required',
            'matiere' => 'required',
            'date' => 'required',
        ]);

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
        $devoire->matiere = request()->matiere;
        $devoire->date2 = request()->date;
        $devoire->date1 = date('Y-m-d');
        $devoire->image = $image;
        $devoire->desc = request()->desc;

        $devoire->save();

        $class = Classe::find(request()->class);

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'ajouter';
        $tra->text = ' a ajouter des devoires pour la class "'.$class->name.'"';

        $tra->save();

        request()->session()->flash('create', "l'ajoute a été succes");

        return back();
    }

    public function update_tuteur()
    {
        request()->validate([
            'tuteur' =>'required',
        ]);

        $relations = Parent_student::where('student', request()->student_id)->get();
        foreach ($relations as $key) {
            $key->tuteur = 'non';
            $key->save();
        }
        $relation = Parent_student::where('parent', request()->tuteur)->where('student', request()->student_id)->get()->first();
        $relation->tuteur = 'oui';
        $relation->save();

        $student = Student::findOrFail(request()->student_id);

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'modifier';
        $tra->text = ' a modifier le tuteur de "'.$student->nom.' '.$student->pre.'"';

        $tra->save();

        session()->flash('create', 'Les informations du tuteur sont modifier avec succés');

        return back();
    }

    public function DevoiresEdit()
    {
        request()->validate([

            'date' => 'required',
        ]);

        $devoire = Devoire::findOrFail(request()->id);

        if (request()->hasFile('image')) {
            $image = request()->image;
            //$image1 = time().'1'.$image->getClientOriginalExtension();
                $image1 = time().'.'.$image->getClientOriginalExtension();
            request()->image->move('images/devoires/', $image1);
            $image = 'images/devoires/'.$image1;
            if ($devoire->image != "") {
                if(file_exists(public_path().'/'.$devoire->image))
                {
                    unlink(public_path().'/'.$devoire->image);
                }else{
                    unlink($devoire->image);
                }
            }
        }else{
            $image = $devoire->image;
        }

        $devoire->date2 = request()->date;
        $devoire->image = $image;
        $devoire->desc = request()->desc;

        $devoire->save();

        $class = Classe::find($devoire->class);

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'modifier';
        $tra->text = ' a modifier lee devoires de "'.$class->name.'"';

        $tra->save();

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

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'delete';
        $tra->text = ' a supprimer une devoire ';

        $tra->save();

        session()->flash('delete','Le devoire est supprimer ');

        return back();

    }

    public function delete_friend($id,$id1)
    {
        $friend = Friends::where('student1',$id)->where('student2', $id1)->get();
        $friend1 = Student::find($id);
        $friend2 = Student::find($id1);
        foreach ($friend as $key1) {
            $key1->delete();
        }
        $friend1 = Friends::where('student2',$id)->where('student1', $id1)->get();
        foreach ($friend1 as $key2) {
            $key2->delete();
        }

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'delete';
        $tra->text = ' a supprimer l\'amitier entre "'.$friend1->nom.' '.$friend1->pre.'" et "'.$friend2->nom.' '.$friend2->pre.'"';

        $tra->save();

        session()->flash('delete','Les information sont supprimer avec succés');

        return back();
    }

    public function add_friend()
    {
        request()->validate([
            'eleve' => 'required',
            'id' => 'required',
        ]);

        $eleve = new Friends();
        $eleve->student1 = request()->id;
        $eleve->student2 = request()->eleve;
        $eleve->roll = 'rien';

        $eleve->save();
        $student = Student::find(request()->id);

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'ajouter';
        $tra->text = ' a ajouter un ami pour "'.$student->nom.' '.$student->pre.'"';

        $tra->save();

        session()->flash('create', 'les information sont modifier avec succés');

        return back();
    }

    public function add_student_image()
    {
        request()->validate([
            'image' => 'required|image',
        ]);

        if (request()->hasFile('image')) {
            $image = request()->image;
            $image1 = time().'.'.$image->getClientOriginalExtension();
            request()->image->move('images/student_images/', $image1);
            $image = 'images/student_images/'.$image1;
        }

        $images = new Student_image();
        $images->image = $image;
        $images->student_id = request()->id;
        $images->save();

        $student = Student::find(request()->id);

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'ajouter';
        $tra->text = ' a ajouter un image pour "'.$student->nom.' '.$student->pre.'"';

        $tra->save();

        session()->flash('create', 'Nouveau image a été ajouté');

        return back();
    }

    public function Frais()
    {
        $students = Student::get();

        $n = 0;
        
        foreach ($students as $student) {
            $cycle = Cycle::find($student->cycle);
            $students[$n]->cycle = $cycle->name; 
            if($student->class){
                $class = Classe::find($student->class);
                $students[$n]->class = $class->name; 
            }
            if (date('m') >= 9) {
                $year = date('Y');
                $year1 = $year+1;
            }else{
                $year = date('Y')-1;
                $year1 = $year+1;
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
            for ($i=0; $i < $t; $i++) { 
                        $salaire = Frai::where('student', $student->id)->where('date', $m.'-'.$year)->get();
                        $ok = $m.'-'.$year; 
                        if (count($salaire) == 0) {
                            $ok1 = array('ok' => $ok,'etat' => 'non' );
                            array_push($mois,$ok1);
                            //array_push($mois,);
                        }else{
                            $ok1 = array('ok' => $ok,'etat' => 'oui' );
                            array_push($mois,$ok1);
                            //array_push($pays,);
                        }
                        if ($m == 12) {
                            $year = $year+1;
                            $m = 1;
                        }else{
                            $m = $m+1;
                        }
                        if ($m < 10) {
                            $m = '0'.$m;
                        }
            }
            $students[$n]->mois = $mois;
            $n++;
            $t = 0;
        }
        return view('admin/Frais',['students' => $students]);
    }

    public function certificate()
    {
        return view('admin.certificate');
    }
    public function certificatePost()
    {
        request()->validate([
            'student' => 'required',
            'genre' => 'required',
        ]);
        $name = explode(" ",request()->student);
        $students = Student::where('nom', $name[0])->where('pre', $name[0])->get();
        foreach ($students as $student) {
            if (request()->genre == '1') {
                if ($student->sex == 'Garçon') {
                    return view('admin.certi', ['student' => request()->student]);
                }else{
                    return view('admin.certif', ['student' => request()->student]);
                }
            }
            if (request()->genre == '2') {
                if ($student->sex == 'Garçon') {
                    return view('admin.certif1f', ['student' => request()->student]);
                }else{
                    return view('admin.certi1', ['student' => request()->student]);
                }
            }
        }
    }
}