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
						<h2>Customer</h2> --- 
						<a class="btn btn-primary btn-xs" href="{!! route('superuser.customer.create')!!} " title="Tambah Customer">Tambah Customer</a>
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
									<th>Email</th>
									<th>Kota</th>
									<th>Alamat</th>
									<th>Telp</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1 ?>
								@foreach($customer as $cus)
								<tr>
									<td>{{$no}}</td>
									<td>{{ucwords($cus->name)}}</td>
									<td>{{$cus->email}}</td>
									<td>{{$cus->kota}}</td>
									<td>{{$cus->alamat}}</td>
									<td>{{$cus->no_telp}}</td>
									
									<td>
										<a href="{{route('superuser.customer.edit', ['customer'=>$cus->id_user])}}" class="btn btn-info btn-xs">Edit</a>

										<form onclick="return confirm('Yakin hapus?')" style="display: inline;" action="{{url('superuser/customer/'.$cus->id_user)}}" method="post" accept-charset="utf-8">
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