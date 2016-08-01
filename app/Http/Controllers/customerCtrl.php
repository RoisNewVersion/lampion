<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use UxWeb\SweetAlert\SweetAlert;

class customerCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = User::where('user_level', '1')->get();
        return view('admin.customer.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            SweetAlert::success('Berhasil tambah customer.', 'Selamat Datang')->autoclose(3000);
            return redirect()->route("superuser.customer.index");
        }else{
                // jika user admin
            SweetAlert::error('Gagal tambah customer', 'Selamat Datang')->autoclose(3000);
            return redirect()->back()->withInput();//->intended('/superuser');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek = User::destroy($id);

            if ($cek) {
                SweetAlert::success('Data berhasil terhapus', 'Selamat')->autoclose(2000);
            } else {
                SweetAlert::error('Data gagal dihapus', 'Pesan')->autoclose(2000);
            }

            return redirect()->route('superuser.customer.index');
    }
}
