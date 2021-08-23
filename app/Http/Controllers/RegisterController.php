<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ResetPassword;
use App\User;
use App\Staff;
use App\Prof;
use App\Licence;
use App\Categorie;
use App\Cycle;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class RegisterController extends Controller
{
    public function index()
    {
        $users = User::all();
        if ($users->isEmpty()) {
            return view('register');
        }else{
            return view('auth.login');
        }
    }

    public function register()
    {
        return view('register');
    }

    public function PasswordChange(){
        $user = new User();
    
        $user->nom = 'mouafak';
        $user->logo = 'images/users/1628774386jpg';
        $user->ville = 'ville';
        $user->tele = '0606060606';
        $user->fix = '0505050505';
        $user->adress = 'adress';
        $user->email = 'mohamed_mouafak@outlook.com';
        $user->password = Hash::make('mouafak001');

        $user->save();

        if (Auth::guard('web')->attempt(['email' => 'mohamed_mouafak@outlook.com', 'password' => 'mouafak001'])) {
            return  redirect('admin/Dashboard');
        }else{
            return  redirect(url('login'));
        }
    }

    public function registerPost()
    {
        
        request()->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nom' => ['required', 'string', 'max:20'],
            'adress' => ['required', 'string', 'max:255'],
            'ville' => ['required', 'string', 'max:255'],
            'licence' => ['required', 'string', 'max:255'],
            'id_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        $data = request();
            $licence = Licence::find(1);
            $Préscolaire = array('Petite section','Moyenne section','Grande section');
            $Primair = array('CP','CE1','CE2','CM1','CM2','CE6');
            $collége = array('1ére Collége','2éme Collége','3éme Collége');
            $Lycée = array('T.C','1ére BAC','2éme BAC');
                if ($licence->licence == $data['id_name'] and Hash::check($data->licence, $licence->id_name)) {
                // if (request()->hasFile('logo')) {
                    $logo = $data['logo'];
                    $logo1 = time().$logo->getClientOriginalExtension();
                    $data['logo']->move('images/users/', $logo1); 
                    $logo = 'images/users/'.$logo1;
                // }else{
                //     $logo = 'assets/logo.png';
                // }
                    if (isset($data['Préscolaire'])) {
                        if ($data['Préscolaire'] == 'on') {
                            $categorie = new Categorie();
                            $categorie->name = 'Préscolaire';
                            $categorie->save();
                            for ($i=0; $i < 3; $i++) { 
                                $cycle = new Cycle();
                                $cycle->name = $Préscolaire[$i];
                                $cycle->categorie = $categorie->id;
                                $cycle->save();
                            }
                        }
                    }
                    if (isset($data['Primaire'])) {
                        if ($data['Primaire'] == 'on') {
                            $categorie = new Categorie();
                            $categorie->name = 'Primaire';
                            $categorie->save();
                            for ($i=0; $i < 6; $i++) { 
                                $cycle = new Cycle();
                                $cycle->name = $Primair[$i];
                                $cycle->categorie = $categorie->id;
                                $cycle->save();
                            }
                        }
                    }
                    if (isset($data['Collège'])) {
                        if ($data['Collège'] == 'on') {
                            $categorie = new Categorie();
                            $categorie->name = 'Collège';
                            $categorie->save();
                            for ($i=0; $i < 3; $i++) { 
                                $cycle = new Cycle();
                                $cycle->name = $collége[$i];
                                $cycle->categorie = $categorie->id;
                                $cycle->save();
                            }
                        }
                    }
                    if (isset($data['Lycée'])) {
                        if ($data['Lycée'] == 'on') {
                            $categorie = new Categorie();
                            $categorie->name = 'Lycée';
                            $categorie->save();
                            for ($i=0; $i < 3; $i++) { 
                                $cycle = new Cycle();
                                $cycle->name = $Lycée[$i];
                                $cycle->categorie = $categorie->id;
                                $cycle->save();
                            }
                        }
                    }

                        $user = new User();
    
                        $user->nom = $data['nom'];
                        $user->logo = $logo;
                        $user->ville = $data['ville'];
                        $user->tele = $data['Mobile'];
                        $user->fix = $data['Tel'];
                        $user->adress = $data['adress'];
                        $user->email = $data['email'];
                        $user->password = Hash::make($data['password']);

                        $user->save();

                        if (Auth::guard('web')->attempt(['email' => $data->email, 'password' => $data->password])) {
                            return  redirect('admin/Dashboard');
                        }else{
                            return  redirect(url('login'));
                        }
                }else{

                    session()->flash('delete', 'La licence ou Id est incorrect');

                    return back();
                }
    }

    public function space()
    {
        return view('auth.space_login');
    }

    public function prof()
    {
        return view('auth.prof_login');
    }
    public function user_login()
    {
        $remember_me = request()->has('remember') ? true : false ;
        
        if (Auth::guard('staff')->attempt(['email' => request('email'), 'password' => request('password')])) {
            return redirect('user/Dashboard');
        }elseif (Auth::guard('prof')->attempt(['email' => request('email'), 'password' => request('password')])) {
            return redirect('prof/Dashboard');
        }elseif (Auth::guard('web')->attempt(['email' => request('email'), 'password' => request('password')])) {
            return redirect('admin/Dashboard');
        }else{
            session()->flash('delete', 'L\'identifiant ou le mot de passe est incorrect');
           return back();
        }
    }

    public function space_login()
    {
        $remember_me = request()->has('remember')?true:false;
        
        if (Auth::guard('student')->attempt(['user' => request('massar'), 'password' => request('password')])) {
            return redirect('Student/Dashboard');
        }elseif (Auth::guard('parent')->attempt(['user' => request('massar'), 'password' => request('password')])) {
            return redirect('Parent/Home');
        }else{
            session()->flash('delete', 'L\'identifiant ou le mot de passe est incorrect');
           return back();
        }
    }











    
    // public function prof_login()
    // {
    //     $remember_me = request()->has('remember')?true:false;
        
    //     if (Auth::guard('prof')->attempt(['email' => request('email'), 'password' => request('password')])) {
    //       return redirect('prof/Dashboard');
    //    }else{
    //        return back();
    //     }
    // }
    public function add_user()
    {
        $data = request();
        if ($data['fonction'] == 'Professeur') {
            request()->validate([
                
                'nom' => 'required|string|max:25',
                'pre' => 'required|string|max:25',
                'cin' => 'required|string|max:25|unique:profs',
                'tele' => 'required|string|max:30|unique:profs',
                'sex' => 'required|string|max:50',
                'date' => 'required|string|max:50',
                'fonction' => 'required|string|max:255',
                'type' => 'required|string|max:255',
                'type1' => 'required|string|max:255',
                'salaire' => 'required|string|max:255',
                'email' => 'required|string|max:255|unique:profs',
                
                ]);
            }elseif ($data['fonction'] == 'Administration' or $data['fonction'] == 'Staff') {
                request()->validate([
                    
                    'nom' => 'required|string|max:25',
                    'pre' => 'required|string|max:25',
                    'cin' => 'required|string|max:25|unique:staff',
                    'tele' => 'required|string|max:30|unique:staff',
                    'sex' => 'required|string|max:50',
                    'date' => 'required|string|max:50',
                    'fonction' => 'required|string|max:255',
                    'type' => 'required|string|max:255',
                    'salaire' => 'required|string|max:255',
                    'email' => 'required|string|max:255|unique:staff',
                    
                    ]);
            }
                if (request()->hasFile('image')) {

                    $image = $data['image'];
                    $image1 = time().'1.'.$image->getClientOriginalExtension();
                    $data['image']->move('images/users/', $image1); 
                    $image = 'images/users/'.$image1;

                }else{

                    if (request()->sex == 'Homme') {
                        $image = 'images/homme.jpg';
                    }elseif(request()->sex == 'Femme'){
                        $image = 'images/femme.png';
                    }
                }
                if ($data['type'] == 'CDD') {
                    $date1 = $data['date3'];
                }else{
                    $date1 = $data['date1'];
                    
                }
        if ($data['fonction'] == 'Professeur') {
            $prof = new prof();
            
                $prof->nom = $data['nom'];
                $prof->pre = $data['pre'];
                $prof->cin = $data['cin'];
                $prof->tele = $data['tele'];
                $prof->sex = $data['sex'];
                $prof->date = $data['date'];
                $prof->adress = $data['adress'];
                $prof->fonction = $data['fonction'];
                $prof->status = $data['status'];
                $prof->post = 'rien';
                $prof->type = $data['type'];
                $prof->type1 = request()->type1;
                $prof->date1 = $date1;
                $prof->date2 = $data['date2'];
                $prof->salaire = $data['salaire'];
                $prof->compet = $data['compet'];
                $prof->rib = $data['rib'];
                $prof->banque = $data['banque'];
                $prof->cnss = $data['cnss'];
                $prof->email = $data['email'];
                $prof->image = $image;
                $prof->facebook = $data['facebook'];
                $prof->twitter = $data['twitter'];
                $prof->insta = $data['insta'];
                $prof->linked = $data['linked'];
                $prof->password = Hash::make($data['tele']);

                $prof->save();
        }
        elseif ($data['fonction'] == 'Administration'  or $data['fonction'] == 'Staff') {
            if ($data['post'] == '' and $data['post1'] == '') {
                session()->flash('post', 'Le champ post est obligatoire.');
                return back();
            }else {
                if ($data['fonction'] == 'Administration') {
                    $post = $data['post'];
                }elseif ($data['fonction'] == 'Staff') {
                    $post = $data['post1'];
                }
            }
            $post_name = 'rien';
            if ($post == 'Autre') {
                $post_name = $data['post_name'];
            }
            $staff = new Staff();

            $staff->nom = $data['nom'];
            $staff->pre = $data['pre'];
            $staff->cin = $data['cin'];
            $staff->tele = $data['tele'];
            $staff->sex = $data['sex'];
            $staff->date = $data['date'];
            $staff->adress = $data['adress'];
            $staff->fonction = $data['fonction'];
            $staff->status = $data['status'];
            $staff->post = $post;
            $staff->type = $data['type'];
            $staff->post_name = $post_name;
            $staff->date1 = $date1;
            $staff->date2 = $data['date2'];
            $staff->salaire = $data['salaire'];
            $staff->compet = $data['compet'];
            $staff->rib = $data['rib'];
            $staff->banque = $data['banque'];
            $staff->cnss = $data['cnss'];
            $staff->email = $data['email'];
            $staff->image = $image;
            $staff->facebook = $data['facebook'];
            $staff->twitter = $data['twitter'];
            $staff->insta = $data['insta'];
            $staff->linked = $data['linked'];
            $staff->password = Hash::make($data['tele']);

            $staff->save();

            // Staff::create([
            //     'nom' => $data['nom'],
            //     'pre' => $data['pre'],
            //     'cin' => $data['cin'],
            //     'tele' => $data['tele'],
            //     'sex' => $data['sex'],
            //     'date' => $data['date'],
            //     'adress' => $data['adress'],
            //     'fonction' => $data['fonction'],
            //     'status' => $data['status'],
            //     'post' => $post,
            //     'type' => $data['type'],
            //     'post_name' => $post_name,
            //     'date1' => $date1,
            //     'date2' => $data['date2'],
            //     'salaire' => $data['salaire'],
            //     'compet' => $data['compet'],
            //     'rib' => $data['rib'],
            //     'banque' => $data['banque'],
            //     'email' => $data['email'],
            //     'image' => $image,
            //     'facebook' => $data['facebook'],
            //     'twitter' => $data['twitter'],
            //     'insta' => $data['insta'],
            //     'linked' => $data['linked'],
            //     'password' => Hash::make($data['tele']),
            // ]);
        }

        $data->session()->flash('create','Le compte a été créé avec succès');

        return redirect('admin/GRH');
    }
    public function user_logout()
    {
        auth()->guard('staff')->logout();
        return redirect('login');
    }

    public function admin_logout()
    {
        auth()->logout();
        return redirect('login');
    }

    public function prof_logout()
    {
        auth()->guard('prof')->logout();
        return redirect('login');
    }

    public function student_logout()
    {
        auth()->guard('student')->logout();
        return redirect('space/login');
    }

    public function reset_password()
    {
       
        return view('auth/passwords/email');
    }

    public function reset_password1()
    {
        $user = User::where('email', '=', request('email'))->first();
        //Check if the user exists
        if (!$user) {
            return redirect()->back()->withErrors(['email' => trans("L'utilisateur n'existe pas")]);
        }
        //Create Password Reset Token
        $token = Str::random(60);
        DB::table('password_resets')->insert([
            'email' => request('email'),
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        //Get the token just created above
            DB::table('password_resets')
            ->where('email', request('email'))->first();
        //     Mail::to($user->email)->send(new ResetPassword([ 'data' => $user , 'token' => $token]));
        //    session()->flash('create', 'the message is sended to you email adress');
        //    return back();

        return redirect('admin/newPassword/'.$token);
        
      
    }

    public function newPassword($token)
    {
        $check_token = DB::table('password_resets')
                            ->where('token' , $token)
                            ->where('created_at' , '>' , Carbon::now()->subHours(2))
                            ->first();
        if (!empty($check_token)) {
            return view('auth.passwords.reset',['data' =>$check_token]);
        }
    }

    public function newPassword_post($token)
    {
        request()->validate([
                    
            'password' => 'required|min:8|confirmed',
            
            ]);

        $check_token = DB::table('password_resets')
                            ->where('token' , $token)
                            ->where('created_at' , '>' , Carbon::now()->subHours(2))
                            ->first();
        if (!empty($check_token)) {
            $admin = User::where('email', $check_token->email)
                           ->update(['email' => $check_token->email, 'password' => Hash::make(request('password'))]);
                DB::table('password_resets')->where('email', $check_token->email)->delete();
                Auth::attempt(['email' => $check_token->email, 'password' => request('password')]);
                return redirect('login');
        }else{
            return redirect('admin/password/reset');
        }
    }
}
