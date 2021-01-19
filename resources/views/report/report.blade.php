<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Buku</title>
</head>
<style type="text/css">
	table { border: solid 1px #000; border-collapse: collapse; width: 100%; margin-top: 40px;}	
	tr th { font-size: 13px; border: solid 1px #000; padding: 8px 0; text-align: center; }
	td { padding: 7px 5px; font-size: 12px; border: solid 1px #000; text-align: center; }
	h2 { text-align: center; }
</style>
<body>
	<h2>Laporan Data Buku</h2> 
	<table>
		<thead>
			<tr>
				<th>No</th>
				<th>Judul Buku</th>
				<th>Penerbit</th>
				<th>Harga</th>
			</tr>
		</thead>
		<tbody>
			@php 
			  $no = 1;
			@endphp
			@foreach($buku as $key => $value)
			<tr>
				<td>{{ $no++ }}</td>
				<td>{{$value->judul}}</td>
				<td>{{$value->penerbit}}</td>
				<td>{{$value->harga}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>