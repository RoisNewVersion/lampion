@extends('layout.layoutuser.default')
@section('isi')
<div class="container">
	<div class="row">
		<div class="product-details"><!--product-details-->
			<div class="col-sm-5">
				<div class="view-product">
				<img src="{{asset('assetuser/img/'.$produk->img)}}" alt="" />
					<h3>ZOOM</h3>
				</div>

			</div>
			<div class="col-sm-7">
				<div class="product-information"><!--/product-information-->
					<img src="{{asset('assetuser/images/home/new.png')}}" class="newarrival" alt="" />
					<h2>Nama : {{$produk->nama_produk}}</h2>
					<p>Kode produk : {{$produk->kode_produk}}</p>
					<h4>Keterangan produk : {{$produk->keterangan_produk}}</h4>
					{{-- <img src="images/product-details/rating.png" alt="" /> --}}
					<span>
						<span>Harga : {{number_format($produk->harga_produk)}}</span>
						
					</span>
					<a href=""><img src="{{asset('assetuser/images/produk/share.png')}}" class="share img-responsive"  alt="" /></a>
				</div><!--/product-information-->
			</div>
		</div><!--/product-details-->
	</div>
</div>
@stop()