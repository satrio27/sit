<html>
<head>
	<title>Tamabah Mahasiswa</title>
</head>
<body>
	<a href="view_mahasiswa.php">Lihat Mahasiswa</a>
	<form action="mhs.php" method="post">
		<table>
			<tr>
				<td>NIM</td>
				<td><input type="text" name="nim" id="nim" /></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" id="nama" /></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" name="alamat" id="alamat" /></td>
			</tr>
			<tr>
				<td>Prodi</td>
				<td><input type="text" name="prodi" id="prodi" /></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit"></td>
			</tr>
		</table>
	</form>
</body>
</html>