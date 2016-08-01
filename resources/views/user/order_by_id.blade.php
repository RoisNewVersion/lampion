@extends('layout.layoutuser.default')
@section('isi')
<div id="content">
	<div class="container">
		<div class="col-md-3">
			
		</div>
		<div class="col-md-6">
			<div class="box">
				<h2>DATA PEMESANAN BUNGA</h2>

				<form action="customer-orders.html" method="post">
					<div class="form-group">
						<label for="jenisbunga">Jenis Bunga</label>
						<select class="form-control">
							<option>Mawar</option>
							<option>CDE</option>
							<option>CDE</option>
						</select>
					</div>
					<div class="form-group">
						<label for="keterangan">Keterangan</label>
						<input type="text" class="form-control" id="text">
					</div>
					<div class="form-group">
						<label for="modelbunga">Kode/Model Bunga</label>
						<select class="form-control">
							<option>ABC</option>
							<option>CDE</option>
							<option>CDE</option>
							<option>CDE</option>
							<option>CDE</option>
							<option>CDE</option>
							<option>CDE</option>
							<option>CDE</option>
							<option>CDE</option>
							<option>CDE</option>
							<option>CDE</option>
							<option>CDE</option>
						</select>
					</div>
					<div class="form-group">
						<label for="harga">Harga</label>
						<input type="text" class="form-control" id="text">
					</div>
					<div class="form-group">
						<label for="alamat">Alamat Kirim</label>
						<input type="text" class="form-control" id="text">
					</div>
					<div class="form-group">
						<label for="telp">No.Telp Penerima Bunga</label>
						<input type="text" class="form-control" id="text">
					</div>
					<div class="form-group">
						<label for="tanggal">Tanggal Pengiriman</label>
						<input type="text" class="form-control" id="text">
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> KIRIM</button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-3">
			
		</div>
	</div>
</div>
@stop()