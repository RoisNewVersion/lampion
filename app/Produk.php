<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';

    public static $rules = [
    						'nama_produk'=>'required',
    						'keterangan_produk'=>'required',
    						'kode_produk'=>'required',
    						'harga_produk'=>'required|integer',
    						'img'=>'required',
    						'kategori_id'=>'required|integer'
    					];

    protected $fillable = [
    						'nama_produk',
    						'keterangan_produk',
    						'kode_produk',
    						'harga_produk',
    						'img',
    						'kategori_id'
    					];

    public function kategori()
    {
    	return $this->belongsTo('App\Kategori', 'kategori_id', 'id_kategori');
    }
}
