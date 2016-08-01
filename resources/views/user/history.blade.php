@extends('layout.layoutuser.default')
@section('isi')
<div class="row">
	<div class="container">
	<div class="col-md-9">
			<h3>History belanja #{{Auth::user()->name}}</h3>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Nama Produk</th>
							<th>Kode</th>
							<th>Keterangan</th>
							<th>Tgl pengiriman</th>
							<th>Status</th>
							<th>Tgl pesan</th>
						</tr>
					</thead>
					<tbody>

						@foreach($history as $his)
						<tr>
							<td>{{$his->produk->nama_produk}}</td>
							<td>{{$his->produk->kode_produk}}</td>
							<td>{{$his->keterangan}}</td>
							<td>{{$his->tgl_pengiriman}}</td>
							<td>
								@if($his->status_konfirm == 'Y')
								<span class="label label-info">Terkonfirmasi</span>
								@else
								<span class="label label-danger">Belum terkonfirmasi</span>
								@endif
							</td>
							<td>{{$his->created_at}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@stop()