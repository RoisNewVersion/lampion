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
						<h2>Tambah Customer</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							
							<li><a class="close-link"><i class="fa fa-close"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="col-md-5">
							
							{!! Form::open(['url'=>'superuser/customer', 'method'=>'post', 'class'=>'form-horizontal']) !!}
									<div class="form-group">
									  <label for="name">Nama customer</label>
									  {!!Form::input('text','name', old('name'), ['id'=>'name', 'class'=>'form-control'])!!}
									  {!!$errors->first('name', '<p class="help-block">:message</p>')!!}
									</div>
									
									<div class="form-group">
									  <label for="email">Email</label>
									  {!!Form::input('text','email', old('email'), ['id'=>'email', 'class'=>'form-control'])!!}
									  {!!$errors->first('email', '<p class="help-block">:message</p>')!!}
									</div>

									<div class="form-group">
									  <label for="password">Password</label>
									  {!!Form::input('text','password', old('password'), ['id'=>'password', 'class'=>'form-control'])!!}
									  {!!$errors->first('password', '<p class="help-block">:message</p>')!!}
									</div>

									<div class="form-group">
									  <label for="kota">Kategori</label>
									  {!! Form::select('kota', ['Semarang'=>'Semarang', 'Kendal'=>'Kendal', 'Demak'=>'Demak', 'Kudus'=>'Kudus'],  null, ['id'=>'kota', 'class'=>'form-control']) !!}
									  {!!$errors->first('kota', '<p class="help-block">:message</p>')!!}
									</div>

									<div class="form-group">
									  <label for="alamat">Alamat</label>
									  {!!Form::input('text','alamat', old('alamat'), ['id'=>'alamat', 'class'=>'form-control'])!!}
									  {!!$errors->first('alamat', '<p class="help-block">:message</p>')!!}
									</div>

									<div class="form-group">
									  <label for="no_telp">No Telp</label>
									  {!!Form::input('text','no_telp', old('no_telp'), ['id'=>'no_telp', 'class'=>'form-control'])!!}
									  {!!$errors->first('no_telp', '<p class="help-block">:message</p>')!!}
									</div>
									
							
									<div class="form-group">
										<div class="col-sm-10 col-sm-offset-2">
											<button type="submit" class="btn btn-primary">Simpan</button>
										</div>
									</div>
							
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->
@stop()
