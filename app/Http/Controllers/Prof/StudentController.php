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
use App\Student_file;
use App\Student_image;
use App\Timeline;
use App\Trajet;
use QrCode;
use Illuminate\Http\Request;
use App\Transport;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class StudentController extends Controller
{
    public function __construct()
    {
        Carbon::setlocale('fr');
    }
    
    public function student ()
    {
        $transport = Transport::get();

        return view('admin.add_student',['transports' => $transport]);
    }

    public function studentPost()
    {
        
        request()->validate([
            'nom' => ['required','string','max:20'],
            'pre' => ['required','string','max:20'],
            'categorie' => ['required','string','max:20'],
            'cycle' => ['required','string','max:20'],
            'sex' => ['required','string','max:20'],
        ]);

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

        if (request()->id1 != "") {
            $id1 = request()->id1;
        }else{
            if (request()->categorie == 'préscolaire') {
                for ($i=0; $i < 100 ; $i++) { 
                    $id1 = 'CS'.rand(11111111 , 99999999); 
                    $query = Student::where('id1', $id1)->get();
                    foreach ($query as $key) {
                        if(!empty($key)){
                            $i = 100;
                        }
                    }
                 }
            }elseif (request()->categorie == 'primaire') {
                for ($i=0; $i < 100 ; $i++) { 
                    $id1 = 'CSP'.rand(11111111 , 99999999); 
                    $query = Student::where('id1', $id1)->get();
                    foreach ($query as $key) {
                        if(!empty($key)){
                            $i = 100;
                        }
                    }
                 }
            }elseif (request()->categorie == 'E.collégial') {
                for ($i=0; $i < 100 ; $i++) { 
                    $id1 = 'CSC'.rand(11111111 , 99999999); 
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
        $student->tele = request()->tele;
        $student->mail = request()->mail;
        $student->adress = request()->adress;
        $student->id1 = $id1;
        $student->categorie = request()->categorie;
        $student->cycle = request()->cycle;
        $student->class = request()->class;
        $student->date_d = request()->date_d;
        $student->transport = request()->transport;
        $student->trajet = request()->trajet;
        $student->user = $id1;
        $student->prix = '0';
        $student->password = Hash::make($id1);

        $student->save();
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

        request()->session()->flash('create', "l'étudiant à été ajouté avec succès");

        return back();
    }

    public function allstudent()
    {
        $students = Student::paginate(20);
        return view('admin.Students', ['students' => $students]);
    }

    public function student_profil($id)
    {
        $student = Student::find($id);
        $files = Student_file::where('student_id', $id)->get();
        $transport = Transport::find($student->transport);
        $transports = Transport::get();
        $parent = Parent_student::where('student',$id)->get();
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
        $timelines = Timeline::where('student_id', $student->id)->orderBy('id', 'DESC')->get();
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
            return view('admin.student_profil_f', [
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

    public function update_student()
    {
        $student = Student::find(request()->id);
        if (request()->hidden == 'image') {
            if (request()->hasFile('image')) {
                $image = request()->image;
                $image1 = time().'1'.$image->getClientOriginalExtension();
                request()->image->move('images/students/', $image1); 
                $image = 'images/students/'.$image1;
                if(file_exists(public_path().'/'.$student->image))
                {
                    unlink(public_path().'/'.$student->image);
                }else{
                    unlink($student->image);
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
            $student->prix = request()->prix;
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
            $student->tele = request()->tele;
            $student->mail = request()->mail;
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

            $student->save();

            session()->flash('create', 'les informations à été modifier avec succès');

            return back();
        }
        
        if (request()->hidden == 'fich') {

            $student->fich = request()->fich;
            $student->fich1 = request()->fich1;
            $student->fich2 = request()->fich2;

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
        
        Student_file::create([
            'name' => request()->name,
            'image' => $image,
            'student_id' => request()->id,
        ]);

        session()->flash('create', 'le document est ajouter avec succès');

        return back();
    }

    public function add_timeline()
    {
        request()->validate([

            'name' => ['required', 'string', 'max:255'],
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
            'name' => request()->name,
            'sujet' => request()->sujet,
            'image' => $image,
            'date' => date('d/m/Y'),
            'student_id' => request()->id,
            'by' => Auth::user()->nom.' '.Auth::user()->pre,
        ]);

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

    public function student_id_card($id)
    {
        $student = Student::findOrFail($id);

        $class = Classe::find($student->class);

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

            request()->session()->flash('create','Les informations sont crée ');
    
            return back();
    }

    public function Parents()
    {
        $parents = Parents::get();
        $a = 0;
        $b = 0;
        $c = 0;

        foreach ($parents as $row) {
            $relations = Parent_student::where('parent', $row->id)->get();
            foreach ($relations as $relation) {
                $student = Student::where('id',$relation->student)->get();
                $parents[$a]->students = $b;
                foreach ($student as $staff) {
                    $students[$c] = $staff;
                    $students[$c]->parent = $row->id; 
                            if (date('m') >= 9) {
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
                                }
                                if ($date1[2] >= "27") {
                                    $m = $m+1;
                                    if ($m < 10) {
                                        $m = '0'.$m;
                                    }
                                }
                            }elseif ($y > $year) {
                                $year = $y;
                                if ($date1[2] >= "27") {
                                    $m = $m+1;
                                    if ($m < 10) {
                                        $m = '0'.$m;
                                    }
                                }
                            }elseif ($y < $year) {
                                $m = '09';
                            }
                            
                            for ($i=0; $i < 10; $i++) { 
                                if (date('m') == $m and $m != '07' and $m != '08') {
                                    if (date('d') >= '27') {
                                        $salaire = Frai::where('massar', $staff->id1)->where('date', $m.'-'.$year)->get();
                                        if (count($salaire) == 0) {
                                            $students[$c]->mois = $m.'-'.$year;
                                            $i = 10;
                                        }
                                        else{
                                            $students[$c]->mois = 'rien';
                                            $i = 10; 
                                        }
                                    }else{
                                        $students[$c]->mois = 'rien';
                                            $i = 10; 
                                    }
                                }elseif($m == '07' or $m == '08'){
                                    $students[$c]->mois = 'rien';
                                    $i = 10; 
                                }else{
                                    $salaire = Frai::where('massar', $staff->id1)->where('date', $m.'-'.$year)->get();
                                    if (count($salaire) == 0) {
                                        $students[$c]->mois = $m.'-'.$year;
                                        $i = 12;
                                    }
                                    else{
                                        if ($m == '12') {
                                            $m = '01';
                                            $year = $year+1;
                                        }else{
                                            $m = $m+1;
                                        }
                                        $i = 0;
                                    }
                                }
                            }
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
        $parent = Parents::find($id);
        $students = array();
        $relations = Parent_student::where('parent', $id)->get();
        $n = 0;
        foreach ($relations as $relation) {
            $student = Student::find($relation->student);
            $students[$n] = $student; 
            $n++;
        }

        return view('admin.parent_profil', ['parent' => $parent,'students' => $students]);
    }

    public function ParentsEdit($id)
    {
        if (request()->hidden == 'image') {
            request()->validate([
                'nom' => 'required',
                'pre' => 'required'
            ]);
            
            $parent = Parents::find($id);

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

            request()->session()->flash('create', 'Les informations sont modifier avec succés');

            return back();

        } elseif(request()->hidden == 'cin'){

            request()->validate([
                'cin' => 'required',
                'mail' => 'required|unique:parents,mail,'.$id,
                'tele' => 'required',
                'sex' => 'required',
            ]);

            $parent = Parents::find($id);

            $parent->cin = request()->cin;
            $parent->mail = request()->mail;
            $parent->tele = request()->tele;
            $parent->sex = request()->sex;
            $parent->adress = request()->adress;

            $parent->save();

            session()->flash('create', 'Les informations sont modifier avec succés');

            return back();
        }
    }

    public function delete_Student($id)
    {
        $student = Student::find($id);
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

        $student->delete();

        session()->flash('delete', 'L\'étudiant est supprimer avec succés');

        return back();
    }

    public function delete_Parents($id)
    {
        $parent = Parents::find($id);
        $relation = Parent_student::where('parent', $id)->get();
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

        session()->flash('delete', 'Ce person est supprimer avec succés');

        return back();
    }

    public function Devoires()
    {
        $devoires = Devoire::paginate(10);
        $n = 0;
        foreach ($devoires as $key) {
            $class = Classe::find($key->class);
            $devoires[$n]->class = $class;
            $matiere = Matiere::find($key->matiere);
            $devoires[$n]->matiere = $matiere;
            $n++;
        }
        $cycles = Cycle::get();
        return view('admin.devoires', ['devoires' => $devoires,'cycles' => $cycles]);
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
        $devoire->date1 = date('d/m/Y');
        $devoire->image = $image;
        $devoire->desc = request()->desc;

        $devoire->save();

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

        session()->flash('create', 'Les informations du tuteur sont modifier avec succés');

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

    public function delete_friend($id,$id1)
    {
        $friend = Friends::where('student1',$id)->where('student2', $id1)->get();
        foreach ($friend as $key1) {
            $key1->delete();
        }
        $friend1 = Friends::where('student2',$id)->where('student1', $id1)->get();
        foreach ($friend1 as $key2) {
            $key2->delete();
        }

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

        session()->flash('create', 'Nouveau image a été ajouté');

        return back();
    }

    public function Frais()
    {
        $students = Student::get();
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