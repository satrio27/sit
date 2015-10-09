<html>
	<head>
		<title> View Data Bukti</title>
	</head>
	<body>
		<?php

			$url = 'http://localhost/satriosit/mhs.php';

			$client = curl_init($url);

			curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);

			$response = curl_exec($client);

			curl_close($client);

			$datamhs = simplexml_load_string($response);

		?>

		<table border='1'>

			<tr>

				<td>NIM</td>

				<td>Nama</td>

				<td>Alamat</td>

				<td>Prodi</td>

			</tr>

			<?php

				foreach ($datamhs->mahasiswa as $mahasiswa) {
					
			?>
				<tr>
					<td><?php echo $mahasiswa->nim ?></td>
					<td><?php echo $mahasiswa->nama ?></td>
					<td><?php echo $mahasiswa->alamat ?></td>
					<td><?php echo $mahasiswa->prodi ?></td>
				</tr>

			<?php } ?>			

		</table>

	</body>

</html>