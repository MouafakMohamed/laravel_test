<?php

namespace App\Http\Controllers\admin;

use App\Categorie;
use App\Charge;
use App\Classe;
use App\Club;
use App\Devoire;
use App\Examen;
use App\Http\Controllers\Controller;
use App\Staff;
use App\Prof;
use App\File;
use App\Matiere;
use App\prof_classe;
use App\Salaire;
use App\SalleModel;
use App\Student;
use App\Tracabilite;
use App\Student_file;
use App\User as AppUser;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Ramsey\Collection\Map\AssociativeArrayMap;
use Illuminate\Support\Carbon;

class User extends Controller
{
    public function __construct()
    {
        Carbon::setlocale('fr');
    }


    public function index()
    {
        $staff = Staff::all();
        $profs = Prof::all();
        return view('admin.GRH', ['staffs' => $staff,'profs' => $profs]);
    }

    public function getDownload($id){

        $file = File::findOrFail($id);
        //PDF file is stored under project/public/download/info.pdf
        if(file_exists(public_path().'/'.$file->image))
        {
            return response()->download(public_path().'/'.$file->image);
        }else{
            return response()->download($file->image);
        }
    }

    public function Download_devoire_file($id){

        $file = Devoire::findOrFail($id);
        //PDF file is stored under project/public/download/info.pdf
        if(file_exists(public_path().'/'.$file->image))
        {
            return response()->download(public_path().'/'.$file->image);
        }else{
            return response()->download($file->image);
        }
    }

    public function Download_charge_file($id){

        $file = Charge::findOrFail($id);
        //PDF file is stored under project/public/download/info.pdf
        if(file_exists(public_path().'/'.$file->image))
        {
            return response()->download(public_path().'/'.$file->image);
        }else{
            return response()->download($file->image);
        }
    }
    
    public function Download_exam_file($id){

        $file = Examen::findOrFail($id);
        //PDF file is stored under project/public/download/info.pdf
        if(file_exists(public_path().'/'.$file->fichier))
        {
            return response()->download(public_path().'/'.$file->fichier);
        }else{
            return response()->download($file->fichier);
        }
    }
    public function Download_student_file($id){

        $file = Student_file::findOrFail($id);
        //PDF file is stored under project/public/download/info.pdf
        if(file_exists(public_path().'/'.$file->image))
        {
            return response()->download(public_path().'/'.$file->image);
        }else{
            return response()->download($file->image);
        }
    }

    public function FileDelete($id){

        $file = File::findOrFail($id);

        if ($file->user_id == NULL) {
            $prof = Prof::find($file->prof_id);
            $name = $prof->nom.' '.$prof->pre;
        }

        if ($file->prof_id == NULL) {
            $staff = Staff::find($file->user_id);
            $name = $staff->nom.' '.$staff->pre;
        }

        if(file_exists(public_path().'/'.$file->image))
        {
            unlink(public_path().'/'.$file->image);
        }else{
            unlink($file->image);
        }
        
        $file->delete();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'delete';
        $tra->text = ' a supprimer une fichier sur le compte de "'.$name.'"';

        $tra->save();

        session()->flash('delete','Le fichier est supprimer ');

        return back();
    }
    public function Delete_student_file($id){

        $file = Student_file::findOrFail($id);

        $student = Student::findOrFail($file->student_id);

        $name = $student->nom.' '.$student->pre;

        $file->delete();

        if(file_exists(public_path().'/'.$file->image))
        {
            unlink(public_path().'/'.$file->image);
        }else{
            unlink($file->image);
        }

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'delete';
        $tra->text = ' a supprimer une fichier de "'.$name.'"';

        $tra->save();

        session()->flash('delete','Le fichier est supprimer ');

        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.GRH_create');

    }

