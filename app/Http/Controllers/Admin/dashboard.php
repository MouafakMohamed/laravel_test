<?php

namespace App\Http\Controllers\Admin;

use App\Categorie;
use App\Charge;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cycle;
use App\Classe;
use App\Frai;
use App\Friends;
use App\Matiere;
use App\Parents;
use App\Prof;
use App\Salaire;
use App\Staff;
use App\Trajet;
use App\Tracabilite;
use App\Student;
use App\Parent_student;
use App\Prix;

class dashboard extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function index()
     {

        $profs = Prof::get();
        $staffs = Staff::get();
        $classes = Classe::get();
        $students = Student::get();
        $t1 = 0;
        $t2 = 0;
        $t3 = 0;
        $t4 = 0;
        foreach ($profs as $prof) {
            $t1++;
        }
        foreach ($staffs as $staff) {
            $t2++;
        }
        foreach ($classes as $class) {
            $t3++;
        }
        foreach ($students as $student) {
            $t4++;
        }
         return view('admin.home', [
             'staffs' =>$staffs,
             'profs' =>$profs,
             'prof' =>$t1,
             'staff' =>$t2,
             'class' =>$t3,
             'student' =>$t4,
         ]);
     }

     public function salam($id)
    {

        return view('admin.salam1');
    }

    public function ajax_get_cycle_by_categorie()
    {
        $cycles = Cycle::where('categorie', request('categorie'))->get();
        $data = '<option  selected="" disabled=""> -- Choisir un cycle -- </option>';

        foreach ($cycles as $cycle) {
            $data .= '<option value="'.$cycle->id.'" >'.$cycle->name.'</option>'; 
        }

        return response()->json(['success'=> $data]);
    }

    public function ajax_get_matiere_by_categorie()
    {
        $matieres = Matiere::where('categorie', request('categorie'))->get();
        $data = '<option  selected="" disabled=""> -- Choisir une matiere -- </option>';

        foreach ($matieres as $matiere) {
            $data .= '<option value="'.$matiere->id.'" >'.$matiere->name.'</option>'; 
        }
        return response()->json(['success'=> $data]);
    }
    
    public function ajax_get_class_by_cycle()
    {
        $classes = Classe::where('cycle_id', request('cycle'))->get();
        $data = '<option  selected="" disabled=""> -- Choisir une classe -- </option>';

        foreach ($classes as $classe) {
            $data .= '<option value="'.$classe->id.'" >'.$classe->name.'</option>'; 
        }
        return response()->json(['success'=> $data]);
    }

    public function ajax_get_class_by_categorie()
    {
        $classes = Classe::where('categorie', request('categorie'))->get();
        $data = '<option  selected="" disabled=""> -- Choisir une classe -- </option>';

        foreach ($classes as $classe) {
            $data .= '<option value="'.$classe->id.'" >'.$classe->name.'</option>'; 
        }
        return response()->json(['success'=> $data]);
    }

    public function ajax_get_student_by_class()
    {
        $eleves = Student::where('class', request('classe'))->get();
        $data = '<option  selected="" disabled="">-- Choisir un éléve --</option>';
        foreach ($eleves as $eleve) {
            $data .= '<option value="'.$eleve->id.'" >'.$eleve->nom.' '.$eleve->pre.'</option>'; 
        }
        return response()->json(['success'=> $data]);
    }
    public function ajax_get_student_by_class1()
    {
        $eleves = Student::where('class', request('classe'))->get();
        $data = '<option  selected="" disabled="">-- Choisir un éléve --</option>';
        foreach ($eleves as $eleve) {
            $data .= '<option value="'.$eleve->nom.' '.$eleve->pre.'" >'; 
        }
        return response()->json(['success'=> $data]);
    }

    public function ajax_update()
    {
        Tracabilite::query()->delete();
        return response()->json(['success'=> 'data']);
    }

    public function ajax_get_student_by_class_friend()
    {
        $eleves = Student::where('class', request('classe'))->get();
        $data = '<option  selected="" disabled="">-- Choisir un éléve --</option>';
        foreach ($eleves as $eleve) {
            if ($eleve->id != request()->student) {
                $n = 0;
                $test1 =  Friends::where('student1',$eleve->id)->where('student2', request()->student)->get();
                    foreach ($test1 as $key) {
                        $n = 10;
                    }
                $test2 =  Friends::where('student1',request()->student)->where('student2', $eleve->id)->get();
                    foreach ($test2 as $key) {
                        $n = 10;
                    }
                    if ($n == 0) {
                        $data .= '<option value="'.$eleve->id.'" >'.$eleve->nom.' '.$eleve->pre.'</option>'; 
                    }
            }
        }
        
        return response()->json(['success'=> $data]);
    }
    
    public function ajax_add_cour_to_emploi()
    {
        
        return response()->json(['success'=> 'done']);
    }
    public function ajax_get_trajet_by_transport()
    {
        $trajets = Trajet::where('transport', request('trans'))->get();
        $data = '<option  selected="" disabled="">-- Trajet -- </option>';

        foreach ($trajets as $trajet) {
            $data .= '<option value="'.$trajet->id.'" >'.$trajet->name.'</option>'; 
        }
        return response()->json(['success'=> $data]);
    }

    public function ajax_get_grh_by_fonction()
    {

        if (request()->fonction == 'Professeur') {
            $staffs = Prof::get();
        }else{
            $staffs = Staff::where('fonction', request('fonction'))->get();
        }
        $data = '<option  selected="" disabled="">-- Choisir -- </option>';

        foreach ($staffs as $staff) {
            $data .= '<option value="'.$staff->id.'" >'.$staff->nom.' '.$staff->pre.'</option>'; 
        }
        return response()->json(['success'=> $data]);
    }

    public function ajax_update_prms()
    {
        $user = Staff::find(request()->id);

        $name = request()->name;
        
        $user["$name"] = request()->value;

        $user->save();
        
        return response()->json(['success'=> 'done']);
    }
    
    public function ajax_update_block_user()
    {
        $user = Staff::find(request()->id);

        if ($user->block == 'oui') {
            $user->block = 'non';
        }else{
            $user->block = 'oui';
        }

        $user->save();
        
        return response()->json(['success'=> 'done']);
    }
    
    public function ajax_update_block_prof()
    {
        $prof = Prof::findOrFail(request()->id);

        if ($prof->block == 'oui') {

            $prof->block = 'non';

        }else{

            $prof->block = 'oui';

        }

        $prof->save();
        
        return response()->json(['success'=> 'done']);
    }
    
    public function ajax_get_student_by_phone()
    {
        
        $phone = request()->phone;
        //$students = Student::where('tele', $phone)->get();
        $parents = Parents::where('tele', 'like', $phone.'%')->get();
        if (count($parents) == '0' )  {
            $data = '';
        }else{
            $n = 0;
        foreach ($parents as $row) {
            $n1 = 0;
            $relations = Parent_student::where('parent', $row->id)->get();
            $n2 = 0;
            foreach ($relations as $relation) {
                $student = Student::where('id', $relation->student)->get();
                foreach ($student as $key) {
                    $students[$n] = $key;  
                    $n++;
                    $n1++;
                    $n2++;
                }
            }
        }
        $n = 0;
        foreach ($students as $student) {
            $cycle = Cycle::find($student->cycle);
            $students[$n]->cycle = $cycle->name; 
            $class = Classe::find($student->class);
            $students[$n]->class = $class->name; 
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
                            $m = 1;
                            $year = $year+1;
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
        $data = '<table id="datatable" class="table table-striped table-bordered" ><thead><tr><th>Nom</th><th>Prénom</th><th>Categorie</th><th>class</th><th>prix</th><th>Mois</th><th>Validation</th></tr></thead><tbody>';
        foreach ($students as $student){
            $categorie = Categorie::find($student->categorie) ;
            foreach ($student->mois as $mois => $value) {
                $data .= '<tr>';
                $data .= '<td>'.$student->nom.'</td>';
                $data .= '<td>'.$student->pre.'</td>';
                $data .= '<td>'.$categorie->name.'</td>';
                $data .= '<td>'.$student->class.'</td>';
                $data .= '<td>'.$student->prix.' DH</td>';
                $data .= '<td>'.$value['ok'].'</td>';
                $rien = 'rien';
                if ($value['etat'] == 'non' ){
                    if ($student->prix > 0) {
                        $data .= '<td><div class="custom-control custom-switch custom-switch-icon custom-control-inline">';
                        $data .= '<div class="custom-switch-inner">';
                        $data .= '<input type="checkbox" onchange="salaire1(\''.$student->id.'\',\''.url('admin/ajax_add_salaire2').'\',\''.$value['ok'].'\',\''.url('admin/recu').'\',\' '.$student->prix.'\',\''.$rien.'\')" class="custom-control-input" id="customSwitch-'.$student->id.$n.'" >';
                        $data .= '<label class="custom-control-label" for="customSwitch-'.$student->id.$n.'">';
                        $data .= '<span class="switch-icon-left"><i class="fa fa-check"></i></span>';
                        $data .= '<span class="switch-icon-right"><i class="fa fa-check"></i></span>';
                        $data .= '</label>';
                        $data .= '</div>';
                        $data .= '</div></td>';
                    }else{
                        $data .= '<td></td>';
                    }
                }else{
                    $data .= '<td><span class="badge badge-success">Payé</span></td>';
                }
                $data .= '</tr>';
            }
        }
         $data .= '</tbody></table>';
        }
        
        
        return response()->json(['success'=> $data]);
    }

    public function ajax_update_prix_student()
    {
        $prix = Prix::where('student',request()->student)->first();
        $moiss = explode('-',request()->mois );
        $mois = $moiss[0];
        for ($i=0; $i < 10; $i++) { 
            $prix['m'.$mois] = request()->value;
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
        

        return response()->json(['success'=> $mois]);
    }

    public function ajax_get_student_by_cin()
    {
        
        $cin = request()->cin;
        //$students = Student::where('tele', $phone)->get();
        $parents = Parents::where('cin', 'like', $cin.'%')->get();
        if (count($parents) == '0' )  {
            $data = '';
        }else{
            $n = 0;
        foreach ($parents as $row) {
            $n1 = 0;
            $relations = Parent_student::where('parent', $row->id)->get();
            $n2 = 0;
            foreach ($relations as $relation) {
                $student = Student::where('id', $relation->student)->get();
                foreach ($student as $key) {
                    $students[$n] = $key;  
                    $n++;
                    $n1++;
                    $n2++;
                }
            }
        }
        $n = 0;
        foreach ($students as $student) {
            $cycle = Cycle::find($student->cycle);
            $students[$n]->cycle = $cycle->name; 
            $class = Classe::find($student->class);
            $students[$n]->class = $class->name; 
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
                            $m = 1;
                            $year = $year+1;
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
        $data = '<table id="datatable" class="table table-striped table-bordered" ><thead><tr><th>Nom</th><th>Prénom</th><th>Categorie</th><th>class</th><th>prix</th><th>Mois</th><th>Validation</th></tr></thead><tbody>';
        foreach ($students as $student){
            $categorie = Categorie::find($student->categorie);
            foreach ($student->mois as $mois => $value) {
                $data .= '<tr>';
                $data .= '<td>'.$student->nom.'</td>';
                $data .= '<td>'.$student->pre.'</td>';
                $data .= '<td>'.$categorie->name.'</td>';
                $data .= '<td>'.$student->class.'</td>';
                $data .= '<td>'.$student->prix.' DH</td>';
                $data .= '<td>'.$value['ok'].'</td>';
                $rien = 'rien';
                if ($value['etat'] == 'non' ){
                    if ($student->prix > 0) {
                        $data .= '<td><div class="custom-control custom-switch custom-switch-icon custom-control-inline">';
                        $data .= '<div class="custom-switch-inner">';
                        $data .= '<input type="checkbox" onchange="salaire1(\''.$student->id.'\',\''.url('admin/ajax_add_salaire2').'\',\''.$value['ok'].'\',\''.url('admin/recu').'\',\' '.$student->prix.'\',\''.$rien.'\')" class="custom-control-input" id="customSwitch-'.$student->id.$n.'" >';
                        $data .= '<label class="custom-control-label" for="customSwitch-'.$student->id.$n.'">';
                        $data .= '<span class="switch-icon-left"><i class="fa fa-check"></i></span>';
                        $data .= '<span class="switch-icon-right"><i class="fa fa-check"></i></span>';
                        $data .= '</label>';
                        $data .= '</div>';
                        $data .= '</div></td>';
                    }else{
                        $data .= '<td></td>';
                    }
                }else{
                    $data .= '<td><span class="badge badge-success">Payé</span></td>';
                }
                $data .= '</tr>';
            }
        }
         $data .= '</tbody></table>';
        }
        
        
        return response()->json(['success'=> $data]);
    }

    public function ajax_get_student_by_massar()
    {
        
        $massar = request()->massar;
        $students = Student::where('id1', 'like', $massar.'%')->get();
        if (count($students) == '0' )  {
            $data = '';
        }else{
        $n = 0;
        foreach ($students as $student) {
            $prix = Prix::where('student', $student->id)->first();
            $cycle = Cycle::find($student->cycle);
            $students[$n]->cycle = $cycle->name; 
            if($student->class){
                $class = Classe::find($student->class);
                $students[$n]->class = $class->name; 
            }else {
                $students[$n]->class = "-"; 
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
                            $year = $year+1;
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
        $data = '<table id="datatable" class="table table-striped table-bordered" ><thead><tr><th>Nom</th><th>Prénom</th><th>Categorie</th><th>class</th><th>prix</th><th>Mois</th><th>Validation</th></tr></thead><tbody>';
        foreach ($students as $student){
            $categorie = Categorie::find($student->categorie);
            foreach ($student->mois as $mois => $value) {
                if ($value['etat'] == 'non' ){
                    $data .= '<tr>';
                    $data .= '<td>'.$student->nom.'</td>';
                    $data .= '<td>'.$student->pre.'</td>';
                    $data .= '<td>'.$categorie->name.'</td>';
                    $data .= '<td>'.$student->class.'</td>';
                    $data .= '<td>'.$value['prix'].' DH</td>';
                    $data .= '<td>'.$value['ok'].'</td>';
                    $rien = 'rien';
                    if ($value['prix'] > 0) {
                        $data .= '<td><div class="custom-control custom-switch custom-switch-icon custom-control-inline">';
                        $data .= '<div class="custom-switch-inner">';
                        $data .= '<input type="checkbox" onchange="salaire1(\''.$student->id.'\',\''.url('admin/ajax_add_salaire2').'\',\''.$value['ok'].'\',\''.url('admin/recu').'\',\' '.$value['prix'].'\',\''.$rien.'\')" class="custom-control-input" id="customSwitch-'.$student->id.$n.'" >';
                        $data .= '<label class="custom-control-label" for="customSwitch-'.$student->id.$n.'">';
                        $data .= '<span class="switch-icon-left"><i class="fa fa-check"></i></span>';
                        $data .= '<span class="switch-icon-right"><i class="fa fa-check"></i></span>';
                        $data .= '</label>';
                        $data .= '</div>';
                        $data .= '</div></td>';
                    }else{
                        $data .= '<td></td>';
                    }
                    $data .= '</tr>';
                }
            }
            foreach ($student->mois as $mois => $value) {
                if ($value['etat'] != 'non' ){
                    $data .= '<tr>';
                    $data .= '<td>'.$student->nom.'</td>';
                    $data .= '<td>'.$student->pre.'</td>';
                    $data .= '<td>'.$categorie->name.'</td>';
                    $data .= '<td>'.$student->class.'</td>';
                    $data .= '<td>'.$value['prix'].' DH</td>';
                    $data .= '<td>'.$value['ok'].'</td>';
                    $rien = 'rien';
                    $data .= '<td><span class="badge badge-success">Payé</span></td>';
                    $data .= '</tr>';
                }
            }
        }
         $data .= '</tbody></table>';
        }
        
        
        return response()->json(['success'=> $data]);
    }

    public function ajax_get_student_by_massar1()
    {
        
        $massar = request()->massar;
        $students = Student::where('id1', $massar)->get();
        $data = '';
        if (count($students) == '0' )  {
            $data = ' ';
            $count = 'oui';
        }else{
            $count = 'oui';
        }
            foreach ($students as $student){
                if ($student->sex == 'Garçon') {
                    $data .= '<div class="col-sm-6 col-md-3">';
                    $data .= '<div class="iq-card">';
                    $data .= '<div class="iq-card-body text-center">';
                    $data .= '<div class="doc-profile">';
                    $data .= '    <img class="rounded-circle img-fluid avatar-80" src="'.url('/'.$student->image).'" alt="profile">';
                    $data .= '</div>';
                    $data .= '<div class="iq-doc-info mt-3">';
                    $data .= '<h4>'.$student->nom.' '.$student->pre.'</h4>';
                    $data .= '<p class="mb-0" >'.$student->id1.'</p>';
                    $data .= '</div>';
                    $data .= '<div class="iq-doc-social-info-garcon mt-3 mb-3">';
                    $data .= '<ul class="m-0 p-0 list-inline">';
                    $data .= '<li><a href="'.$student->facebook.'"><i class="ri-facebook-fill"></i></a></li>';
                    $data .= '<li><a href="'.$student->twitter.'"><i class="ri-twitter-fill"></i></a> </li>';
                    $data .= '<li><a href="'.$student->insta.'"><i class="ri-instagram-fill"></i></a></li>';
                    $data .= '<li><a href="'.$student->youtube.'"><i class="ri-youtube-fill"></i></a></li>';
                    $data .= '</ul>';
                    $data .= '</div>';
                    $data .= '<button type="button" class="btn btn-link" style="font-size: 22px">';
                    $data .= '<a href="'.url('admin/eleve/profil/'.$student->id).'"><i class="ri-eye-line" style="color: rgba(8, 155, 171, 1)"></i></a>';
                    $data .= '<i class="ri-delete-bin-2-fill" style="color: rgba(8, 155, 171, 1)"  data-toggle="modal" data-target="#exampleModal'.$student->id.'" ></i>';
                    $data .= '</button>';
                    $data .= '</div>';
                    $data .= '</div>';
                    $data .= '</div>';
                }else{
                    $data .= '<div class="col-sm-6 col-md-3">';
                    $data .= '<div class="iq-card">';
                    $data .= '<div class="iq-card-body text-center">';
                    $data .= '<div class="doc-profile">';
                    $data .= '<img class="rounded-circle img-fluid avatar-80" src="'.url('/'.$student->image).'" alt="profile">';
                    $data .= '</div>';
                    $data .= '<div class="iq-doc-info mt-3">';
                    $data .= '<h4>'.$student->nom.' '.$student->pre.'</h4>';
                    $data .= '<p class="mb-0" >'.$student->id1.'</p>';
                    $data .= '</div>';
                    $data .= '<div class="iq-doc-social-info-fille mt-3 mb-3">';
                    $data .= '<ul class="m-0 p-0 list-inline">';
                    $data .= '<li><a href="'.$student->facebook.'"><i class="ri-facebook-fill"></i></a></li>';
                    $data .= '<li><a href="'.$student->twitter.'"><i class="ri-twitter-fill"></i></a> </li>';
                    $data .= '<li><a href="'.$student->insta.'"><i class="ri-instagram-fill"></i></a></li>';
                    $data .= '<li><a href="'.$student->youtube.'"><i class="ri-youtube-fill"></i></a></li>';
                    $data .= '</ul>';
                    $data .= '</div>';
                    $data .= '<button type="button" class="btn btn-link" style="font-size: 22px">';
                    $data .= '<a href="'.url('admin/eleve/profil/'.$student->id).'"><i class="ri-eye-line" style="color: rgb(240, 147, 224)"></i></a>';
                    $data .= '<i class="ri-delete-bin-2-fill" style="color: rgba(240, 147, 224, 1)"  data-toggle="modal" data-target="#exampleModal'.$student->id.'" ></i>';
                    $data .= '</button>';
                    $data .= '</div>';
                    $data .= '</div>';
                $data .= '</div>';
                }
            }

        if (request()->massar == '') {
            $count = 'non';
        }

        return response()->json(['success'=> $data,'count'=> $count]);
    }

    public function ajax_get_Paiements()
    {
        
        $mois = request()->mois;
        $students = Student::get();
        $total = 0;
        $payé = 0;
        foreach ($students as $student) {
            $prix = Prix::where('student', $student->id)->first();
            $date1 = explode('-', $student->date_d );
            $mois1 = explode('-', $mois );
            $m1 = $mois1[0];
            $y1 = $mois1[1];
            $m = $date1[1];
            $y = $date1[2];
            // if (date('m') >= 9) {
            //     $year = date('Y');
            // }else{
            //     $year = date('Y')-1;
            // }
            if ($y == $y1) {
                if ($m <= $m1) {
                    $total = $total+$prix['m'.$m1];
                    $salaire = Frai::where('student', $student->id)->where('date', $mois)->get();
                    if (count($salaire) == 0) {
                    }else{
                        foreach ($salaire as $sal) {
                            $payé = $payé+$prix['m'.$m1];
                        }
                    }
                }
                $total1 = $total-$payé;
            }elseif ($y < $y1) {
                $total = $total+$prix['m'.$m1];
                $salaire = Frai::where('student', $student->id)->where('date', $mois)->get();
                
                if (count($salaire) == 0) {
                }else{
                    foreach ($salaire as $sal) {
                        $payé = $payé+$prix['m'.$m1];
                    }
                }
                $total1 = $total-$payé;

            }
        }
        return response()->json(['payé'=> $payé, 'total' => $total1]);
      
    }

    public function ajax_add_salaire1()
    {   
       
        $salaire = new Salaire();
        if (request()->fonction == 'staff') {
            $salaire->staff = request()->id;
            $salaire->prof = 'rien';
            $test = Staff::find(request()->id);
        }else{
            $salaire->prof = request()->id;
            $salaire->staff = 'rien';
            $test = Prof::find(request()->id);
        }
        $salaire->date = request()->mois;
        $salaire->salaire = request()->salaire1;

        $salaire->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'salaire';
        $tra->text = ' a valider le salaire de "'.$test->nom.' '.$test->pre.'" du mois '.request()->mois;

        $tra->save();

        return response()->json(['success'=> 'done']);
    }
    public function ajax_add_salaire2()
    {
        $frai = new Frai();
        for ($i1=0; $i1 < 10; $i1++) { 
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $value = '';
            for ($i = 0; $i < 20; $i++) {
                $value .= $characters[rand(0, $charactersLength - 1)];
            }
            $check = Frai::where('massar', $value)->get();
            if (count($check) == 0) {
                $i1 = 100;
            }else{
                $i1 = 1;
            }
        }
        $frai->student = request()->id;
        $frai->massar = $value;
        $frai->date = request()->mois;
        $frai->prix = request()->salaire1;

        $frai->save();

        $student = Student::find(request()->id);

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'frai';
        $tra->text = ' a valider le paiement de l\'éléve "'.$student->nom.' '.$student->pre.'" du mois '.request()->mois;

        $tra->save();

        return response()->json(['success'=> 'done', 'id' => $value]);
    }
    public function ajax_get_statistiques()
    {

        $charge = 0;
        $pay = 0;
        $salaire = 0;
        if (request()->date1 == request()->date2 or !request()->date2 or !request()->date1) {
            if (!request()->date1) {
                $date = explode('-', request()->date2);
            }elseif (!request()->date2) {
                $date = explode('-', request()->date1);
            }else{
                $date = explode('-', request()->date1);
            }
            $date1 = $date[0];
            $date2 = $date[1];
            $date3 = $date[2];
            $charges = Charge::whereDay('created_at', '=', $date3)->whereMonth('created_at', '=', $date2)->whereYear('created_at', '=', $date1)->get();
            foreach ($charges as $charge1) {
                $charge = $charge + $charge1->prix;
            }
            $pays = Frai::whereDay('created_at', '=', $date3)->whereMonth('created_at', '=', $date2)->whereYear('created_at', '=', $date1)->get();
            foreach ($pays as $pay1) {
                $pay = $pay + $pay1->prix;
            }
            $salaires = Salaire::whereDay('created_at', '=', $date3)->whereMonth('created_at', '=', $date2)->whereYear('created_at', '=', $date1)->get();
            //$salaires = Salaire::get();
            foreach ($salaires as $salaire1) {
                $salaire = $salaire + $salaire1->salaire;
            }
        }elseif(request()->date1 < request()->date2){
            $charges = Charge::whereBetween('created_at', [ request()->date1 ." 00:00:00", request()->date2 ." 23:59:59"])->get();
            foreach ($charges as $charge1) {
                $charge = $charge + $charge1->prix;
            }
            $pays = Frai::whereBetween('created_at', [ request()->date1 ." 00:00:00", request()->date2 ." 23:59:59"])->get();
            foreach ($pays as $pay1) {
                $pay = $pay + $pay1->prix;
            }
            $salaires = Salaire::whereBetween('created_at', [ request()->date1 ." 00:00:00", request()->date2 ." 23:59:59"])->get();
            //$salaires = Salaire::get();
            foreach ($salaires as $salaire1) {
                $salaire = $salaire + $salaire1->salaire;
            }
        }elseif(request()->date1 > request()->date2){
            $charges = Charge::whereBetween('created_at', [ request()->date2 ." 00:00:00", request()->date1 ." 23:59:59"])->get();
            foreach ($charges as $charge1) {
                $charge = $charge + $charge1->prix;
            }
            $pays = Frai::whereBetween('created_at', [ request()->date2 ." 00:00:00", request()->date1 ." 23:59:59"])->get();
            foreach ($pays as $pay1) {
                $pay = $pay + $pay1->prix;
            }
            $salaires = Salaire::whereBetween('created_at', [ request()->date2 ." 00:00:00", request()->date1 ." 23:59:59"])->get();
            //$salaires = Salaire::get();
            foreach ($salaires as $salaire1) {
                $salaire = $salaire + $salaire1->salaire;
            }
        }
        return response()->json([   'salaire'=> $salaire,
                                    'pay'=> $pay,
                                    'charge'=> $charge
                                    ]);
    }
}
