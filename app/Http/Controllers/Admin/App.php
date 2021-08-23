<?php

namespace App\Http\Controllers\admin;

use App\Annance;
use App\Biblio;
use App\Categorie;
use App\Classe;
use App\Club;
use App\Club_Students;
use App\Contact;
use App\Cour;
use App\Cycle;
use App\Frai;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Matiere;
use App\Prof;
use App\Student;
use App\Tracabilite;
use App\Visiter;
use Illuminate\Http\Request;

class App extends Controller
{
    public function __construct()
    {
        Carbon::setlocale('fr');
    }
    public function Biblio()
    {
        $biblios = Biblio::paginate(10);
        
        return view('admin.biblio', ['biblios' => $biblios]);
        
    }

    public function BiblioPost()
    {
        request()->validate([
            'name' =>'required',
            'matiere' =>'required',
            'file' =>'required',
        ]);

        if (request()->hasFile('file')) {
            $file = request()->file;
            $file1 = time().'.'. $file->getClientOriginalExtension();
            request()->file->move('images/books',$file1);
            $file = 'images/books/'.$file1;
        }

        $biblio = new Biblio();

        $biblio->name = request()->name;
        $biblio->matiere = request()->matiere;
        $biblio->file = $file;
        $biblio->date = date('d/m/Y');
        $biblio->add_by = Auth::user()->id;

        $biblio->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'ajouter';
        $tra->text = ' a ajouter un nouveau livre "'.request()->name.'"';

        $tra->save();

        request()->session()->flash('create', 'nouveau livre ajouté avec succes');

        return back();
    }

    public function Download_book($id)
    {
        $file = Biblio::findOrFail($id);
        
        if(file_exists(public_path().'/'.$file->file))
        {
            return response()->download(public_path().'/'.$file->file);
        }else{
            return response()->download($file->file);
        }
    }

    public function recu($id)
    {
        $frai = Frai::where('massar' , $id)->first();
        $student = Student::findOrFail($frai->student);
        if (date('m') > 9) {
            $year = date('Y');
            $year1 = date('Y')+1;
        }else{
            $year = date('Y')-1;
            $year1 = date('Y');
        }
        $cycle = Cycle::find($student->cycle);
        $url = url('admin/recu/check/'.$id);
        return view('admin.recu', ['frai' => $frai, 
                                    'student' =>$student, 
                                    'year' =>$year, 
                                    'year1' =>$year1,
                                    'cycle' =>$cycle,
                                    'url' =>$url,
                                    ]);
    }

    public function delete_book($id)
    {
        $book = Biblio::findOrFail($id);

        $name = $book->name;
        if(file_exists(public_path().'/'.$book->file))
        {
            unlink(public_path().'/'.$book->file);
        }else{
            unlink($book->file);
        }
        $book->delete();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'delete';
        $tra->text = ' a supprimer le livre "'.$name.'"';

        $tra->save();

        session()->flash('delete', 'le livre est supprimer avec succés');

        return back();
    }

    public function cours()
    {
        $categories = Categorie::get();

        if ( !isset(request()->id) or request()->id == '') {
            $cycles = Cycle::get();
            $cycle1 = Cycle::where('categorie', 'préscolaire')->get();
            $cycle2 = Cycle::where('categorie', 'primaire')->get();
            $cycle3 = Cycle::where('categorie', 'E.collégial')->get();
            $cours = Cour::get();
            $matieres = array();
            $matieres1 = Matiere::get();
            $id = 'tous';

        }else{
            $cycles = Cycle::get();
            $cycle = Cycle::find(request()->id);
            $cycle1 = Cycle::where('categorie', 'préscolaire')->get();
            $cycle2 = Cycle::where('categorie', 'primaire')->get();
            $cycle3 = Cycle::where('categorie', 'E.collégial')->get();
            $cours = Cour::where('cycle',request()->id)->get();
            $matieres = Matiere::where('categorie',$cycle->categorie)->get();
            $matieres1 = Matiere::get();
            $id = request()->id;
    
        }
        return view('admin.cours', [
            'cycles' => $cycles,
            'cycle1' => $cycle1,
            'cycle2' => $cycle2,
            'cycle3' => $cycle3,
            'cours' => $cours,
            'matieres' => $matieres,
            'categories' => $categories,
            'matieres' => $matieres,
            'matieres1' => $matieres1,
            'id' => $id,
        ]);
    }

