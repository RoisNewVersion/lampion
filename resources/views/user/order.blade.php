@extends('layout.layoutuser.default')
@section('isi')
<div id="content">
	<div class="container">
		<div class="col-sm-3">
			<div id="ket_produk">
				
			</div>
		</div>
		<div class="col-sm-6">
			<div class="box">
				<h2>DATA PEMESANAN PRODUK</h2>
				@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				<div class="login-form">
				<form action="{{url('order')}}" method="post">
					{!!csrf_field()!!}
					<div class="form-group">
						<label for="jenisproduk">Kode produk / Pilih kode produk untuk memilih produk</label>
						<select id="kode_bg" name="kode_bg">
							<option>Pilih kode produk</option>
							@foreach($list_produk as $produk)
							<option value="{{$produk['id_produk']}}">{{$produk['kode_produk']}}</option>
							@endforeach
						</select>
					</div>
					
					<div class="form-group">
						<label for="keterangan">Tulis Keterangan</label>
						<input type="text" name="ket_bg" id="">
					</div>
					<div class="form-group">
						<label for="alamat">Alamat Kirim</label>
						<input type="text" name="alamat_kirim" id="">
					</div>
					<div class="form-group">
						<label for="telp">No.Telp Penerima produk</label>
						<input type="text" name="no_telp_pen"  id="text">
					</div>
					<div class="form-group">
						<label for="tanggal">Tanggal Pengiriman</label>
						<input type="text" name="tgl_kirim"  id="tgl_kirim">
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> KIRIM</button>
					</div>
				</form>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			
		</div>
	</div>
</div>
@stop()

@section('js')
<script type="text/javascript">
	$(document).ready(function() {
		// datepicker
		$('#tgl_kirim').datepicker({
			format: 'yyyy-mm-dd',
		}).on('changeDate', function(e){
			$(this).datepicker('hide');
		});
		// on change kode produk
		$('#kode_bg').change(function(event) {
			var kb = $('#kode_bg').val();
			$.getJSON('{{url('ajax/getkodebg')}}', {id_produk: kb}, function(json, textStatus) {
				// console.log(json);
				var ket = '<h3>Keterangan produk</h3>'
				+'<p><b>Nama produk</b> : '+json.nama_produk+'</p>'
				+'<p><b>Keterangan produk</b> : '+json.keterangan_produk+'</p>'
				+'<p><b>Harga</b> : '+json.harga_produk+'</p>';
				// tempel ke keterangan
				$('#ket_produk').html(ket);
			});
		});

		$('#kode_bg').change(function(event) {
			/* Act on the event */
			console.log('hel yeah');
		});
	});
</script>
@stop