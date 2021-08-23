<?php

namespace App\Http\Controllers\admin;

use App\Categorie;
use App\Http\Controllers\Controller;
use App\SalleModel;
use App\Cycle;
use App\Matiere;
use App\Staff;
use App\Classe;
use App\Transport;
use App\Trajet;
use App\Emploi;
use App\examen_prochain;
use App\Prof;
use Illuminate\Support\Carbon;
use App\Tracabilite;
use App\Student;
use Illuminate\Http\Request;

class Departement extends Controller
{
    public function __construct()
    {
        Carbon::setlocale('fr');
        // $this->middleware('Permission_modifier:class', ['only' => '']);
    }

    








    
    



    

    
    













    























    public function Transport()
    {
        $transport = Transport::get();
        $n = 0;
        foreach ($transport as $tran) {
            $transport[$n]->tajet = 'non';
            $trajet = Trajet::where('transport', $tran->id)->get();
            if (count($trajet) > 0) {
                $transport[$n]->tajet = 'oui';
            }
            $n++;
        }
        $accomp = Staff::where('post', 'Accompagnement')->get();
        $choffeur = Staff::where('post', 'Chauffeur')->get();
        return view('admin/transport',['accomps'=> $accomp, 'choffeurs' => $choffeur,'transports' => $transport]);
    }

    public function TransportPost()
    {
        request()->validate([
            
            'name' => ['required', 'string', 'max:50','unique:transports'],
            'A' => ['required', 'string', 'max:50','unique:transports'],
            'B' => ['required', 'string', 'max:50'],
            'C' => ['required', 'string', 'max:50'],
            'marque' => ['required', 'string', 'max:50'],
            'model' => ['required', 'string', 'max:50'],
            'accom' => ['required', 'string', 'max:50','unique:transports'],
            'choffeur' => ['required', 'string', 'max:50','unique:transports'],
            'note' => ['required', 'string', 'max:50','unique:transports'],
            
            ]);
            
        $transport = new Transport;
            
        $transport->name = request('name');
        $transport->A = request('A');
        $transport->B = request('B');
        $transport->C = request('C');
        $transport->marque = request('marque');
        $transport->model = request('model');
        $transport->accom = request('accom');
        $transport->choffeur= request('choffeur');
        $transport->note = request('note');
        $transport->id1 = 'VH'.request('A');
        $transport->num = request('A').' '.request('B').' '.request('C');

        $transport->save();

        // $accomp = Staff::find(request('accom'));
        // $accomp->trans = $transport->id;
        // $accomp->save();

        // $choffeur = Staff::find(request('choffeur'));
        // $choffeur->trans = $transport->id;
        // $choffeur->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'ajouter';
        $tra->text = ' a ajouter un nouveau transport "'.request()->name.'"';

        $tra->save();

        request()->session()->flash('create', 'Le transport à crée avec succès');

        return back();
    }

    public function TransportEdit()
    {
        request()->validate([
            
            'name' => ['required', 'string', 'max:50','unique:transports,name,'.request()->id],
            'A' => ['required', 'string', 'max:50','unique:transports,A,'.request()->id],
            'B' => ['required', 'string', 'max:50'],
            'C' => ['required', 'string', 'max:50'],
            'marque' => ['required', 'string', 'max:50'],
            'model' => ['required', 'string', 'max:50'],
            'accom' => ['required', 'string', 'max:50','unique:transports,accom,'.request()->id],
            'choffeur' => ['required', 'string', 'max:50','unique:transports,choffeur,'.request()->id],
            'note' => ['required', 'string', 'max:50'],
            
            ]);
            
        $transport = Transport::findOrFail(request()->id);
        $accom = Transport::where('accom', request()->accom );
        foreach ($accom as $key) {
            if ($key->id != $transport->id) {
                request()->session()->flash('delete', 'L\'accompagnement est déja utuliser dans un autre transport');
    
                return back();
            }
        }

        $choffeur = Transport::where('choffeur', request()->choffeur );
        foreach ($choffeur as $key) {
            if ($key->id != $transport->id) {

                request()->session()->flash('delete', 'Le chauffeur est déja utuliser dans un autre transport');
    
                return back();
            }
        }

        $transport->name = request('name');
        $transport->A = request('A');
        $transport->B = request('B');
        $transport->C = request('C');
        $transport->marque = request('marque');
        $transport->model = request('model');
        $transport->accom = request('accom');
        $transport->choffeur= request('choffeur');
        $transport->note = request('note');
        $transport->id1 = 'VH'.request('A');
        $transport->num = request('A').' '.request('B').' '.request('C');

        $transport->save();

        // $accomp = Staff::find(request('accom'));
        // $accomp->trans = $transport->id;
        // $accomp->save();

        // $choffeur = Staff::find(request('choffeur'));
        // $choffeur->trans = $transport->id;
        // $choffeur->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'modifier';
        $tra->text = ' a modifier les informations du transport "'.request()->name.'"';

        $tra->save();

        request()->session()->flash('create', 'Le transport à crée avec succès');

        return back();
    }

