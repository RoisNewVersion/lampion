<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Produk;
use App\Kategori;
use UxWeb\SweetAlert\SweetAlert;
use Validator;

class produkCtrl extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$produks = Produk::all();
		return view('admin.produk.index', compact('produks'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$kat = Kategori::lists('nama_kategori', 'id_kategori');
		return view('admin.produk.create', ['kategori'=>$kat]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		// cek gambar ada atau tdk
		if ($request->file('gambar')) {
			$gambar = $request->file('gambar');
			$ext = $gambar->getClientOriginalExtension();
			$nama = time().'.'.$ext;
			$upload = $gambar->move(base_path().'/public/assetuser/img/',$nama);
			// cek berhasil upload
			if ($upload) {
				$dataInput = [
					'nama_produk'=>ucwords($request->input('nama_produk')),
					'keterangan_produk'=>ucwords($request->input('keterangan_produk')),
					'kode_produk'=>strtoupper($request->input('kode_produk')),
					'harga_produk'=>$request->input('harga_produk'),
					'img'=> $nama,
					'kategori_id'=>$request->input('kategori')
				];
				// save ke db
				$cek = Produk::create($dataInput);
				if ($cek) {
					SweetAlert::success('Berhasil tambah produk', 'Selamat')->autoclose(3000);
					return redirect('superuser/produk');//->intended('homeuser');
				}else{
						// jika user admin
					SweetAlert::error('Gagal tambah produk', 'Pesan')->autoclose(3000);
					return redirect()->back();//->intended('/superuser');
				}
			}
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
		$produk = Produk::find($id);
		return view('user.produk', ['produk'=>$produk]);
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$kat = Kategori::lists('nama_kategori', 'id_kategori');
		$pr = Produk::find($id);
		return view('admin.produk.edit', ['produk'=>$pr,'kategori'=>$kat]);
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
		// find id
		$pro = Produk::findOrFail($id);
		// validator
		// $validator = Validator::make($request->all(), Produk::$rules);

		// if ($validator->fails()) {
		//     return redirect()->back()->withInput()->withErrors($validator);
		// }
		// cek gambar
		if ($request->file('gambar')) {
			if(unlink(base_path().'/public/assetuser/img/'.$pro->img)){
				$gambar = $request->file('gambar');
				$ext = $gambar->getClientOriginalExtension();
				$nama = time().'.'.$ext;
				$upload = $gambar->move(base_path().'/public/assetuser/img/',$nama);
				// cek berhasil upload
				if ($upload) {
					$dataInput = [
						'nama_produk'=>ucwords($request->input('nama_produk')),
						'keterangan_produk'=>ucwords($request->input('keterangan_produk')),
						'kode_produk'=>strtoupper($request->input('kode_produk')),
						'harga_produk'=>$request->input('harga_produk'),
						'img'=> $nama,
						'kategori_id'=>$request->input('kategori')
					];
					// save ke db
					$cek = $pro->update($dataInput);
					if ($cek) {
						SweetAlert::success('Berhasil edit produk', 'Selamat')->autoclose(3000);
						return redirect('superuser/produk');//->intended('homeuser');
					}else{
							// jika user admin
						SweetAlert::error('Gagal edit produk', 'Pesan')->autoclose(3000);
						return redirect()->back();//->intended('/superuser');
					}
				}
			}
		}else{
			$dataInput = [
			'nama_produk'=>ucwords($request->input('nama_produk')),
			'keterangan_produk'=>ucwords($request->input('keterangan_produk')),
			'kode_produk'=>strtoupper($request->input('kode_produk')),
			'harga_produk'=>$request->input('harga_produk'),
			// 'img'=> $nama,
			'kategori_id'=>$request->input('kategori')
			];
					// save ke db
			$cek = $pro->update($dataInput);
			if ($cek) {
				SweetAlert::success('Berhasil edit produk', 'Selamat')->autoclose(3000);
				return redirect('superuser/produk');//->intended('homeuser');
			}else{
					// jika user admin
				SweetAlert::error('Gagal edit produk', 'Pesan')->autoclose(3000);
				return redirect()->back();//->intended('/superuser');
			}
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$pro = Produk::findOrFail($id);
		if (unlink(base_path().'/public/assetuser/img/'.$pro->img)) {
			$cek = Produk::destroy($id);

	        if ($cek) {
	            SweetAlert::success('Data berhasil terhapus', 'Selamat')->autoclose(2000);
	        } else {
	            SweetAlert::error('Data gagal dihapus', 'Pesan')->autoclose(2000);
	        }

	        return redirect()->route('superuser.produk.index');
		}
		
	}

	// kategori produk
	public function kategori($id)
	{
		// $kat = Produk::find($id)->kategori;
		$kat = Produk::where('kategori_id', $id)->get();
		return view('user.kategori', ['kategori'=>$kat]);
	}
}
