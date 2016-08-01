<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';

    public static $rules = [
    						'nama_kategori'=>'required',
    						
    					];

    protected $fillable = [
    						'nama_kategori',
    						
    					];

    public function produk()
    {
    	return $this->hasMany('App\Produk', 'kategori_id', 'id_kategori');
    }
}