    public function user_profil($id)
    {
        $user = Staff::findOrFail($id);
        if (date('m') >= 9) {
            $year = date('Y');
            $year1 = $year+1;
        }else{
            $year = date('Y')-1;
            $year1 = $year+1;
        }
        $date1 = explode('-', $user->date1);
        $m = $date1[1];
        $y = $date1[0];
        $t = 0;
        if ($y == $year) {
            if ($m < 9) {
                $m = '09';
                if (date('m') < 9) {
                    if (date('d') < 27) {
                        $t = date('m') + 3;
                    }else{
                        $t = date('m') + 4;
                    }
                    
                }else{
                    if (date('d') < 27) {
                        $t = date('m') - 9;
                    }else{
                        $t = date('m') - 8 ;
                    }
                }
            }else{
                if (date('m') < 9) {
                    if (date('d') < 27) {
                        $t = date('m') + 12 - $m;
                    }else{
                        $t = date('m') + 13 - $m;
                    }
                }elseif(date('m') == 9){
                    if (date('d') < 27) {
                        $t = date('m')  - $m;
                    }else{
                        $t = date('m') + 1 - $m;
                    }
                }else{
                    $t = date('m') - $m;
                }
            }
        }elseif ($y == $year1) { 
                $year = $y;
                if (date('d') < 27) {
                    $t = date('m')- $m;
                }else{
                    $t = date('m')- $m + 1;
                }
        }elseif ($y < $year) {
            $m = '09';
            if(date('m') < 9){
                if (date('d') < 27) {
                    $t = date('m') + 3; 
                }else{
                    $t = date('m') + 4; 
                }
            }else{
                if (date('d') < 27) {
                    $t = date('m') - $m;
                }else{
                    $t = date('m') - $m + 1;
                }
            }
        }
        $mois = array();
        for ($i=0; $i < $t; $i++) { 
                    $salaire = Salaire::where('staff', $user->id)->where('date', $m.'-'.$year)->get();
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
                        $m = 1;
                    }else{
                        $m = $m+1;
                    }
                    if ($m < 10) {
                        $m = '0'.$m;
                    }
        }
        $user->mois = $mois;

        $files = $user->Files;

