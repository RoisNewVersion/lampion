<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Produk;
use App\Pemesanan;
use Validator;
use Auth;
use UxWeb\SweetAlert\SweetAlert;
use DB;

class pemesananCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pem = Pemesanan::all();
        return view('admin.pemesanan.pemesanan', ['pemesanan'=>$pem]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    // order user
    public function getOrder()
    {
        $list = Produk::select('kode_produk', 'id_produk')->get();
        // print_r($list);
        // exit();
        return view('user.order', ['list_produk'=>$list]);
    }
    // user post order
    public function postOrder(Request $request)
    {
        $validator = Validator::make($request->all(), Pemesanan::$rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $dataInput = [ 
                'produk_id'=>$request->input('kode_bg') ,
                'user_id'=>Auth::user()->id_user ,
                'keterangan'=>$request->input('ket_bg') ,
                'alamat_kirim'=>$request->input('alamat_kirim') ,
                'no_telp_penerima'=>$request->input('no_telp_pen') ,
                'tgl_pengiriman'=>$request->input('tgl_kirim') ,
                'status_konfirm'=>'N',
            ];
        // simpan ke db
        $cek = Pemesanan::create($dataInput);

        if ($cek) {
            SweetAlert::success('Berhasil memesan, silahkan tunggu sms dari admin.', 'Selamat')->autoclose(3000);
            return redirect()->route("order");
        }else{
                // jika user admin
            SweetAlert::error('Gagal pesan produkn', 'Maaf')->autoclose(3000);
            return redirect()->back()->withInput();
        }
    }
    // orderbyID
    public function getOrderById($id)
    {
        $pro = Produk::find($id);
        return view('user.order_by_id', ['produk', $pro]);
    }

    // ajax
    public function getKodeBg(Request $request)
    {
        $kode = $request->input('id_produk');
        $pro = Produk::find($kode);
        return response()->json($pro);
        // echo $kode;
    }

    // konfirmasi
    public function konfirmasi($id)
    {
        $pem = Pemesanan::findOrFail($id);
        $cek = $pem->update(['status_konfirm'=>'Y']);

        if ($cek) {
            SweetAlert::success('Berhasil konfirmasi.', 'Selamat')->autoclose(3000);
            return redirect()->route("superuser.pemesanan.index");
        }else{
                // jika user admin
            SweetAlert::error('Gagal konfirmasi', 'Maaf')->autoclose(3000);
            return redirect()->back()->withInput();
        }
    }

    // get cetak
    public function getCetak()
    {
        return view('admin.pemesanan.get_cetak');
    }

    // proses cetak
    public function prosesCetak(Request $request)
    {
        $awal = $request->input('tgl_awal');
        $akhir = $request->input('tgl_akhir');
        $konfirm = $request->input('konfirm');

        $pro = DB::table('datapemesanan')
            ->join('users', 'datapemesanan.user_id', '=', 'users.id_user')
            ->join('produk', 'datapemesanan.produk_id', '=', 'produk.id_produk')
            ->whereBetween('datapemesanan.created_at', [$awal, $akhir])
            ->where('datapemesanan.status_konfirm', '=', $konfirm)
            ->select('datapemesanan.*', 'users.name', 'produk.nama_produk', 'produk.harga_produk')
            ->get();
        // echo "<pre>";
        // print_r($pro);
        // echo "</pre>";
        return view('admin.pemesanan.post_cetak', ['datacetak'=>$pro]);
    }
    // history belanja
    public function history()
    {
        // print_r(Auth::user()->id);
        // die();
        $id = Auth::user()->id_user;
        $his = Pemesanan::where('user_id', '=', $id)->get();
        return view('user.history', ['history'=>$his]);
    }
}