    public function cours1()
    {
        if (request()->id == '') {
            $cycles = Cycle::get();
            $cycle1 = Cycle::where('categorie', 'préscolaire')->get();
            $cycle2 = Cycle::where('categorie', 'primaire')->get();
            $cycle3 = Cycle::where('categorie', 'E.collégial')->get();
            $cours = Cour::get();
            $matieres = array();
            $matieres1 = Matiere::get();
            $id = 'tous';

        }else{
            $cycles = Cycle::get();
            $cycle = Cycle::find(request()->id);
            $cycle1 = Cycle::where('categorie', 'préscolaire')->get();
            $cycle2 = Cycle::where('categorie', 'primaire')->get();
            $cycle3 = Cycle::where('categorie', 'E.collégial')->get();
            $cours = Cour::where('cycle',request()->id)->get();
            $matieres = Matiere::where('categorie',$cycle->categorie)->get();
            $matieres1 = Matiere::get();
            $id = request()->id;
    
        }
        return view('admin.cours', [
            'cycles' => $cycles,
            'cycle1' => $cycle1,
            'cycle2' => $cycle2,
            'cycle3' => $cycle3,
            'cours' => $cours,
            'matieres' => $matieres,
            'matieres1' => $matieres1,
            'id' => $id,
        ]);
    }

    public function coursPost()
    {
        request()->validate([
            'titre' => 'required',
            's_titre' => 'required',
            'video' => 'required',
            'cycle' => 'required',
            'matiere' => 'required',
        ]);

        $cours = new Cour();

        $cours->titre = request()->titre;
        $cours->s_titre = request()->s_titre;
        $cours->cycle = request()->cycle;
        $cours->matiere = request()->matiere;
        $cours->video = request()->video;
        $cours->categorie = request()->categorie;

        $cours->save();
        
        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'ajouter';
        $tra->text = ' a ajouter un nouveau cour "'.request()->title.'"';

        $tra->save();

        session()->flash('create','Le cour est ajouter avec succés');

        return back();
    }
    
    public function coursEdit($id)
    {
        request()->validate([
            'titre1' => 'required',
            's_titre1' => 'required',
            'video1' => 'required',
            'cycle1' => 'required',
            'matiere1' => 'required',
        ]);

        $cours = Cour::findOrFail($id);
        $cours->titre = request()->titre1;
        $cours->s_titre = request()->s_titre1;
        $cours->cycle = request()->cycle1;
        $cours->matiere = request()->matiere1;
        $cours->video = request()->video1;
        $cours->categorie = request()->categorie1;

        $cours->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'modifier';
        $tra->text = ' a modifier le cour "'.request()->title.'"';

        $tra->save();

        session()->flash('create','Le cour est modifier avec succés');

        return back();
    }

    public function delete_cour($id)
    {
        $cour = Cour::findOrFail($id);
        $name = $cour->titre;
        $cour->delete();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'delete';
        $tra->text = ' a supprimer le cour "'.$name.'"';

        $tra->save();

        session()->flash('delete', 'le cour est supprimer avec succés');

        return back();
    }

    public function visites()
    {
        $visiters = Visiter::get();
        return view('admin.visites', ['visiters' => $visiters]);
    }

    public function visites_ajoute()
    {
        request()->validate([
            'objectif' => 'required',
            'cin' => 'required',
            'nom' => 'required',
            'time1' => 'required',
            'time2' => 'required',
            'tele' => 'required'
        ]);

        if (request()->hasFile('image')) {
            $file = request()->image;
            $file1 = time().'.'. $file->getClientOriginalExtension();
            request()->image->move('images/visites',$file1);
            $file = 'images/visites/'.$file1;
        }else{
            $file = '';
        }

        $visiter = new Visiter();

        $visiter->nom = request()->nom;
        $visiter->objectif = request()->objectif;
        $visiter->cin = request()->cin;
        $visiter->tele = request()->tele;
        $visiter->date = date('Y-m-d');
        $visiter->time1 = request()->time1;
        $visiter->time2 = request()->time2;
        $visiter->image = $file;
        $visiter->note = request()->note;

        $visiter->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'ajouter';
        $tra->text = ' a ajouter un nouveau visiteur "'.request()->nom.'"';
        $tra->save();

        session()->flash('create', 'Le visiteur est ajouter avec success');

        return back();

    }

    public function delete_visite($id)
    {
        $visite = Visiter::findOrFail($id);
        if ($visite->image != 'visiter.png') {
            if(file_exists(public_path().'/'.$visite->image))
            {
                    unlink(public_path().'/'.$visite->image);
            }else{
                    unlink($visite->image);
            }
        }
        $name = $visite->nom;
        $visite->delete();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'delete';
        $tra->text = ' a supprimer le visiteur "'.$name.'"';

        $tra->save();

        session()->flash('delete', 'le vsiteur est supprimer avec succés');

        return back();
    }

    public function contact()
    {
        $visiters = Contact::get();
        return view('admin.contacts', ['visiters' => $visiters]);
    }

    public function contact_ajoute()
    {
        request()->validate([
            'nom' => 'required',
            'tele' => 'required',
            'mail' => 'required',
            'adress' => 'required',
        ]);

        $contact = new Contact();

        $contact->nom = request()->nom;
        $contact->adress = request()->adress;
        $contact->tele = request()->tele;
        $contact->mail = request()->mail;

        $contact->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'ajouter';
        $tra->text = ' a ajouter un nouveau contact "'.request()->nom.'"';

        $tra->save();

        session()->flash('create', 'Le contact est ajouter avec success');

        return back();

    }

