<!DOCTYPE html>
<html>
<head>
	<title>Api menu</title>
	<link rel="shortcut icon" href="../img/logo.png">
	<style>
		table {
			width: 100%;
			text-align:center;
		}
		tr {
			height: 30px;
		}
		th {
			border-top: 1px solid black;
			border-bottom : 1px solid black;
			border-left : 1px solid black;
			border-right: 1px solid black
		}
		td {
			border-bottom : 1px solid black;
			border-right: 1px solid black;
			border-left : 1px solid black;
		}
	</style>
</head>
<body>
	<div>
		<h2>Menu untuk API		: </h2>
		<div>
			<table align="center">
				<tr>
					<th>Metode</th>
					<th>Deskripsi</th>
					<th>Link</th>
				</tr>
				<tr>
					<td>GET</td>
					<td>Mengambil data user seperti NIS, Nama, kelas dll.</td>
					<td>/user/{nis}</td>
				</tr>
				<tr>
					<td>GET</td>
					<td>Mengambil data riwayat dari user</td>
					<td>/riwayat/{nis}</td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>