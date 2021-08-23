<?php

namespace App\Http\Controllers\Admin;

use App\Categorie;
use App\Classe;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Matiere;
use App\SalleModel;
use App\Cycle;
use App\Emploi;
use App\prof_classe;
use App\Student;
use App\Tracabilite;

class Backend extends Controller
{
    public function __construct()
    {
        Carbon::setlocale('fr');
    }

    public function Cycle()
    { 
        $cycles = Cycle::get();
        $categories = Categorie::get();
        $t = 0;
        foreach ($categories as $cat) {
            $cycle = Cycle::where('categorie', $cat->id)->get();
            $n = 0;
            foreach ($cycle as $key) {
                $n++;
            }
            $categories[$t]->count = $n;
            $t++;
        }
        $n = 0;
        foreach ($cycles as $cycle) {
            $class = Classe::where('cycle_id', $cycle->id)->get();
            $count = count($class);
            $student = Student::where('cycle', $cycle->id)->get();
            $count1 = count($student);
            $categorie = Categorie::find($cycle->categorie);
            $cycles[$n]->count = $count + $count1;
            $cycles[$n]->categorie = $categorie->name;
            $n++;
        }
        return view('admin/Cycle',['cycles' =>$cycles,'categories' => $categories]);
    }

    public function CyclePost()
    {
        request()->validate([

            'name' => ['required', 'string', 'max:50','unique:cycles'],
            'categorie' => ['required', 'string', 'max:150'],

        ]);

        $Cycle = new Cycle;
        $Cycle->name = request('name');
        $Cycle->categorie = request('categorie');
        $Cycle->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'ajouter';
        $tra->text = ' a ajouter un nouveau cycle "'.request()->name.'"';

        $tra->save();

        request()->session()->flash('create', 'Le cycle à crée avec succès');

        return back();
    }
    public function Categorie()
    {
        request()->validate([

            'name' => ['required', 'string', 'max:50','unique:categories'],

        ]);

        $Cycle = new Categorie;
        $Cycle->name = request('name');
        $Cycle->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'ajouter';
        $tra->text = ' a ajouter une nouvelle categorie "'.request()->name.'"';

        $tra->save();

        request()->session()->flash('create', 'La catégories à crée avec succès');

        return back();
    }
    
    public function CycleEdit()
    {
        request()->validate([

            'name' => ['required', 'string', 'max:150','unique:cycles,name,'.request()->id],
            'categorie' => ['required', 'string', 'max:150'],

        ]);

        $Cycle = Cycle::findOrFail(request('id'));
        $Cycle->name = request('name');
        $Cycle->categorie = request('categorie');

        $Cycle->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'modifier';
        $tra->text = ' a modifier les informations de le cycle "'.request()->name.'"';

        $tra->save();

        request()->session()->flash('create', 'Le nom du cycle à modifier avec succès');

        return back();
    }
    public function categorieEdit()
    {
        request()->validate([

            'name' => ['required', 'string', 'max:150','unique:categories,name,'.request()->id],

        ]);

        $categorie = Categorie::findOrFail(request('id'));
        $categorie->name = request('name');

        $categorie->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'modifier';
        $tra->text = ' a modifier les informations de le catégorie "'.request()->name.'"';

        $tra->save();

        request()->session()->flash('create', 'Le noùm du catégorie à modifier avec succès');

        return back();
    }

    public function delete_Cycle($id)
    {
        $Cycle = Cycle::findOrFail($id);

        $name = $Cycle->name;
        
        $Cycle->delete();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'delete';
        $tra->text = ' a supprimer le cycle "'.$name.'"';

        $tra->save();

        session()->flash('delete','Le cycle est supprimer ');

        return back();
    }
    public function delete_Categorie($id)
    {
        $Cycle = Categorie::findOrFail($id);

        $name = $Cycle->name;
        
        $Cycle->delete();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'delete';
        $tra->text = ' a supprimer la catégorie "'.$name.'"';

        $tra->save();

        session()->flash('delete','La categorie est supprimer ');

        return back();
    }



    












    public function Salle()
    {
        $salles = SalleModel::get();
        $n = 0;
        foreach ($salles as $salle) {
            $class = Emploi::where('salle', $salle->id)->get();
            $count = count($class);
            $salles[$n]->count = $count;
            $n++;
        }

        return view('admin/Salle',['salles' =>$salles]);
    }

    public function SallePost()
    {
        request()->validate([

            'name' => ['required', 'string', 'max:50','unique:salle_models'],

        ]);

        $salle = new SalleModel;
        $salle->name = request('name');
        $salle->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'ajouter';
        $tra->text = ' a ajouter une nouveau salle "'.request()->name.'"';

        $tra->save();

        request()->session()->flash('create', 'La salle à crée avec succès');

        return back();
    }

    public function SalleEdit()
    {
        request()->validate([

            'name' => ['required', 'string', 'max:50','unique:salle_models,name,'.request()->id],

        ]);

        $salle = SalleModel::findOrFail(request('id'));
        $salle->name = request('name');
        $salle->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'ajouter';
        $tra->text = ' a modifier le nom de la salle "'.request()->name.'"';

        $tra->save();

        request()->session()->flash('create', 'La salle à modifier avec succès');

        return back();
    }

    public function delete_salle($id)
    {
        $salle = SalleModel::findOrFail($id);

        $name = $salle->name;
        
        $salle->delete();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'delete';
        $tra->text = ' a supprimer la salle "'.$name.'"';

        $tra->save();
        

        session()->flash('delete','La salle est supprimer ');

        return back();
    }



















    public function Matiere()
    {
        $matieres = Matiere::get();
        $n = 0;
        foreach ($matieres as $cycle) {
            $class = Emploi::where('matiere', $cycle->id)->get();
            $count = count($class);
            $student = prof_classe::where('matiere', $cycle->id)->get();
            $count1 = count($student);
            $matieres[$n]->count = $count + $count1;
            $n++;
        }

        return view('admin/Matiere',['matieres' =>$matieres]);
    }

    public function MatierePost()
    {
        request()->validate([

            'name' => ['required', 'string', 'max:50','unique:matieres'],

        ]);

        $matiere = new Matiere;
        $matiere->name = request('name');
        $matiere->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'ajouter';
        $tra->text = ' a ajouter une nouveau matiere "'.request()->name.'"';

        $tra->save();

        request()->session()->flash('create', 'La matiére à crée avec succès');

        return back();
    }

    public function MatiereEdit()
    {
        request()->validate([

            'name' => ['required', 'string', 'max:150','unique:matieres,name,'.request()->id],

        ]);

        $matiere = Matiere::findOrFail(request('id'));
        $matiere->name = request('name');

        $matiere->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'modifier';
        $tra->text = ' a modifier les informations de la matiére "'.request()->name.'"';

        $tra->save();

        request()->session()->flash('create', 'La matiére à modifier avec succès');

        return back();
    }

    public function delete_Matiere($id)
    {
        $matiere = Matiere::findOrFail($id);

        $name = $matiere->name;
        
        $matiere->delete();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'delete';
        $tra->text = ' a supprimer la matiére "'.$name.'"';

        $tra->save();

        session()->flash('delete','La matiere est supprimer ');

        return back();
    }
}