    public function contact_edit()
    {
        request()->validate([
            'nom' => 'required',
            'tele' => 'required',
            'mail' => 'required',
            'adress' => 'required',
        ]);

        $contact = Contact::findOrFail(request()->id);

        $contact->nom = request()->nom;
        $contact->adress = request()->adress;
        $contact->tele = request()->tele;
        $contact->mail = request()->mail;

        $contact->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'modifier';
        $tra->text = ' a modifier le contact "'.request()->name.'"';

        $tra->save();

        session()->flash('create', 'Le contact est modifier avec success');

        return back();

    }

    public function delete_contact($id)
    {
        $visite = Contact::findOrFail($id);

        $name = $visite->nom;

        $visite->delete();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'delete';
        $tra->text = ' a supprimer le contact "'.$name.'"';

        $tra->save();

        session()->flash('delete', 'le contact est supprimer avec succés');

        return back();
    }

    public function club()
    {
        $clubs = Club::get();
        $profs = Prof::get();
        $n = 0;
        foreach ($clubs as $club) {
            $students = Club_Students::where('club', $club->id)->get();
            $i = 0;
            foreach ($students as $student) {
                $i++;
            }
            $prof = Prof::find($club->prof);
            if (!empty($prof)) {
                $clubs[$n]->prof = $prof->nom.' '.$prof->pre;
            }else{
                $clubs[$n]->prof = 'Rien';
            }
            $clubs[$n]->students = $i;
            $n++;
        }
        return view('admin.clubs', ['clubs' => $clubs, 'profs' => $profs]);
    }

    public function clubPost()
    {
        request()->validate([
            'nom' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (request()->hasFile('image')) {
            $image = request()->image;
            $image1 = time().'1.'.$image->getClientOriginalExtension();
            request()->image->move('images/students/', $image1); 
            $image = 'images/students/'.$image1;
        }else{
            $image = 'club.jpg';
        }

        $club = new Club();
        $club->name = request()->nom;
        $club->prof = request()->prof;
        $club->image = $image;
        
        $club->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'ajouter';
        $tra->text = ' a ajouter un nouveau club "'.request()->nom.'"';

        $tra->save();

        session()->flash('create', 'Le club est crée avec success');

        return back();
    }
    
    public function clubEdit()
    {
        request()->validate([
            'nom' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $club = Club::findOrFail(request()->id);

        if (request()->hasFile('image')) {
            $image = request()->image;
            $image1 = time().'1.'.$image->getClientOriginalExtension();
            request()->image->move('images/students/', $image1); 
            $image = 'images/students/'.$image1;
        }else{
            $image = $club->image;
        }

        $club->name = request()->nom;
        $club->prof = request()->prof;
        $club->image = $image;
        
        $club->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'modifier';
        $tra->text = ' a modifier le club "'.request()->name.'"';

        $tra->save();

        session()->flash('create', 'Le club est modifier avec success');

        return back();
    }

    public function delete_club($id)
    {
        $club = Club::findOrFail($id);
        $name = $club->name;
        $students = Club_Students::where('club', $id)->get();
            
            foreach ($students as $student) {
                $stud = Club_Students::findOrFail($student->id);

                $stud->delete();
            }

        $club->delete();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'delete';
        $tra->text = ' a supprimer le contact "'.$name.'"';

        $tra->save();

        session()->flash('delete', 'le club est supprimer avec succés');

        return back();
    }

    public function club_profil($id)
    {
        $club = Club::findOrFail($id);
        $annonces = Annance::where('club', $club->id)->get();
        $prof = Prof::find($club->prof);
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
        return view('admin.club_profil', ['club' => $club, 'students' => $students, 'annonces' => $annonces, 'prof' => $prof]);
    }

    public function delete_club_student($id) {
        $student = Club_students::findOrFail($id);
        $club = Club::find($student->club);
        $name1 = $club->name;
        $student = Student::find($student->club);
        $name = $student->nom.' '.$student->pre;
        $student->delete();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'delete';
        $tra->text = ' a retiré "'.$name.'" du club "'.$name1.'"';

        $tra->save();

        session()->flash('delete', 'l\'étudiant est supprimer avec succés');

        return back();
    }

    public function clubupdate($id){
        $student = Club_students::findOrFail($id);
        $student1 = Student::find($student->student);
        $student->validate = 'oui';
        $student->date = date('Y-m-d');
        $club = Club::find($student->club);
         
        $student->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'validate';
        $tra->text = ' a valider l\éléve "'.$student1->nom.' '.$student1->pre.'" sur le club "'.$club->name.'"';

        $tra->save();
        session()->flash('create', 'l\'étudiant est Valider avec succés');

        return back();
    }

}
