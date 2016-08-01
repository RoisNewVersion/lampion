@extends('layout.layoutuser.default')
@section('isi')
<div id="all">
	<div class="container">
		<div class="col-md-3">
			
		</div>
		<div class="col-md-6">
			<div class="box">
				<h2>Customer Profil</h2>
				<p>Nama : {{Auth::user()->name}}</p>
				<p>Alamat : {{Auth::user()->alamat}}</p>
				<p>Email : {{Auth::user()->email}}</p>
				<p>Kota : {{auth()->user()->kota}}</p>
				<p>No Telp : {{auth()->user()->no_telp}}</p>
			</div>
		</div>
	</div>
	<div class="col-md-3">

	</div>
</div>
@stop()