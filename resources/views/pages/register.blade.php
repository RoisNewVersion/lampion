@extends('layout.layoutuser.default')
@section('isi')
<div id="all">
	<div class="container">
		<div class="col-md-3">
			
		</div>
		<div class="col-md-6">
			<div class="box">
				<h1>REGISTER</h1>

				<form action="{{url('register')}}" method="post">
					{{csrf_field()}}
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" name="name" class="form-control" id="name" placeholder="Nama">
						{!!$errors->first('name', '<p class="help-block">:message</p>')!!}
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" class="form-control" id="email" placeholder="Email">
						{!!$errors->first('email', '<p class="help-block">:message</p>')!!}
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" class="form-control" id="password" placeholder="Password">
						{!!$errors->first('password', '<p class="help-block">:message</p>')!!}
					</div>
					<div class="form-group">
						<label for="kota">Kota</label>
						<select name="kota" id="kota" class="form-control">
							<option value="Semarang">Semarang</option>
							<option value="kendal">kendal</option>
							<option value="Demak">Demak</option>
							<option value="Kudus">Kudus</option>
						</select>
						{!!$errors->first('kota', '<p class="help-block">:message</p>')!!}
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input type="text" name="alamat" class="form-control" id="alamat">
						{!!$errors->first('alamat', '<p class="help-block">:message</p>')!!}
					</div>
					<div class="form-group">
						<label for="no_telp">No.Hp</label>
						<input type="text" name="no_telp" class="form-control" id="no_telp">
						{!!$errors->first('no_telp', '<p class="help-block">:message</p>')!!}
					</div>

					<div class="text-center">
						<button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-3">

	</div>
</div>
@stop()