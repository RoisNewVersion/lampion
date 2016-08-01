@extends('layout.layoutuser.default')
@section('isi')

	<div class="container">
		<div class="row">
			<div class="col-sm-12 padding-right">
                    <div class="features_items"><!--features_items-->
                        @if($kategori->count()>0)
                        <h2 class="title text-center">Produk Baru</h2>
                        @foreach($kategori as $dt )
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('assetuser/img/'.$dt->img)}}" alt="" />
                                            <h2>Rp {{number_format($dt->harga_produk)}}</h2>
                                            <p>{{$dt->nama_produk}}</p>
                                            <a href="{{route('produk', [$dt->id_produk])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detail</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>Rp {{number_format($dt->harga_produk)}}</h2>
                                                <p>{{$dt->nama_produk}}</p>
                                                <a href="{{route('produk', [$dt->id_produk])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Detail</a>
                                            </div>
                                        </div>
                                        <img src="{{asset('assetuser/images/home/new.png')}}" class="new" alt="" />
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @else
                        <div class="col-md-4 col-sm-6">
                        </div>
                        <div class="col-md-4 col-sm-6">
                        	<div class="jumbotron">
                        		<center><h3>Tidak ada produk</h3></center>
                        	</div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                        </div>
                        @endif
                    </div><!--features_items-->
                </div>
		</div>
	</div>
@stop()