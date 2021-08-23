<?php

namespace App\Http\Controllers\admin;

use App\Commande;
use App\Http\Controllers\Controller;
use App\Produit;
use App\Prof;
use App\Staff;
use App\Tracabilite;
use App\TablePro;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function Ramsey\Uuid\v1;

class Product extends Controller
{
    public function __construct()
    {
        Carbon::setlocale('fr');
    }

    public function stock_produit()
    {
        $pros = Produit::paginate(16);
        return view('admin.products', ['pros' => $pros]);
    }

    public function stock_produit_ajoute()
    {
        request()->validate([
            'name' => 'required|unique:produits',
            'ref' => 'required|unique:produits',
            'quantité' => 'required',
            'prix' => 'required',
        ]);
        if (request()->hasFile('image')) {
            $image = request()->image;
            $image1 = time().'1.'.$image->getClientOriginalExtension();
            request()->image->move('images/produits/', $image1); 
            $image = 'images/produits/'.$image1;
        }else{
            $image = 'images/produit.jpg';
        }

        $produit = new Produit();
        $produit->name = request()->name;
        $produit->ref = request()->ref;
        $produit->quantité = request()->quantité;
        $produit->prix = request()->prix;
        $produit->min = request()->min;
        $produit->image = $image;

        $produit->save();

        $pro = new TablePro();
        $pro->name = $produit->id;
        $pro->ref = request()->ref;
        $pro->quantité = request()->quantité;
        $pro->prix = request()->prix;
        $pro->date = date('d/m/Y');
        $pro->user = 'admin';

        $pro->save();
        
        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'ajouter';
        $tra->text = ' a ajouter une nouveau produit "'.request()->name.'"';

        $tra->save();

        session()->flash('create', 'Le produit est ajouter avec success');

        return back();
    }

    public function stock_produit_ajoute_encien()
    {
        request()->validate([
            'quantité' => 'required',
            'prix' => 'required',
        ]);

        $produit = Produit::findOrFail(request()->id);
        
        if (request()->hasFile('image')) {
            $image = request()->image;
            $image1 = time().'1.'.$image->getClientOriginalExtension();
            request()->image->move('images/produits/', $image1); 
            $image = 'images/produits/'.$image1;
            if(file_exists(public_path().'/'.$produit->image))
            {
                unlink(public_path().'/'.$produit->image);
            }else{
                unlink($produit->image);
            }
        }else{
            $image = 'images/produit.jpg';
            $image = $produit->image;
        }

        $produit->quantité = request()->quantité + $produit->quantité;
        $produit->prix = request()->prix;

        $pro = new TablePro();
        $pro->name = $produit->id;
        $pro->quantité = $produit->quantité;
        $pro->prix = $produit->prix;
        $pro->user = 'admin';

        $pro->save();
        
        $produit->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'ajouter';
        $tra->text = ' a ajouter '.$produit->quantité.' pcs du produit "'.$produit->name.'"';

        $tra->save();

        session()->flash('create', 'Le produit est ajouter avec success');

        return back();
    }

    public function stock_produit_update()
    {
        request()->validate([
            'name' => 'required',
            'ref' => 'required',
        ]);

        $produit = Produit::findOrFail(request()->id);
        
        $produit->name = request()->name ;
        $produit->ref = request()->ref;
        $produit->min = request()->min;
        
        $produit->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'modifier';
        $tra->text = ' a modifier les informations de le produit "'.request()->name.'"';

        $tra->save();

        session()->flash('create', 'Le produit est modifier avec success');

        return back();
    }

    public function delete_pro($id)
    {
        $pro = Produit::findOrFail($id);

        $name = $pro->name;
        
        if ($pro->image != 'images/produit.jpg') {
            if(file_exists(public_path().'/'.$pro->image))
            {
                unlink(public_path().'/'.$pro->image);
            }else{
                unlink($pro->image);
            }
        }

        $pro->delete();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'delete';
        $tra->text = ' a supprimer le produit "'.$name.'"';

        $tra->save();

        session()->flash('delete','Le produit est supprimer ');

        return back();
    }

    public function liste()
    {
        if (date('m') >= 9) {
           $year = date('Y');
        }else{
            $year = date('Y')-1;
        }
        $listes = TablePro::where('created_at', '>=', $year.'-09-01 00:00:00')->get();
        $n = 0;
        foreach ($listes as $liste) {
            $pro = Produit::find($liste->name);
            if ($pro == NULL) {
                $listes[$n]->name = '( produit supprimer ) ';
            }else{
                $listes[$n]->name = $pro->name;
            }
            if ($liste->user != 'admin') {
                $staff = Staff::find($liste->user);
                if ($staff == NULL) {
                    $listes[$n]->user = '( utilisateur supprimer ) ';
                }else{
                    $listes[$n]->user = $staff->nom.' '.$staff->pre;
                }
            }
            $n++;
        }

        return view('admin.liste', ['listes' => $listes]);
    }

    public function stock_commande()
    {
        $produits = Produit::get();
        $listes = Commande::get();
        $n = 0;
        foreach ($listes as $liste) {
           if ($liste->fonction == 'Professeur') {
               $staff = Prof::find($liste->staff);
               if ($staff == NULL) {
                   $listes[$n]->staff = '( compte est supprimer )';
               }else{
                $listes[$n]->staff = $staff->nom.' '.$staff->pre;
               }
            }else{
                $staff = Staff::find($liste->staff);
               if ($staff == NULL) {
                   $listes[$n]->staff = '( compte est supprimer )';
               }else{
                $listes[$n]->staff = $staff->nom.' '.$staff->pre;
               }
            }
            $n++;
        }
        return view('admin.commande', ['produits' => $produits,'listes' => $listes]);
    }

    public function stock_commande_ajoute()
    {
        request()->validate([
            'pro' => 'required',
            'quantité' => 'required|min:1',
            'fonction' => 'required',
            'staff' => 'required',
        ]);

        if (request()->quantité <= 0) {

            session()->flash('delete', 'La quantité ne peut pas être 0 ou mois');

            return back();
        }

        $commande = new Commande();

        $pro = Produit::where('name',request()->pro)->first();
        
        if ($pro->quantité < request()->quantité) {
            
            session()->flash('delete', 'La quantité en stock ne suffit pas');

            return back();
        }
        $commande->pro = request()->pro;
        $commande->fonction = request()->fonction;
        $commande->staff = request()->staff;
        $commande->quantité = request()->quantité;

        $pro->quantité = $pro->quantité - request()->quantité;

        $pro->save();

        $commande->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'modifier';
        $tra->text = ' a modifier les informations de le produit "'.request()->name.'"';

        $tra->save();

        session()->flash('create', 'Le commande est ajouter avec success');

        return back();
    }
}
