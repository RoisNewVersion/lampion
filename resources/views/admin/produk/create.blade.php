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
						<h2>Tambah Produk</h2>
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
							
							{!! Form::open(['url'=>'superuser/produk', 'method'=>'post', 'class'=>'form-horizontal', 'files'=>true]) !!}
									<div class="form-group">
									  <label for="nama_produk">Nama produk</label>
									  {!!Form::input('text','nama_produk', old('nama_produk'), ['id'=>'nama_produk', 'class'=>'form-control'])!!}
									  {!!$errors->first('nama_produk', '<p class="help-block">:message</p>')!!}
									</div>
									
									<div class="form-group">
									  <label for="keterangan_produk">Keterangan produk</label>
									  {!!Form::input('text','keterangan_produk', old('keterangan_produk'), ['id'=>'keterangan_produk', 'class'=>'form-control'])!!}
									  {!!$errors->first('keterangan_produk', '<p class="help-block">:message</p>')!!}
									</div>

									<div class="form-group">
									  <label for="kode_produk">Kode produk</label>
									  {!!Form::input('text','kode_produk', old('kode_produk'), ['id'=>'kode_produk', 'class'=>'form-control'])!!}
									  {!!$errors->first('kode_produk', '<p class="help-block">:message</p>')!!}
									</div>

									<div class="form-group">
									  <label for="harga_produk">Harga produk</label>
									  {!!Form::input('text','harga_produk', old('harga_produk'), ['id'=>'harga_produk', 'class'=>'form-control'])!!}
									  {!!$errors->first('harga_produk', '<p class="help-block">:message</p>')!!}
									</div>

									<div class="form-group">
									  <label for="harga_produk">Kategori</label>
									  {!! Form::select('kategori', $kategori,  null, ['id'=>'kategori', 'class'=>'form-control']) !!}
									  {!!$errors->first('harga_produk', '<p class="help-block">:message</p>')!!}
									</div>

									<div class="form-group">
									  <label for="harga_produk">Gambar produk</label>
									  {!!Form::file('gambar', ['id'=>'gambar', 'class'=>'form-control'])!!}
									  {!!$errors->first('gambar', '<p class="help-block">:message</p>')!!}
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
