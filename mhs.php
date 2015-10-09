<?php

header("Content-Type:text/xml; charset=ISO-8818-1");

include 'koneksi.php';

error_reporting(0);

$path = $_SERVER["PATH_INFO"];

if($path != null){

	$path_params = spliti("/", $path);

}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

	if ($path_params[1] != null) {

		$query = "SELECT * FROM mahasiswa WHERE nim=$path_params[1]";

	}else{

		$query = "SELECT * FROM mahasiswa";

	}

}else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$input = file_get_contents("php://input");

	$data = explode("&", $input);

	$mahasiswa = [];

	for ($i = 0; $i < count($data); $i++) {
		$temp = explode("=", $data[$i]);
		array_push($mahasiswa, $temp[1]);
	}

	$input = [$mahasiswa];

	foreach ($input as list($nim, $nama, $alamat, $prodi)) {
		
		$query = "SELECT * FROM mahasiswa WHERE nim='$nim'";

		$num_rows = mysql_num_rows(mysql_query($query));

		if ($num_rows == 0) {

			$query = "INSERT INTO mahasiswa (nim,nama,alamat,prodi) VALUES ('$nim','$nama','$alamat','$prodi')";

		}else if ($num_rows == 1) {
			
			$query = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama', alamat = '$alamat', prodi = '$prodi' WHERE nim = '$nim' ";

		}

	}

}

$result = mysql_query($query) or die("Query failed : " . mysql_error());

if ($result) {
	//header("Location: view_mahasiswa.php");
}

echo "<data>";

while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
	
	echo "<mahasiswa>";

	foreach ($line as $key => $value) {
		
		echo "<$key>$value</$key>";

	}

	echo "</mahasiswa>";

}

echo "</data>";

?>