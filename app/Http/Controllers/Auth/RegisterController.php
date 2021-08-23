<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Licence;
use App\Categorie;
use App\Cycle;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
        return Validator::make($data, [
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nom' => ['required', 'string', 'max:20'],
            'adress' => ['required', 'string', 'max:255'],
            'ville' => ['required', 'string', 'max:255'],
            'licence' => ['required', 'string', 'max:255'],
            'id_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
      
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $licence = Licence::find(1);
            if ($licence->id_name == request('id_name')) {
            
                $logo = $data['logo'];
                $logo1 = time().$logo->getClientOriginalExtension();
                $data['logo']->move('images/users/', $logo1); 
                $logo = 'images/users/'.$logo1;
                if (isset($data['Préscolaire'])) {
                    if ($data['Préscolaire'] == 'on') {
                        $categorie = new Categorie();
                        $categorie->name = 'Préscolaire';
                        $categorie->save();
                        for ($i=0; $i < 2; $i++) { 
                            $cycle = new Cycle();
                            $n = $i+1;
                            $cycle->name = '1Cycle'.$n;
                            $cycle->categorie = 'Préscolaire';
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
                            $n = $i+1;
                            $cycle->name = '2Cycle'.$n;
                            $cycle->categorie = 'Préscolaire';
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
                            $n = $i+1;
                            $cycle->name = '3Cycle'.$n;
                            $cycle->categorie = 'Collège';
                            $cycle->save();
                        }
                    }
                }
                if (isset($data['Secondaire'])) {
                    if ($data['Secondaire'] == 'on') {
                        $categorie = new Categorie();
                        $categorie->name = 'Secondaire';
                        $categorie->save();
                        for ($i=0; $i < 3; $i++) { 
                            $cycle = new Cycle();
                            $n = $i+1;
                            $cycle->name = '4Cycle'.$n;
                            $cycle->categorie = 'Secondaire';
                            $cycle->save();
                        }
                    }
                }

                
                return User::create([
                    'nom' => $data['nom'],
                    'logo' => $logo,
                    'ville' => $data['ville'],
                    'tele' => $data['tele'],
                    'fix' => $data['fix'],
                    'adress' => $data['adress'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                ]);
            }

    }
}
