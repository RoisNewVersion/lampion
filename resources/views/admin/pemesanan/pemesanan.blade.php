@extends('layout.layoutadmin.default')

@section('isi')
<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		
		<div class="clearfix"></div>

		<div class="row">

			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel" >
					<div class="x_title">
						<h2>Pemesanan</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							
							<li><a class="close-link"><i class="fa fa-close"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<table id="tabelku" class="table table-hover table-bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Customer</th>
									<th>Nama Produk</th>
									<th>Harga</th>
									<th>Keterangan</th>
									<th>Almt Kirim</th>
									<th>No telp Penerima</th>
									<th>Tgl Kirim</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1 ?>
								@foreach($pemesanan as $pesan)
								<tr>
									<td>{{$no}}</td>
									<td>{{$pesan->user->name}}</td>
									<td>{{$pesan->produk->nama_produk}}</td>
									<td>Rp {{number_format($pesan->produk->harga_produk)}}</td>
									<td>{{$pesan->keterangan}}</td>
									<td>{{$pesan->alamat_kirim}}</td>
									<td>{{$pesan->no_telp_penerima}}</td>
									<td>{{$pesan->tgl_pengiriman}}</td>
									<td>
										@if($pesan->status_konfirm == 'Y')
											{{'Sdh Konfirmasi'}}
										@else
											{{'Blm Konfirmasi'}}
										@endif
									</td>
									<td>
										@if($pesan->status_konfirm == 'Y')
											<a disabled="disabled" class="btn btn-primary btn-xs" href="#" title="Konfirmasi">Konfirmasi</a>
										@else
											<a onclick="return confirm('Yakin?')" class="btn btn-primary btn-xs" href="{{url('superuser/konfirmasi/'.$pesan->id_pemesanan)}}" title="Konfirmasi">Konfirmasi</a>
										@endif
										
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->
@stop()

@section('js')
	<script>
		$(document).ready(function() {
			$('#tabelku').DataTable();
		});
	</script>
@stop()