    public function delete_Transport($id)
    {
        $transport = Transport::findOrFail($id);

        $name = $transport->name;
        
        $transport->delete();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'delete';
        $tra->text = ' a supprimer le transport "'.$name.'"';

        $tra->save();

        session()->flash('delete','Le transport est supprimer ');

        return back();
    }

    public function Transport_profil($id)
    {
         $trajet = Trajet::where('transport',$id)->get();
         $students = Student::get();
         $class = Classe::get();
        return view('admin/transport_profil', [
                                                    'trajets'=> $trajet,
                                                    'class'=> $class,
                                                    'students'=> $students,
                                                    'id' => $id
                                                ]);
    }

    public function Transport_profil_post()
    {
        request()->validate([

            'name' => ['required', 'string', 'max:50'],

        ]);

        $trajet = new Trajet;
        $trajet->name = request('name');
        $trajet->transport = request('id');
        $trajet->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'ajouter';
        $tra->text = ' a ajouter un nouveau trajet "'.request()->name.'"';

        $tra->save();

        request()->session()->flash('create', 'Le trajet à crée avec succès');

        return back();
    }

    public function Transport_profil_edit($id)
    {
        request()->validate([

            'name' => ['required', 'string', 'max:50'],

        ]);

        $trajet = Trajet::findOrFail($id);
        $trajet->name = request('name');
        $trajet->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'modifier';
        $tra->text = ' a modifier les informations de le trajet "'.request()->name.'"';

        $tra->save();

        request()->session()->flash('create', 'Le trajet est modifié avec succès');

        return back();
    }

    public function Transport_profil_delete($id)
    {
        $trajet = trajet::findOrFail($id);

        $name = $trajet->name;
        
        $trajet->delete();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'delete';
        $tra->text = ' a supprimer le trajet "'.$name.'"';

        $tra->save();

        session()->flash('delete','Le trajet est supprimer ');

        return back();
    }

    public function Class()
    {

        $class = Classe::with('cycle')->paginate(10);
        $categories = Categorie::get();
        $n = 0;
        foreach ($class as $classe) {
            $student = Student::where('class', $classe->id)->get();
            $count = count($student);
            $categorie = Categorie::find($classe->categorie);
            $class[$n]->count = $count;
            $class[$n]->categorie = $categorie->name;
            $n++;
        }
        $n = 0;
        $cycles = Cycle::get();
        foreach ($cycles as $cycle) {
            $categorie = Categorie::find($cycle->categorie);
            $cycles[$n]->categorie = $categorie->name;
            $n++;
        }

        return view('admin/Class',['classes' =>$class,'cycles' =>$cycles,'categories' =>$categories]);
    }

    public function ClassPost()
    {
        request()->validate([
            
            'name' => ['required', 'string', 'max:50','unique:classes'],
            'categorie' => ['required', 'string', 'max:250'],
            'cycle' => ['required', 'string', 'max:50'],
            
            ]);

        $class = new Classe;
        $class->name = request('name');
        $class->categorie = request('categorie');

        $class->cycle_id = request('cycle');

        $class->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'ajouter';
        $tra->text = ' a ajouter une nouveau class "'.request()->name.'"';

        $tra->save();

        request()->session()->flash('create', 'Crée avec succès');

        return back();
    }
    public function ClassEdit()
    {
        request()->validate([
            
            'name' => ['required', 'string', 'max:50', 'min:3','unique:classes,name,'.request()->id],
            'categorie' => ['required', 'string', 'max:250'],
            'cycle' => ['required', 'string', 'max:250'],
            
            ]);

        $class = Classe::findOrFail(request()->id);
        $class->name = request('name');
        $class->categorie = request('categorie');
        
        $cycle = Cycle::find(request('cycle'));

        $class->cycle()->associate($cycle)->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'ajouter';
        $tra->text = ' a modifier les informations de la class "'.request()->name.'"';

        $tra->save();

        request()->session()->flash('create', 'Crée avec succès');

        return back();
    }

    public function delete_Class($id)
    {
        $Classe = Classe::findOrFail($id);

        $name = $Classe->name;
        
        $Classe->delete();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'delete';
        $tra->text = ' a supprimer la class "'.$name.'"';

        $tra->save();
        
        session()->flash('delete','La classe est supprimer ');

        return back();
    }
    public function Horaire()
    {
        $classes = Classe::get();
        return view('admin/Horaire', ['classes' => $classes]);
    }

