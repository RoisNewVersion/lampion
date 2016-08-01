<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Auth;
use Session;
use UxWeb\SweetAlert\SweetAlert;

class AuthCtrl extends Controller
{
	protected $loginPath = '/login';

    public function getLogin(Request $request)
    {
    	return view('pages.login');
    }

    public function postLogin(Request $request)
    {
    	// print_r($request->all());
    	$validator = Validator::make($request->all(), $this->rules());
    	// /cek validasi
    	if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator);
    	}

    	// cek login
    	$inputan = ['email'=>$request->input('email'), 
    		'password'=>$request->input('password')];

    	if (Auth::attempt($inputan))
    	{
    		// jika user biasa
    		if ($request->user()->user_level == '1') {
    			SweetAlert::success('Welcome Back '.Auth::user()->name, 'Selamat Datang')->autoclose(2000);
    			return redirect('/');//->intended('homeuser');
    		}else{
    			// jika user admin
    			SweetAlert::success('Welcome Back '.Auth::user()->name, 'Selamat Datang')->autoclose(2000);
    			return redirect('superuser');//->intended('/superuser');
    		}
    		
    	}else{
    		Session::flash('pesan', 'E-mail atau password salah, coba lagi!');
    		return redirect()->back();
    	}

    }

    public function getLogout()
    {
        SweetAlert::message('Pesan', 'Sukses Logout');
    	Auth::logout();
        return redirect('/');
    }

    public function rules()
    {
        return [
            'email'=>'required|email',
            'password'=>'required'
        ];
    }

    // register user
    public function getRegister()
    {
        return view('pages.register');
    }

    // post register
    public function postRegister(Request $request)
    {
        $validator = Validator::make($request->all(), User::$rules);
        // /cek validasi
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $dataInput = ['user_level'=> 1,
                    'name'=>ucwords($request->input('name')),
                    'email'=>$request->input('email'),
                    'password'=>bcrypt($request->input('password')),
                    'kota'=>$request->input('kota'),
                    'alamat'=>ucwords($request->input('alamat')),
                    'no_telp'=>$request->input('no_telp')
                    ];
        // masukan ke db
        $cek = User::create($dataInput);

        if ($cek) {
            SweetAlert::success('Berhasil, anda bisa login.', 'Selamat Datang')->autoclose(3000);
            return redirect('/');//->intended('homeuser');
        }else{
                // jika user admin
            SweetAlert::error('Gagal register', 'Selamat Datang')->autoclose(3000);
            return redirect('/');//->intended('/superuser');
        }
    }

    // show profil customer
    public function show($id)
    {
        $profil = User::findOrFail($id);

        return view('user.profil', ['profil'=>$profil]);
    }
}
