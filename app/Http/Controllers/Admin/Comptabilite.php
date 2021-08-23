<?php

namespace App\Http\Controllers\admin;

use App\Categorie;
use App\Charge;
use App\charge_A;
use App\Classe;
use App\Cycle;
use App\Frai;
use App\Http\Controllers\Controller;
use App\Prix;
use App\Prof;
use App\Salaire;
use App\Staff;
use App\Tracabilite;
use App\Student;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class Comptabilite extends Controller
{
    public function __construct()
    {
        Carbon::setlocale('fr');
    }

    public function salaire()
    {
        $staffs = Staff::get();
        $profs = Prof::get();
        $n = 0;
        $n1 = 0;
        
        //  $listes = TablePro::where('created_at', '>=', $year.'-09-01 00:00:00')->get();
        foreach ($staffs as $staff) {
            if (date('m') >= 9) {
                $year = date('Y');
                $year1 = $year+1;
            }else{
                $year = date('Y')-1;
                $year1 = $year+1;
            }
            $t = 0;
            $date = explode(' ', $staff->date1);
            $date1 = explode('-', $staff->date1);
            $m = $date1[1];
            $y = $date1[0];
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
                            $t = date('m') - $m;
                        }else{
                            $t = date('m') + 1 - $m;
                        }
                    }else{
                        if (date('d') < 27) {
                            $t = date('m') - $m;
                        }else{
                            $t = date('m') + 1 - $m;
                        }
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
                $salaire = Salaire::where('staff', $staff->id)->where('date', $m.'-'.$year)->get();
                if (count($salaire) == 0) {
                    $ok = $m.'-'.$year;
                    array_push($mois,$ok);
                }else{
                    array_push($mois,'rien');
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
            $staffs[$n]->mois = $mois;
            $n++;
            $t = 0;
        }
        $n=0;
        foreach ($profs as $prof) {
            if (date('m') >= 9) {
                $year = date('Y');
                $year1 = $year+1;
            }else{
                $year = date('Y')-1;
                $year1 = $year+1;
            }
            $date = explode(' ', $prof->date1);
            $date1 = explode('-', $prof->date1);
            $m = $date1[1];
            $y = $date1[0];
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
                        if (date('d') < 27) {
                            $t = date('m') - $m;
                        }else{
                            $t = date('m') + 1 - $m;
                        }
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
                $salaire = Salaire::where('prof', $prof->id)->where('date', $m.'-'.$year)->get();
                if (count($salaire) == 0) {
                    $ok = $m.'-'.$year;
                    array_push($mois,$ok);
                }else{
                    array_push($mois,'rien');
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
            $profs[$n]->mois = $mois;
            $n++;
            $t = 0;
        }
        return view('admin.salaire', ['staffs' => $staffs , 'profs' => $profs]);
    }

    function paiement (){
        $students = Student::get();
        
        if (date('m') >= 9) {
            $t = date('m') - 8;
        }elseif(date('m') == 8 or date('m') == 7){
            $t = 10;
        }else{
            $t = 4 + date('m');
        }

        if (date('m' < 9)) {
            $year = date('Y');
            $year1 = date('Y')+1;
        }else{
            $year = date('Y')-1;
            $year1 = date('Y');
        }
        $test = date('m') +1-1;
        $n = 0;
        $les_mois = array();
        for ($i=0; $i < $t; $i++) { 
            if ($test < 10) {
                $test = '0'.$test;
            }
            if ($test < 9) {
                $les_mois[$n] = $test.'-'.$year1;
            }else{
                $les_mois[$n] = $test.'-'.$year;
            }
            if ($test == 1) {
                $test = 12;
            }else{
                $test = $test-1;
            }
            $n++;
        }
        $payé = 0;
        $total = 0;
        foreach ($students as $student) {
            $frais = Frai::where('student', $student->id)->where('date', $les_mois[0])->get();
            $value = explode('-', $les_mois[0]);
            $prix = Prix::where('student', $student->id)->first();
            foreach ($frais as $frai) {
                $payé = $payé+$prix['m'.$value[0]];
            }
            $total = $total+$prix['m'.$value[0]];
        }

        $t = 0;
        $n = 0;

        //  $listes = TablePro::where('created_at', '>=', $year.'-09-01 00:00:00')->get();

        foreach ($students as $student) {
            $cycle = Cycle::find($student->cycle);
            $students[$n]->cycle = $cycle->name; 
            $categorie = Categorie::find($student->categorie);
            $students[$n]->categorie = $categorie->name; 
            $class = Classe::find($student->class);
            if ($class) {
                $prix = Prix::where('student', $student->id)->first();
                $students[$n]->class = $class->name; 
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
                        $salaire = Frai::where('student', $student->id)->where('date', $m.'-'.$year)->first();
                        
                        $ok = $m.'-'.$year;
                        if ($salaire) {
                            $ok1 = array('ok' => $ok,'etat' => 'oui' );
                            array_push($mois,$ok1);
                        }else{
                            $ok1 = array('ok' => $ok,'etat' => 'non','prix' => $prix['m'.$m] );
                            array_push($mois,$ok1);
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
        return view('admin.paiement', [
                                        'students' => $students, 
                                        'mois' => $les_mois, 
                                        'payé' => $payé, 
                                        'total' => $total
                                        ]);
    }

    public function charges()
    {
        $charges = Charge::where('categorie', '!=', 'annuelle')->get();
        $charges2 = Charge::where('categorie', 'annuelle')->get();
        $charges1 = charge_A::get();
        if (date('m') < 9) {
            $year = date('Y')-1;
            $year1 = date('Y');
        }else{
            $year = date('Y');
            $year1 = date('Y')+1;
        }
        return view('admin.charges', ['charges' => $charges,'charges1' => $charges1,'charges2' => $charges2,'year' => $year,'year1' => $year1]);
    }
    public function charge_ajoute()
    {
        request()->validate([
            'name' => 'required',
            'cat' => 'required',
            'prix' => 'required',
            'date' => 'required',
        ]);

        if (request()->hasFile('image')) {
            $image = request()->image;
            $image1 = time().'.'. $image->getClientOriginalExtension();
            request()->image->move(public_path('images/charge'),$image1);
            $image = 'images/charge/'.$image1;
        }else{
            $image = '';
        }

        $charge = new Charge();
        $charge->name = request()->name;
        $charge->categorie = request()->cat;
        $charge->image = $image;
        $charge->prix = request()->prix;
        $charge->date = request()->date;

        $charge->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'ajouter';
        $tra->text = ' a ajouter une nouveau charge "'.request()->name.'"';

        $tra->save();

        session()->flash('create', 'Nouveau charge ajouter avec success ');

        return back();
        
    }
    public function charge_ajoute1()
    {
        request()->validate([
            'date' => 'required',
        ]);

        if (request()->hasFile('image')) {
            $image = request()->image;
            $image1 = time().'.'. $image->getClientOriginalExtension();
            request()->image->move(public_path('images/charge'),$image1);
            $image = 'images/charge/'.$image1;
        }else{
            $image = '';
        }

        $charge_a = charge_A::find(request()->id);

        $charge = new Charge();
        $charge->name = $charge_a->name;
        $charge->categorie = 'annuelle';
        $charge->image = $image;
        $charge->prix = $charge_a->prix;
        $charge->date = request()->date;

        $charge->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'ajouter';
        $tra->text = ' a ajouter une nouveau charge "'.request()->name.'"';

        $tra->save();

        session()->flash('create', 'Nouveau charge ajouter avec success ');

        return back();
        
    }
    public function charge_a_ajoute()
    {
        request()->validate([
            'name' => 'required',
            'prix' => 'required',
        ]);

        // if (request()->hasFile('image')) {
        //     $image = request()->image;
        //     $image1 = time().'.'. $image->getClientOriginalExtension();
        //     request()->image->move(public_path('images/charge'),$image1);
        //     $image = 'images/charge/'.$image1;
        // }else{
        //     $image = '';
        // }

        $charge = new charge_A();
        $charge->name = request()->name;
        $charge->prix = request()->prix;

        $charge->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'ajouter';
        $tra->text = ' a ajouter une nouveau charge annelle "'.request()->name.'"';

        $tra->save();

        session()->flash('create', 'Nouveau charge ajouter avec success ');

        return back();
        
    }

    public function charge_modifier()
    {
        request()->validate([
            'name' => 'required',
            'cat' => 'required',
            'prix' => 'required',
            'date' => 'required',
        ]);

        $charge = Charge::findOrFail(request()->id);
        if (request()->hasFile('image')) {
            $image = request()->image;
            $image1 = time().'.'. $image->getClientOriginalExtension();
            request()->image->move(public_path('images/charge'),$image1);
            $image = 'images/charge/'.$image1;
            if ($charge->image != '') {
                if(file_exists(public_path().'/'.$charge->image))
                {
                    unlink(public_path().'/'.$charge->image);
                }else{
                    unlink($charge->image);
                }
            }
            $charge->image = $image;
        }
        $charge->name = request()->name;
        $charge->categorie = request()->cat;
        $charge->prix = request()->prix;
        $charge->date = request()->date;

        $charge->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'modifier';
        $tra->text = ' a modifier la charge "'.request()->name.'"';

        $tra->save();

        session()->flash('create', 'La charge est modifier avec success ');

        return back();
    }
    
    public function charge_modifier1()
    {
        request()->validate([
            'name' => 'required',
            'prix' => 'required',
        ]);

        $charge = charge_A::findOrFail(request()->id);

        $charge->name = request()->name;
        $charge->prix = request()->prix;

        $charge->save();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'modifier';
        $tra->text = ' a modifier la charge annuelle "'.request()->name.'"';

        $tra->save();

        session()->flash('create', 'La charge est modifier avec success ');

        return back();
    }

    public function delete_charge($id)
    {
        $charge = Charge::findOrFail($id);
        $name = $charge->name;
        if ($charge->image != '') {
            if(file_exists(public_path().'/'.$charge->image))
            {
                unlink(public_path().'/'.$charge->image);
            }else{
                unlink($charge->image);
            }
        }
        $charge->delete();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'delete';
        $tra->text = ' a supprimer la charge "'.$name.'"';

        $tra->save();

        session()->flash('delete', 'charge est supprimer avec succés');

        return back();
    }
    public function delete_charge1($id)
    {
        $charge = charge_A::findOrFail($id);
        $name = $charge->name;
        if ($charge->image != '') {
            if(file_exists(public_path().'/'.$charge->image))
            {
                unlink(public_path().'/'.$charge->image);
            }else{
                unlink($charge->image);
            }
        }
        $charge->delete();

        $tra = new Tracabilite();
        $tra->name = 'Admin';
        $tra->genre = 'delete';
        $tra->text = ' a supprimer la charge annelle "'.$name.'"';

        $tra->save();

        session()->flash('delete', 'charge est supprimer avec succés');

        return back();
    }

    public function statistique()
    {
        if (date('m') >= 9) {
            $year = date('Y');
            $year1 = $year+1;
        }else{
            $year = date('Y')-1;
            $year1 = $year+1;
        }
        $charges = Charge::where('date', '>=', '2019-09-01')->get();
        $charge1 = ['1' => 0,'2' => 0,'3' => 0,'4' => 0,'5' => 0,'6' => 0,'7' => 0,'8' => 0,'9' => 0,'10' => 0,'11' => 0,'12' => 0,];
        $frai1 = ['1' => 0,'2' => 0,'3' => 0,'4' => 0,'5' => 0,'6' => 0,'7' => 0,'8' => 0,'9' => 0,'10' => 0,'11' => 0,'12' => 0,];
        $salaire1 = ['1' => 0,'2' => 0,'3' => 0,'4' => 0,'5' => 0,'6' => 0,'7' => 0,'8' => 0,'9' => 0,'10' => 0,'11' => 0,'12' => 0,];
        foreach ($charges as $charge) {
            $date = explode('-', $charge->date);
            if ($year == $date[0] and '09' == $date[1]) {
                $charge1['1'] = $charge1['1'] + $charge->prix;
            }
            if ($year == $date[0] and '10' == $date[1]) {
                $charge1['2'] = $charge1['2'] + $charge->prix;
            }
            if ($year == $date[0] and '11' == $date[1]) {
                $charge1['3'] = $charge1['3'] + $charge->prix;
            }
            if ($year == $date[0] and '12' == $date[1]) {
                $charge1['4'] = $charge1['4'] + $charge->prix;
            }
            if ($year1 == $date[0] and '01' == $date[1]) {
                $charge1['5'] = $charge1['5'] + $charge->prix;
            }
            if ($year1 == $date[0] and '02' == $date[1]) {
                $charge1['6'] = $charge1['6'] + $charge->prix;
            }
            if ($year1 == $date[0] and '03' == $date[1]) {
                $charge1['7'] = $charge1['7'] + $charge->prix;
            }
            if ($year1 == $date[0] and '04' == $date[1]) {
                $charge1['8'] = $charge1['8'] + $charge->prix;
            }
            if ($year1 == $date[0] and '05' == $date[1]) {
                $charge1['9'] = $charge1['9'] + $charge->prix;
            }
            if ($year1 == $date[0] and '06' == $date[1]) {
                $charge1['10'] = $charge1['10'] + $charge->prix;
            }
            if ($year1 == $date[0] and '07' == $date[1]) {
                $charge1['11'] = $charge1['11'] + $charge->prix;
            }
            if ($year1 == $date[0] and '08' == $date[1]) {
                $charge1['12'] = $charge1['12'] + $charge->prix;
            }
        }
        // dd(date('Y').date('m'));
        if (date('Y').date('m') < $year.'10' ) {
            // if (date('m') >= 10 and date('d') < 27) {
            // }else{
            // }
            $charge1['2'] = 'non';
        }
        if (date('Y').date('m') < $year.'11') {
            // if (date('m')+1 >= 11 and date('d') < 27) {
            // }else{
            // }
            $charge1['3'] = 'non';
        }
        if (date('Y').date('m') < $year.'12') {
            // if (date('m')+1 >= 12 and date('d') < 27) {
            // }else{
            // }
            $charge1['4'] = 'non';
        }

        if (date('Y').date('m') < $year1.'01') {
            // if (date('m')+1 >= 1 and date('d') < 27) {
            // $charge1['5'] = 'non';
            // }else{
            // }
            $charge1['5'] = 'non';
        }
        if (date('Y').date('m') < $year1.'02') {
            // if (date('m')+1 >= 2 and date('d') < 27) {
            // }else{
            // }
            $charge1['6'] = 'non';
        }
        if (date('Y').date('m') < $year1.'03') {
            // if (date('m')+1 >= 3 and date('d') < 27) {
            // }else{
            // }
            $charge1['7'] = 'non';
        }
        if (date('Y').date('m') < $year1.'04') {
            // if (date('m')+1 >= 4 and date('d') < 27) {
            // }else{
            // }
            $charge1['8'] = 'non';
        }
        if (date('Y').date('m') < $year1.'05') {
            // if (date('m')+1 >= 5 and date('d') < 27) {
            // }else{
            // }
            $charge1['9'] = 'non';
        }
        if (date('Y').date('m') < $year1.'06') {
            // if (date('m')+1 >= 6 and date('d') < 27) {
            // }else{
            // }
            $charge1['10'] = 'non';
        }
        if (date('Y').date('m') < $year1.'07') {
            // if (date('m')+1 >= 7 and date('d') < 27) {
            // }else{
            // }
            $charge1['11'] = 'non';
        }
        if (date('Y').date('m') < $year1.'08') {
            // if (date('m')+1 >= 8 and date('d') < 27) {
            // }else{
            // }
            $charge1['12'] = 'non';
        }
        $salaires = Salaire::get();
        foreach ($salaires as $salaire) {
            $date = explode('-', $salaire->date);
            if ($year == $date[1] and '09' == $date[0]) {
                $salaire1['1'] = $salaire1['1'] + $salaire->salaire;
            }
            if ($year == $date[1] and '10' == $date[0]) {
                $salaire1['2'] = $salaire1['2'] + $salaire->salaire;
            }
            if ($year == $date[1] and '11' == $date[0]) {
                $salaire1['3'] = $salaire1['3'] + $salaire->salaire;
            }
            if ($year == $date[1] and '12' == $date[0]) {
                $salaire1['4'] = $salaire1['4'] + $salaire->salaire;
            }
            if ($year1 == $date[1] and '01' == $date[0]) {
                $salaire1['5'] = $salaire1['5'] + $salaire->salaire;
            }
            if ($year1 == $date[1] and '02' == $date[0]) {
                $salaire1['6'] = $salaire1['6'] + $salaire->salaire;
            }
            if ($year1 == $date[1] and '03' == $date[0]) {
                $salaire1['7'] = $salaire1['7'] + $salaire->salaire;
            }
            if ($year1 == $date[1] and '04' == $date[0]) {
                $salaire1['8'] = $salaire1['8'] + $salaire->salaire;
            }
            if ($year1 == $date[1] and '05' == $date[0]) {
                $salaire1['9'] = $salaire1['9'] + $salaire->salaire;
            }
            if ($year1 == $date[1] and '06' == $date[0]) {
                $salaire1['10'] = $salaire1['10'] + $salaire->salaire;
            }
            if ($year1 == $date[1] and '07' == $date[0]) {
                $salaire1['11'] = $salaire1['11'] + $salaire->salaire;
            }
            if ($year1 == $date[1] and '08' == $date[0]) {
                $salaire1['12'] = $salaire1['12'] + $salaire->salaire;
            }
        }
        if (date('Y').date('m') < $year.'11') {
            // if (date('m')+1 >= 11 and date('d') < 27) {
            // }else{
            // }
            $salaire1['3'] = 'non';
        }
        if (date('Y').date('m') < $year.'12') {
            // if (date('m')+1 >= 12 and date('d') < 27) {
            // }else{
            // }
            $salaire1['4'] = 'non';
        }
        if (date('Y').date('m') < $year1.'01') {
            // if (date('m')+1 >= 1 and date('d') < 27) {
            // }else{
            // }
            $salaire1['5'] = 'non';
        }
        if (date('Y').date('m') < $year1.'02') {
            // if (date('m')+1 >= 2 and date('d') < 27) {
            // }else{
            // }
            $salaire1['6'] = 'non';
        }
        if (date('Y').date('m') < $year1.'03') {
            // if (date('m')+1 >= 3 and date('d') < 27) {
            // }else{
            // }
            $salaire1['7'] = 'non';
        }
        if (date('Y').date('m') < $year1.'04') {
            // if (date('m')+1 >= 4 and date('d') < 27) {
            // }else{
            // }
            $salaire1['8'] = 'non';
        }
        if (date('Y').date('m') < $year1.'05') {
            // if (date('m')+1 >= 5 and date('d') < 27) {
            // }else{
            // }
            $salaire1['9'] = 'non';
        }
        if (date('Y').date('m') < $year1.'06') {
            // if (date('m')+1 >= 6 and date('d') < 27) {
            // }else{
            // }
            $salaire1['10'] = 'non';
        }
        if (date('Y').date('m') < $year1.'07') {
            // if (date('m')+1 >= 7 and date('d') < 27) {
            // }else{
            // }
            $salaire1['11'] = 'non';
        }
        if (date('Y').date('m') < $year1.'08') {
            // if (date('m')+1 >= 8 and date('d') < 27) {
            // }else{
            // }
            $salaire1['12'] = 'non';
        }
        $frais = Frai::get();

        foreach ($frais as $frai) {
            $date = explode('-', $frai->date);
            if ($year == $date[1] and '09' == $date[0]) {
                $frai1['1'] = $frai1['1'] + $frai->prix;
            }
            if ($year == $date[1] and '10' == $date[0]) {
                $frai1['2'] = $frai1['2'] + $frai->prix;
            }
            if ($year == $date[1] and '11' == $date[0]) {
                $frai1['3'] = $frai1['3'] + $frai->prix;
            }
            if ($year == $date[1] and '12' == $date[0]) {
                $frai1['4'] = $frai1['4'] + $frai->prix;
            }
            if ($year1 == $date[1] and '01' == $date[0]) {
                $frai1['5'] = $frai1['5'] + $frai->prix;
            }
            if ($year1 == $date[1] and '02' == $date[0]) {
                $frai1['6'] = $frai1['6'] + $frai->prix;
            }
            if ($year1 == $date[1] and '03' == $date[0]) {
                $frai1['7'] = $frai1['7'] + $frai->prix;
            }
            if ($year1 == $date[1] and '04' == $date[0]) {
                $frai1['8'] = $frai1['8'] + $frai->prix;
            }
            if ($year1 == $date[1] and '05' == $date[0]) {
                $frai1['9'] = $frai1['9'] + $frai->prix;
            }
            if ($year1 == $date[1] and '06' == $date[0]) {
                $frai1['10'] = $frai1['10'] + $frai->prix;
            }
            if ($year1 == $date[1] and '07' == $date[0]) {
                $frai1['11'] = $frai1['11'] + $frai->prix;
            }
            if ($year1 == $date[1] and '08' == $date[0]) {
                $frai1['12'] = $frai1['12'] + $frai->prix;
            }
        }
        if (date('Y').date('m') < $year.'11') {
            // if (date('m')+1 >= 11 and date('d') < 27) {
            // }else{
            // }
            $frai1['3'] = 'non';
        }
        if (date('Y').date('m') < $year.'12') {
            // if (date('m')+1 >= 12 and date('d') < 27) {
            // }else{
            // }
            $frai1['4'] = 'non';
        }
        if (date('Y').date('m') < $year1.'01') {
            // if (date('m')+1 >= 1 and date('d') < 27) {
            // }else{
            // }
            $frai1['5'] = 'non';
        }
        if (date('Y').date('m') < $year1.'02') {
            // if (date('m')+1 >= 2 and date('d') < 27) {
            // }else{
            // }
            $frai1['6'] = 'non';
        }
        if (date('Y').date('m') < $year1.'03') {
            // if (date('m')+1 >= 3 and date('d') < 27) {
            // }else{
            // }
            $frai1['7'] = 'non';
        }
        if (date('Y').date('m') < $year1.'04') {
            // if (date('m')+1 >= 4 and date('d') < 27) {
            // }else{
            // }
            $frai1['8'] = 'non';
        }
        if (date('Y').date('m') < $year1.'05') {
            // if (date('m')+1 >= 5 and date('d') < 27) {
            // }else{
            // }
            $frai1['9'] = 'non';
        }
        if (date('Y').date('m') < $year1.'06') {
            // if (date('m')+1 >= 6 and date('d') < 27) {
            // }else{
            // }
            $frai1['10'] = 'non';
        }
        if (date('Y').date('m') < $year1.'07') {
            // if (date('m')+1 >= 7 and date('d') < 27) {
            // }else{
            // }
            $frai1['11'] = 'non';
        }
        if (date('Y').date('m') < $year1.'08') {
            // if (date('m')+1 >= 8 and date('d') < 27) {
            // }else{
            // }
            $frai1['12'] = 'non';
        }
        return view('admin.statistique', [
            'charges' => $charge1,
            'salaires' => $salaire1,
            'frais' => $frai1,
        ]);
    }

    public function Tracabilite($test)
    {
        // $date = Carbon::today()->subDays(7);where('created_at', '>=', $date)->

        if ($test == 'all') {
            $tracs = Tracabilite::orderBy('created_at', 'DESC')->paginate(10);
        }else{
            $tracs = Tracabilite::where('genre' , $test)->orderBy('created_at', 'DESC')->paginate(10);
        }
        $n = 0;
        foreach ($tracs as $trac) {
            $date = explode(' ', $trac->created_at);
            $date1 = explode('-', $date[0]);
            if ($date1[2] == date('d')) {
                $tracs[$n]->date = Carbon::parse($trac->created_at)->diffForHumans();
            }else{
                $tracs[$n]->date = $date[0];
            }
            $n++;
        }
        return view('admin.trac', ['tracs' => $tracs]);
    }

    public function update1()
    {
        // Tracabilite::query()->delete();
        return response()->json(['success'=> 'data']);
    }
}