       return view('admin.GRH_profil',['user' => $user, 'files' => $files]);
    }

    public function user_prms($id)
    {
        $user = Staff::findOrFail($id);

        return view('admin.prms', ['user' => $user]);
    }

    public function add_prof_class()
    {
        request()->validate([
            'prof' =>'required',
            'matiere' =>'required',
            'class' =>'required',
        ]);

        $pro = new prof_classe();
        $pro->prof = request()->prof;
        $pro->matiere = request()->matiere;
        $pro->class = request()->class;

        $pro->save();

        $prof = Prof::find(request()->prof);

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'ajouter';
        $tra->text = ' a ajouter une nouveau class pour le professeur "'.$prof->nom.' '.$prof->pre.'"';

        $tra->save();

        session()->flash('create', 'La class est ajouter avec success');

        return back();
    }

    public function prof_profil($id)
    {
        $categories = Categorie::get(); 
        $user = Prof::findOrFail($id);
        if (date('m') >= 9) {
            $year = date('Y');
            $year1 = $year+1;
        }else{
            $year = date('Y')-1;
            $year1 = $year+1;
        }
        $date1 = explode('-', $user->date1);
        $m = $date1[1];
        $y = $date1[0];
        $t = 0;
        if ($y == $year) {
            if ($m < 9) {
                $m = '09';
                if (date('m') < 9) {
                    if (date('d') < 27) {
                        $t = date('m') + 3;
                    }else{
                        $t = date('m') + 4;
                    }
                    
                }else{
                    if (date('d') < 27) {
                        $t = date('m') - 9;
                    }else{
                        $t = date('m') - 8 ;
                    }
                }
            }else{
                if (date('m') < 9) {
                    if (date('d') < 27) {
                        $t = date('m') + 12 - $m;
                    }else{
                        $t = date('m') + 13 - $m;
                    }
                }elseif(date('m') == 9){
                    if (date('d') < 27) {
                        $t = date('m')  - $m;
                    }else{
                        $t = date('m') + 1 - $m;
                    }
                }else{
                    $t = date('m') - $m;
                }
            }
        }elseif ($y == $year1) { 
                $year = $y;
                if (date('d') < 27) {
                    $t = date('m')- $m;
                }else{
                    $t = date('m')- $m + 1;
                }
        }elseif ($y < $year) {
            $m = '09';
            if(date('m') < 9){
                if (date('d') < 27) {
                    $t = date('m') + 3; 
                }else{
                    $t = date('m') + 4; 
                }
            }else{
                if (date('d') < 27) {
                    $t = date('m') - $m;
                }else{
                    $t = date('m') - $m + 1;
                }
            }
        }
        $mois = array();
        for ($i=0; $i < $t; $i++) { 
                    $salaire = Salaire::where('prof', $user->id)->where('date', $m.'-'.$year)->get();
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
                        $m = 1;
                    }else{
                        $m = $m+1;
                    }
                    if ($m < 10) {
                        $m = '0'.$m;
                    }
        }
        $user->mois = $mois;
        $t = 0;

        $files = $user->Files;
        $salles = SalleModel::get();
        $prof_classes = prof_classe::where('prof', $id)->get();
        $salaires = Salaire::where('prof', $id)->get();
        $n = 0;
        foreach ($prof_classes as $prof_class) {
            $class = Classe::find($prof_class->class);
            $matiere = Matiere::find($prof_class->matiere);
            $prof_classes[$n]->class = $class->name;
            $prof_classes[$n]->matiere = $matiere->name;
            $n++;
        }

        $matieres = Matiere::get();

        $Clubs = Club::where('prof', $id)->get();

        return view('admin.prof_profil',[
            'user' => $user, 
            'files' => $files, 
            'salles' => $salles, 
            'prof_classes' => $prof_classes, 
            'salaires' => $salaires, 
            'Clubs' => $Clubs, 
            'categories' => $categories, 
            'matieres' => $matieres
            ]);
    }

    public function delete_prof_class($id)
    {
        $staff = prof_classe::findOrFail($id);

        $prof = Prof::find($staff->prof);
        $class = Classe::find($staff->class);

        $staff->delete();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'delete';
        $tra->text = ' a supprimer le prof "'.$prof->nom.' '.$prof->pre.'" de la liste des enseignants du class "'.$class->name.'"';

        $tra->save();
        

        session()->flash('delete','La class est supprimer avec success');

        return back();
    }

    public function add_document()
    {
        request()->validate([
            
            'name' => ['required', 'string', 'max:255'],
            'date' => ['required'],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
            ]);

        $image = request()->image;
        $image1 = time().'1.'.$image->getClientOriginalExtension();
        request()->image->move('images/files/', $image1); 
        $image = 'images/files/'.$image1;

        $staff = Staff::find(request()->user_id);
        
        File::create([
            'name' => request()->name,
            'date' => request()->date,
            'image' => $image,
            'user_id' => request()->user_id,
        ]);

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'ajouter';
        $tra->text = ' a ajouter une nouveau fichier sur le compte de "'.$staff->nom.' '.$staff->pre.'"';

        $tra->save();

        request()->session()->flash('create', 'Le document est ajouté');

        return back();
    }

    public function add_document1()
    {
        request()->validate([

            'name' => ['required', 'string', 'max:255'],
            'date' => ['required', 'string', 'max:50'],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = request()->image;
        $image1 = time().'1.'.$image->getClientOriginalExtension();
        request()->image->move('images/files/', $image1); 
        $image = 'images/files/'.$image1;

        $prof = Prof::find(request()->user_id);



        File::create([
            'name' => request()->name,
            'date' => request()->date,
            'image' => $image,
            'prof_id' =>request()->user_id,
        ]);

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'ajouter';
        $tra->text = ' a ajouter une nouveau fichier sur le compte du professeur "'.$prof->nom.' '.$prof->pre.'"';

        $tra->save();

        request()->session()->flash('create', 'Le document est ajouté');

        return back();
    }

    public function update_staff()
    {
        
        request()->validate([

            'nom' => ['required', 'string', 'max:50'],
            'pre' => ['required', 'string', 'max:50'],

        ]);
        
        $id = request()->id;
        $staff = Staff::findOrFail($id);

        if (request()->hasFile('image')) {
            $image = request()->image;
            $image1 = time().'1.'.$image->getClientOriginalExtension();
            request()->image->move('images/users/', $image1); 
            $image = 'images/users/'.$image1;
            if(file_exists(public_path().'/'.$staff->image))
            {
                unlink(public_path().'/'.$staff->image);
            }else{
                unlink($staff->image);
            }
            
        }else{
            
            $image = $staff->image;
        }
            $staff->nom = request()->nom;
            $staff->pre = request()->pre;
            $staff->facebook = request()->facebook;
            $staff->twitter = request()->twitter;
            $staff->insta = request()->insta;
            $staff->linked = request()->linked;
            $staff->image = $image;

            $staff->save();

            $tra = new Tracabilite();
            $tra->name = 'Admin';
            $tra->genre = 'modifier';
            $tra->text = ' a modifier les informations de "'.$staff->nom.' '.$staff->pre.'"';

            $tra->save();

            request()->session()->flash('update','Les informations sont modifier ');
    
            return back();
    }


    public function update_staff1()
    {
        
        request()->validate([

            'post' => ['required', 'string', 'max:50'],
            'type' => ['required', 'string', 'max:50'],
            'date1' => ['required', 'string', 'max:50'],
            'compet' => ['required', 'string', 'max:50'],

        ]);
        
            $id = request()->id;
            $staff = Staff::findOrFail($id);

            $staff->post = request()->post;
            $staff->type = request()->type;
            $staff->date1 = request()->date1;
            if (request()->type == 'CDD') {
                $staff->date2 = request()->date2;
            } 
            $staff->post_name == 'rien';
            if (request()->post == 'Autre') {
                $staff->post_name = request()->post_name;
            }
            $staff->compet = request()->compet;

            $staff->save();

            $tra = new Tracabilite();
            $tra->name = 'Admin';
            $tra->genre = 'modifier';
            $tra->text = ' a modifier les informations de "'.$staff->nom.' '.$staff->pre.'"';

            $tra->save();

            request()->session()->flash('update','Les informations sont modifier ');
    
            return back();
    }

    public function update_staff2()
    {
        

        request()->validate([

            'cin' => ['required', 'string', 'max:50','unique:staff,cin,'.request()->id],
            'tele' => ['required', 'string', 'max:50','unique:staff,tele,'.request()->id],
            'email' => ['required', 'string', 'max:250','unique:staff,email,'.request()->id],
            'status' => ['required', 'string', 'max:50'],
            'sex' => ['required', 'string', 'max:50'],
            'date' => ['required', 'string', 'max:50'],
            'adress' => ['required', 'string', 'max:250'],

        ]);
        
            $id = request()->id;
            $staff = Staff::findOrFail($id);

            $staff->cin = request()->cin;
            $staff->tele = request()->tele;
            $staff->email = request()->email;
            $staff->status = request()->status;
            $staff->sex = request()->sex;
            $staff->date = request()->date;
            $staff->adress = request()->adress;

            $staff->save();

            $tra = new Tracabilite();
            $tra->name = 'Admin';
            $tra->genre = 'modifier';
            $tra->text = ' a modifier les informations de "'.$staff->nom.' '.$staff->pre.'"';

            $tra->save();

            request()->session()->flash('update','Les informations sont modifier ');
    
            return back();
    }

    public function update_staff3()
    {
        

        request()->validate([

            
            'salaire' => ['required', 'string', 'max:250'],
            'banque' => ['required', 'string', 'max:50'],
            'rib' => ['required', 'string', 'max:50'],

        ]);
        
            $id = request()->id;
            $staff = Staff::findOrFail($id);

            
            $staff->salaire = request()->salaire;
            $staff->banque = request()->banque;
            $staff->rib = request()->rib;
            $staff->cnss = request()->cnss;

            $staff->save();

            $tra = new Tracabilite();
            $tra->name = 'Admin';
            $tra->genre = 'modifier';
            $tra->text = ' a modifier les informations de "'.$staff->nom.' '.$staff->pre.'"';

            $tra->save();

            request()->session()->flash('update','Les informations sont modifier ');
    
            return back();
    }




    public function update_prof()
    {
        
        request()->validate([

            'nom' => ['required', 'string', 'max:50'],
            'pre' => ['required', 'string', 'max:50'],

        ]);
        
        $id = request()->id;
        $staff = Prof::findOrFail($id);

        if (request()->hasFile('image')) {
            $image = request()->image;
            $image1 = time().'1.'.$image->getClientOriginalExtension();
            request()->image->move('images/users/', $image1); 
            $image = 'images/users/'.$image1;

            if(file_exists(public_path().'/'.$staff->image))
            {
                unlink(public_path().'/'.$staff->image);
            }else{
                unlink($staff->image);
            }
            
        }else{
            
            $image = $staff->image;
        }
            $staff->nom = request()->nom;
            $staff->pre = request()->pre;
            $staff->facebook = request()->facebook;
            $staff->twitter = request()->twitter;
            $staff->insta = request()->insta;
            $staff->linked = request()->linked;
            $staff->image = $image;

            $staff->save();

            $tra = new Tracabilite();
            $tra->name = 'Admin';
            $tra->genre = 'modifier';
            $tra->text = ' a modifier les informations de "'.$staff->nom.' '.$staff->pre.'"';

            $tra->save();

            request()->session()->flash('update','Les informations sont modifier ');
    
            return back();
    }


    public function update_prof1()
    {
        
        request()->validate([

            'post' => ['required', 'string', 'max:50'],
            'type' => ['required', 'string', 'max:50'],
            'date1' => ['required', 'string', 'max:50'],
            'fonction' => ['required', 'string', 'max:50'],
            'compet' => ['required', 'string', 'max:50'],

        ]);
        
            $id = request()->id;
            $staff = Prof::findOrFail($id);

            $staff->post = request()->post;
            $staff->type = request()->type;
            $staff->date1 = request()->date1;
            if (request()->type == 'CDD') {
                $staff->date2 = request()->date2;
            }
            $staff->compet = request()->compet;
            $staff->fonction = request()->fonction;

            $staff->save();

            $tra = new Tracabilite();
            $tra->name = 'Admin';
            $tra->genre = 'modifier';
            $tra->text = ' a modifier les informations de "'.$staff->nom.' '.$staff->pre.'"';

            $tra->save();

            request()->session()->flash('success','Les informations sont modifier ');
    
            return back();
    }

    public function update_prof2()
    {
        

        request()->validate([

            'cin' => ['required', 'string', 'max:50','unique:profs,cin,'.request()->id],
            'tele' => ['required', 'string', 'max:50','unique:profs,tele,'.request()->id],
            'email' => ['required', 'string', 'max:250','unique:profs,email,'.request()->id],
            'status' => ['required', 'string', 'max:50'],
            'sex' => ['required', 'string', 'max:50'],
            'date' => ['required', 'string', 'max:50'],
            'adress' => ['required', 'string', 'max:250'],

        ]);
        
            $id = request()->id;
            $staff = Prof::findOrFail($id);

            $staff->cin = request()->cin;
            $staff->tele = request()->tele;
            $staff->email = request()->email;
            $staff->status = request()->status;
            $staff->sex = request()->sex;
            $staff->date = request()->date;
            $staff->adress = request()->adress;

            $staff->save();

            $tra = new Tracabilite();
            $tra->name = 'Admin';
            $tra->genre = 'modifier';
            $tra->text = ' a modifier les informations de "'.$staff->nom.' '.$staff->pre.'"';

            $tra->save();

            request()->session()->flash('update','Les informations sont modifier ');
    
            return back();
    }

    public function update_prof3()
    {
        

        request()->validate([

            'salaire' => ['required', 'string', 'max:250'],
            'banque' => ['required', 'string', 'max:50'],
            'rib' => ['required', 'string', 'max:50'],

        ]);
        
            $id = request()->id;
            $staff = Prof::findOrFail($id);

            $staff->salaire = request()->salaire;
            $staff->banque = request()->banque;
            $staff->rib = request()->rib;
            $staff->cnss = request()->cnss;

            $staff->save();

            $tra = new Tracabilite();
            $tra->name = 'Admin';
            $tra->genre = 'modifier';
            $tra->text = ' a modifier les informations de "'.$staff->nom.' '.$staff->pre.'"';

            $tra->save();

            request()->session()->flash('update','Les informations sont modifier ');
    
            return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profil($id){

        $admin = AppUser::findOrFail($id);

        return view('admin.profil', ['admin' => $admin]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_profil()
    {
        
        if (request()->id1 == '111') {

            request()->validate([
                    
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nom' => 'required|string|max:25',
            'tele' => 'required|string|max:30',
            'fix' => 'required|string|max:50',
            'ville' => 'required|string|max:50',
            'adress' => 'required|string|max:255',
            'email' => ['required', 'string', 'max:250','unique:users,email,'.request()->id],
            
            ]);

            $id =request()->id;

            $admin = AppUser::findOrFail($id);

            if (request()->hasFile('logo')) {
                $logo = request()->logo;
                $logo1 = time().'2.'.$logo->getClientOriginalExtension();
                request()->logo->move('images/users/', $logo1); 
                $logo = 'images/users/'.$logo1;
                if(file_exists(public_path().'/'.$admin->logo))
                {
                    unlink(public_path().'/'.$admin->logo);
                }else{
                    unlink($admin->logo);
                }
            }else{
                $logo = $admin->logo;
            }

            $admin->nom = request()->nom;
            $admin->logo = $logo;
            $admin->tele = request()->tele;
            $admin->fix = request()->fix;
            $admin->ville = request()->ville;
            $admin->adress = request()->adress;
            $admin->email = request()->email;

            $admin->save();

            request()->session()->flash('update','Les informations sont modifier ');
    
            return back();
            
        }elseif (request()->id1 == '222') {
            
                request()->validate([
                    'password' => 'required|string|max:30',
                    'npassword' => 'required|string|max:30|confirmed',
                ]);

                $id =request()->id;
                $admin = AppUser::findOrFail($id);

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
        
    }

    public function delete_grh($id)
    {
        $staff = Staff::findOrFail($id);

        
        $files = File::where('user_id', $staff->id)->get();
        if (!empty($files)) {
            foreach ($files as $file) {
                
                $file->delete();
        
                if(file_exists(public_path().'/'.$file->image))
                {
                    unlink(public_path().'/'.$file->image);
                }else{
                    unlink($file->image);
                }
            }
        }

        if(file_exists(public_path().'/'.$staff->image))
        {
            unlink(public_path().'/'.$staff->image);
        }else{
            unlink($staff->image);
        }

        $staff->delete();
    
        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'delete';
        $tra->text = ' a supprimer le compte de  "'.$staff->nom.' '.$staff->pre.'"';

        $tra->save();

        session()->flash('delete','Le compte est supprimer ');

        return back();
    }

    public function delete_prof($id)
    {
        $staff = Prof::findOrFail($id);

        
        $files = File::where('prof_id', $staff->id)->get();
        if (!empty($files)) {
            foreach ($files as $file) {
                
                $file->delete();
        
                if(file_exists(public_path().'/'.$file->image))
                {
                    unlink(public_path().'/'.$file->image);
                }else{
                    unlink($file->image);
                }
            }
        }
        if ($staff->image != 'images/homme.jpg' and $staff->image != 'images/femme.png') {
            if(file_exists(public_path().'/'.$staff->image))
            {
                unlink(public_path().'/'.$staff->image);
            }else{
                unlink($staff->image);
            }
        }

        $classes = Prof_classe::where('prof', $staff->id)->get();
        foreach ($classes as $class) {
            $class->delete();
        }

        $staff->delete();
    
        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'delete';
        $tra->text = ' a supprimer le professeur "'.$staff->nom.' '.$staff->pre.'"';

        $tra->save();

        session()->flash('delete','Le compte a été supprimé');

        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
