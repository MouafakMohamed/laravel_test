<?php

namespace App\Http\Controllers\Prof;

use App\Absence;
use App\Classe;
use App\Http\Controllers\Controller;
use App\Matiere;
use App\Emploi;
use App\prof_classe;
use App\SalleModel;
use App\Cycle;
use App\Exam_class;
use App\Frai;
use App\Friends;
use App\Note;
use App\Prof;
use App\Salaire;
use App\Staff;
use App\Trajet;
use App\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class Dashboard extends Controller
{
    public function __construct()
    {
        Carbon::setlocale('fr');
    }

    public function index()
    {
        $classes = prof_classe::where('prof',Auth::guard('prof')->user()->id)->get();
        $classes1 = prof_classe::where('prof',Auth::guard('prof')->user()->id)->get();
        $n = 0;
        foreach ($classes as $class) {
            $class1 = Classe::find($class->class);
            $salle = SalleModel::find($class->salle);
            $matiere = Matiere::find($class->matiere);
            $classes[$n]->class =  $class1->name;
            $classes[$n]->class_id =  $class1->id;
            $classes[$n]->matiere =  $matiere->name;
            $n++;
        }
        $times = array('8h30', '9h30', '10h30', '11h30', '12h30', '13h30', '14h30', '15h30', '16h30', '17h30', '18h30');
        $days = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
        $cours = array();
        for ($i = 0; $i < 6; $i++) { 
            $cours[$i] = array();
            foreach ($times as $time) {
                $cours[$i][$time] = '';
                $cours1[$i][$time] = '';
                $cours_id[$i][$time] = '';
                foreach ($classes1 as $class1) {
                    $emploi = Emploi::where('class' ,$class1->class)->where('matiere' ,$class1->matiere)->where('heur',$time)->where('jour',$days[$i])->get();
                    $emploi1 = Emploi::where('class' ,$class1->class)->get();
                    foreach ($emploi as $key) {
                        if (!empty($key)) {
                                $salla = SalleModel::find($key->salle);
                                $mata = Matiere::find($key->matiere);
                                $cours[$i][$time] = $mata->name;
                                $cours_id[$i][$time] = $key->id;
                                $cours1[$i][$time] = $salla->name;
                                
                        }
                    }
                }
            }
        }
        // for ($i = 0; $i < 6; $i++) { 
        //     $cours[$i] = array();
        //     foreach ($times as $time) {
        //         $cours[$i][$time] = '';
        //         $cours1[$i][$time] = '';
        //         $cours_id[$i][$time] = '';
        //         $emploi = Emploi::where('class',$class->id)->where('heur',$time)->where('jour',$days[$i])->get();
        //         $emploi1 = Emploi::where('class',$class->id)->get();
        //         foreach ($emploi as $key) {
        //             if (!empty($key)) {
        //                 $salla = SalleModel::find($key->salle);
        //                 $mata = Matiere::find($key->matiere);
        //                 $cours[$i][$time] = $mata->name;
        //                 $cours_id[$i][$time] = $key->id;
        //                 $cours1[$i][$time] = $salla->name;
        //             }
        //         }
        //     }
        // }
        $colors = array('1' => 'bg-success',
                        '3' => 'bg-danger',
                        '4' => 'bg-warning',
                        '5' => 'bg-dark',
                        '7' => 'bg-info',
                        '2' => 'bg-primary',
                        '6' => 'bg-secondary'
    );
        return view('prof.home', [
            'classes' => $classes,
            'times' => $times,
            'days' => $days,
            'emploi1' => $emploi1,
            'cours_id' => $cours_id,
            'cours' => $cours,
            'cours1' => $cours1,
            'colors' => $colors,
            ]);
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
    
    public function ajax_get_class_by_exam()
    {

        $classes = Exam_class::where('exam', request()->exam)->get();

        $data = '<option  selected="" disabled="">-- Choisir -- </option>';

        foreach ($classes as $classe) {
            $class = Classe::find($classe->class);
            $data .= '<option value="'.$class->id.'" >'.$class->name.'</option>'; 
        }
        return response()->json(['success'=> $data]);
    }
    
    public function ajax_get_student_by_exam()
    {

        $students = Student::where('class', request()->classe)->orderBy('class_num', 'asc')->get();

        $data = '';

        foreach ($students as $student) {
            $exam = Note::where('eleve', $student->id)->where('exam', request()->exam)->get();
            $count = count($exam);
            $salam = "change10('".url('prof/ajax_get_add_student_note')."', '".$student->id."', '".request()->exam."')";
            if ($count > 0) {
                foreach ($exam as $exams) {
                    $note = $exams->note;
                }
                $data .= '<tr>
                            <td style="text-align: center">'. $student->class_num .'</td>
                            <td style="text-align: center">'. $student->nom .' '. $student->pre .'</td>
                            <td style="text-align: center">
                            <input type="number" id="input'.$student->id.'" class="form-control" value="'.$note.'" onchange="change10('.$salam.')">
                            </td>
                        </tr>';
            }else{

                $data .= '<tr>
                            <td style="text-align: center">'. $student->class_num .'</td>
                            <td style="text-align: center">'. $student->nom .' '. $student->pre .'</td>
                            <td style="text-align: center">
                            <input type="number" id="input'.$student->id.'" class="form-control" onchange="'.$salam.'">
                            </td>
                        </tr>';
            }
        }
        return response()->json(['success'=> $data]);
    }

    public function ajax_get_add_student_note()
    {
        $exam = Note::where('eleve', request()->id)->where('exam', request()->exam)->get();
        $student = Student::find(request()->id);
        $count = count($exam);
        if ($count > 0) {
            foreach ($exam as $exams) {
                $exams->note = request()->note;
                $exams->save();
                $data = 'done';
            }
            
        }else{
            $note = new Note();

            $note->note = request()->note;
            $note->eleve = request()->id;
            $note->exam = request()->exam;
            $note->prof = Auth::guard('prof')->user()->id;
            $note->class = $student->class;

            $note->save();

            $data = 'done1';
        }
        // $data = 'salam';
        return response()->json(['success'=> $data]);
    }
    
    public function ajax_get_student_by_phone()
    {
        $phone = request()->phone;
        $students = Student::where('tele', 'LIKE', "%$phone%")->get();
        $data = '<table id="datatable" class="table table-striped table-bordered" ><thead><tr><th>Image</th><th>Nom</th><th>Prénom</th><th>Class</th><th>Prix</th><th>Mois</th><th>Validation</th></tr></thead><tbody>';
        foreach ($students as $student) {
            $datem = date('m');
            $y = date('Y');
            if ($datem < 9) {
                $p = $datem - 1;
                $t = $datem[1];
                $n = 0;
                for ($i=9; $i < 13; $i++) { 
                    if ($i == 9) {
                        $time[$n] = '0'.$i;
                    }
                    $time[$n] = $i;
                    $n++;
                }
                for ($i=1; $i < 8; $i++) { 
                    $time[$n] = '0'.$i;
                    $n++;
                }
                    if ($p < 10) {
                        $p = '0'.$p;
                    }
            }else {
                $p = $datem ;
                $n = 0;
                for ($i=9; $i < $p; $i++) { 
                    $time[$n] = $i;
                    $n++;
                }
            }
            foreach ($time as $row) {
                $frai = Frai::where('date', $row)->get();
                if (count($frai) == 0) {
                    $data .= "<tr>";
                    $data .= "<td><a href='".url('admin/eleve/profil/'.$student->id)."' class='iq-media'><img class='img-fluid avatar-40 rounded-circle' src='".url($student->image)."'></a></td>";
                    $data .= "<td>".$student->nom."</td>";
                    $data .= "<td>".$student->pre."</td>";
                    $class = Classe::find($student->class);
                    $data .= "<td>".$class->name."</td>";
                    $data .= "<td>".$student->prix."</td>";
                    $data .= "<td>".$row.'-'.date('Y')."</td>";
                    if (empty($student->prix)) {
                        $data .= "<td></td>";
                    }else{
                        $data .= "<td><button class='btn btn-success'>Valider</button></td>";
                    }
                    $data .= "</tr>";
                }
            }
        }
        $data .= '</tbody></table>';
        
        return response()->json(['success'=> $data]);
    }

    public function ajax_add_salaire1()
    {
        $salaire = new Salaire();
        if (request()->fonction == 'staff') {
           $salaire->staff = request()->id;
           $salaire->prof = 'rien';
        }else{
            $salaire->prof = request()->id;
            $salaire->staff = 'rien';
        }
        $salaire->date = request()->mois;
        $salaire->salaire = request()->salaire;

        $salaire->save();

        return response()->json(['success'=> 'done']);
    }
    public function ajax_add_salaire2()
    {
        $frai = new Frai();

        $frai->student = request()->id;
        $frai->massar = request()->fonction;
        $frai->date = request()->mois;
        $frai->prix = request()->salaire;

        $frai->save();

        return response()->json(['success'=> 'done']);
    }

    public function ajax_get_statistiques()
    {
        
        return response()->json([   'salaire'=> '1',
                                    'pay'=> '2',
                                    'charge'=> '3'
                                    ]);
    }

    public function ajax_add_absence()
    {
        $c = 0;
        $absences = Absence::where('student',request()->id)->where('heure',request()->heure)->where('heure1',request()->heure1)->where('date',date('Y-m-d'))->where('prof',Auth::guard('prof')->user()->id)->get();
        foreach ($absences as $key) {
            $c++;
        }
        if ($c == 0) {
            if (request()->ok == 'A') { 
                $valeur = 'present';
            }elseif (request()->ok == 'B') {
                $valeur = 'absence';
            }elseif (request()->ok == 'C') {
                $valeur = 'retard';
            }elseif (request()->ok == 'D') {
                $valeur = 'present';
            }
                $ab = new Absence();

                $ab->class = request()->classe;
                $ab->student = request()->id;
                $ab->prof = Auth::guard('prof')->user()->id;
                $ab->etat = $valeur;
                $ab->heure = request()->heure;
                $ab->heure1 = request()->heure1;
                $ab->date = date('Y-m-d');
                $ab->jour = request()->jour;
                $ab->desc = request()->desc;
    
                $ab->save();

                return response()->json(['success'=> 'ok']);
            
            return response()->json(['success'=> 'non']);

        }else{
            foreach ($absences as $absence) {
                $ab = Absence::find($absence->id);
                if (request()->ok == 'A' and $ab->desc == '' and request()->desc == '') { 

                    $ab->delete();
                    return response()->json(['success'=> 'delete']);

                }else{
                    $valeur = 'present';
                    if (request()->ok == 'B') {
                        $valeur = 'absence';
                    }elseif (request()->ok == 'C') {
                        $valeur = 'retard';
                    }elseif (request()->ok == 'D') {
                        $valeur = $ab->etat;
                    }
    
                    $ab->etat = $valeur;

                    $ab->desc = request()->desc;
        
                    $ab->save();

                    return response()->json(['success'=> 'modifier']);
                }

            }
            return response()->json(['success'=> 'done']);
        } 
            
    }
}