    public function HoraireGet($id)
    {
        $classes = Classe::get();
        $class = Classe::findOrFail($id);
        $categorie = Categorie::find($class->categorie);
        $salles = SalleModel::get();
        $matieres = Matiere::get();
        $times = array('8h30', '9h30', '10h30', '11h30', '12h30', '13h30', '14h30', '15h30', '16h30', '17h30', '18h30');
        $days = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi');
        $cours = array();
        for ($i = 0; $i < 6; $i++) { 
            $cours[$i] = array();
            foreach ($times as $time) {
                $cours[$i][$time] = '';
                $cours1[$i][$time] = '';
                $cours_id[$i][$time] = '';
                $emploi = Emploi::where('class',$class->id)->where('heur',$time)->where('jour',$days[$i])->get();
                $emploi1 = Emploi::where('class',$class->id)->get();
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
        return view('admin/Horaire1', [ 
            'classtable' => $class,
            'categorie' => $categorie,
            'times' => $times,
            'days' => $days,
            'emploi1' => $emploi1,
            'cours_id' => $cours_id,
            'cours' => $cours,
            'cours1' => $cours1,
            'salles' => $salles,
            'classes' => $classes,
            'matieres' => $matieres]);
    }

    public function Emploi()
    {
        request()->validate([
            'salle' => ['required', 'string', 'max:50'],
            'matiere' => ['required', 'string', 'max:50'],
            'class' => ['required', 'string', 'max:50'],
            'heur' => ['required', 'string', 'max:50'],
            'jour' => ['required', 'string', 'max:50'],
        ]);

        $emploi1 = Emploi::where('heur',request()->heur)->where('jour',request()->jour)->where('salle',request()->salle)->get();
        foreach ($emploi1 as $emploi2) {
                
            session()->flash('delete', "la salle est déjà occupé");

            
            return back();
        }
        
        $emploi = new Emploi;

        $emploi->salle = request()->salle;
        $emploi->matiere = request()->matiere;
        $emploi->class = request()->class;
        $emploi->heur = request()->heur;
        $emploi->jour = request()->jour;

        $emploi->save();

        $class = Classe::find(request()->class);

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'ajouter';
        $tra->text = ' a ajouter un nouveau cour sur l\'emploi du temp de la class "'.$class->name.'"';

        $tra->save();

        request()->session()->flash('create', "L'emploi à crée avec succès");

        return back();

    }

    public function HoraireeEdit()
    {
        request()->validate([
            'salle' => ['required', 'string', 'max:50'],
            'matiere' => ['required', 'string', 'max:50'],
            'id' => ['required'],
        ]);
        
            $emploi = Emploi::findOrFail(request()->id);

            $emploi->salle = request()->salle;
            $emploi->matiere = request()->matiere;

            $emploi->save();

            $class = Classe::findOrFail(request()->class);


            $tra = new Tracabilite();
            $tra->name = 'Admin';
            $tra->genre = 'modifier';
            $tra->text = ' a modifier l\'emploi du temp de la class "'.$class->name.'"';

            $tra->save();

            request()->session()->flash('create', "L'emploi à été modifier avec succès");

            return back();
        
    }

    public function delete_Horaire($id)
    {
        $emploi = Emploi::findOrFail($id);
        $class = Classe::findOrFail($emploi->class);
        
        $emploi->delete();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'delete';
        $tra->text = ' a supprimer un champ sur l\'emploi du temp de la class "'.$class->name.'"';

        $tra->save();
        

        session()->flash('delete',"L'emploi est supprimer ");

        return back();
    }

    public function ClassProfil($id)
    {
        $class = Classe::findOrFail($id);

        $students = Student::where('class', $id)->orderBy('class_num', 'ASC')->get();

        return view('admin/class_profil', ['class' => $class, 'students' => $students]);
    }

    public function ClassProfilEdit()
    {
        request()->validate([
            'class_num' => 'required'
        ]);

        $student = Student::findOrFail(request()->id);
        $test = Student::where('class_num', request()->class_num)->where('class', request()->class)->get();
        foreach ($test as $key) {
            request()->session()->flash('delete', 'Ce numéro est déja utuliser par une autre éléve');

            return back();
        }

        $student->class_num = request()->class_num;

        $student->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'modifier';
        $tra->text = ' a modifier le numéro de "'.$student->nom.' '.$student->pre.'"';

        $tra->save();

        session()->flash('create', 'Le numéro est modifier avec succés');

        return back();

    }

    public function Exam_prochaine()
    {
        $exams = examen_prochain::orderBy('date', 'DESC')->get();
        return view('admin.Exam_prochaine', ['exams' => $exams]);
    }

    public function base_donne_eleve()
    {
        $students = Student::get();

        $n = 0;
        foreach ($students as $student) {
            $cycle = Cycle::find($student->cycle);
            $class = Classe::find($student->class);
            if ($cycle) {
                $students[$n]->cycle = $cycle->name;
            }
            if ($class) {
                $students[$n]->class = $class->name;
            }
            $n++;
        }

        return view('admin/base_donne', ['students' => $students]);
    }

    public function base_donne_grh()
    {
        
        $staffs = Staff::all();
        $profs = Prof::all();
        if (is_array($profs) and is_array($staffs)) {
            $all = array_merge($staffs,$profs);
        } else {
            
            $n = count($staffs);
            $staffs[$n+1] = $profs[0];
            $all = $staffs;
        }
        
        return view('admin/base_donne_staff', ['all' => $all]);
    }
}
