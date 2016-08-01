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
						<h2>Cetak Data Pemesanan</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							
							<li><a class="close-link"><i class="fa fa-close"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<h3>Pilih Tanggal</h3>
						<div class="row">
							<div class="col-md-5">
						<form  role="form">
							<div class="form-group">
								<label for="tgl_awal">Tgl awal</label>
								<input type="text" class="form-control tgl" id="tgl_awal" placeholder="Tgl awal">
							</div>
							<div class="form-group">
								<label for="tgl_akhir">Tgl akhir</label>
								<input type="text" class="form-control tgl" id="tgl_akhir" placeholder="Tgl akhir">
							</div>

							<div class="form-group">
								<label for="tgl_awal">Status konfirmasi</label>
								<select class="form-control" id="konfirm" name="konfirm">
									<option value="N">Belum</option>
									<option value="Y">Ya</option>
								</select>
							</div>
							<button id="cetak" type="button" class="btn btn-primary">Cetak</button>
						</form>
						</div>
						</div>
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
		$('#cetak').click(function(event) {
		    var tgl_awal = $('#tgl_awal').val();
		    var tgl_akhir = $('#tgl_akhir').val();
		    var konfirm = $('#konfirm').val();

		    var left = (screen.width/2) - (800/2);
		    var right = (screen.height/2) - (640/2);

		    var url = '{{url('superuser/prosescetak/')}}'+'?tgl_awal='+tgl_awal+'&tgl_akhir='+tgl_akhir+'&konfirm='+konfirm;

		    window.open(url, '', 'width=800, height=640, scrollbars=yes, left='+left+', top='+top+'');
		});

		// datepicker
		$('.tgl').datepicker({
	      format: 'yyyy-mm-dd',
	      
	    }).on('changeDate', function(e){
	      $(this).datepicker('hide');
	    });
	</script>
@stop