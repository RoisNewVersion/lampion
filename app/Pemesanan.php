<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'datapemesanan';
    protected $primaryKey = 'id_pemesanan';

    public static $rules = [
    						'kode_bg'=>'required',
    						'alamat_kirim'=>'required',
    						'ket_bg'=>'required',
    						'no_telp_pen'=>'required',
    						'tgl_kirim'=>'required'
    					];

    protected $fillable = [
    						'produk_id',
    						'user_id',
    						'keterangan',
    						'alamat_kirim',
    						'no_telp_penerima',
    						'tgl_pengiriman',
                            'status_konfirm'
    					];

    // relasi ke produk
    public function produk()
    {
        return $this->belongsTo('App\Produk', 'produk_id', 'id_produk');
    }
    // relasi ke user
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id_user');
    }
}
