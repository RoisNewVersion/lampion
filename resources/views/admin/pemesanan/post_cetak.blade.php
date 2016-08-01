<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cetak Data Pemesanan</title>
	<link rel="stylesheet" href="">
	<style>
		@media print{
			.cetak{
				display: none;
				height: 0;
			}

			table{
				border-collapse: collapse;
				width: 100%;
				font-size: small;
			}
		}
		table{
			border-collapse: collapse;
			width: 100%;
			font-size: small;
		}
	</style>

</head>
<body>
	<button class="cetak" id="cetak" onclick="cetak()">Cetak</button>

	<center><h3>Data Pemesanan LAMPION KARAKTER</h3></center>
	<table id="tabelku" border="1" cellpadding="4">
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
			</tr>
		</thead>
		<tbody>
			<?php $no = 1 ?>
			@foreach($datacetak as $pesan)
			<tr>
				<td>{{$no}}</td>
				<td>{{$pesan->name}}</td>
				<td>{{$pesan->nama_produk}}</td>
				<td>Rp {{number_format($pesan->harga_produk)}}</td>
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
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
<script>
	function cetak() {
		window.print();
	}
</script>
</html>