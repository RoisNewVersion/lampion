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
						<h2>Produk</h2> --- 
						<a class="btn btn-primary btn-xs" href="{!! route('superuser.produk.create')!!} " title="Tambah Produk">Tambah Produk</a>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							
							<li><a class="close-link"><i class="fa fa-close"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<table id="tabelku" class="table table-bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Ket. produk</th>
									<th>Kode</th>
									<th>Harga</th>
									<th>Kategori</th>
									<th>Gambar</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1 ?>
								@foreach($produks as $produk)
								<tr>
									<td>{{$no}}</td>
									<td>{{ucwords($produk->nama_produk)}}</td>
									<td>{{strtoupper($produk->keterangan_produk)}}</td>
									<td>{{$produk->kode_produk}}</td>
									<td>{{'Rp '.number_format($produk->harga_produk)}}</td>
									<td>{{ucwords($produk->kategori->nama_kategori)}}</td>
									<td><img src={{asset('assetuser/img/'.$produk->img)}} height="100" width="70" alt=""></td>
									<td>
										<a href="{{route('superuser.produk.edit', ['produk'=>$produk->id_produk])}}" class="btn btn-info btn-xs">Edit</a>

										<form onclick="return confirm('Yakin hapus?')" style="display: inline;" action="{{url('superuser/produk/'.$produk->id_produk)}}" method="post" accept-charset="utf-8">
										{!! Form::hidden('_method', 'delete') !!}
										{!!csrf_field()!!}
										<input type="submit" class="btn btn-danger btn-xs" name="delete" value="Delete">
										</form>
									</td>
								</tr>
								<?php $no++ ?>
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
@stop