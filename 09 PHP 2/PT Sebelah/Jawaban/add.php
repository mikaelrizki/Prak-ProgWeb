<?php
    // Open Connection
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $databasename = "pt_php2_a";
    $conn = mysqli_connect($servername, $username, $password, $databasename) or die("Koneksi gagal.");
?>

<html>
<head>
	<title>Tambah data Sepeda</title>
</head>

<body>
	<a href="index.php"><< Go to Home</a>
	<br/><br/>

    <h1>Tambah data Sepeda</h1>
	<form action="add.php" method="POST">
		<table width="50%" border="0">
			<tr> 
				<td>Nama Sepeda</td>
				<td><input type="text" name="nama_sepeda"></td>
			</tr>
			<tr> 
				<td>Tipe Sepeda</td>
				<td>
					<input type="radio" name="tipe_sepeda" value="Spesial Edition"> Special edition
					<input type="radio" name="tipe_sepeda" value="Ultimate Edition"> Ultimate edition
				</td>
			</tr>
			<tr> 
				<td>Pembeli</td>
				<td><input type="text" name="pembeli"></td>
			</tr>
			<tr> 
				<td>Total Unit</td>
				<td><input type="text" name="total_unit_pembelian"></td>
			</tr>
            <tr> 
				<td>Harga Satuan</td>
				<td><input type="text" name="harga_satuan"></td>
			</tr>
			<tr> 
				<td>Total di bayar</td>
				<td><input type="text" name="total_yang_dibayar"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" value="Tambah"></td>
			</tr>
		</table>
	</form>
</body>
</html>

<?php
    if($_POST) {
		$nama_sepeda = $_POST["nama_sepeda"];
		$tipe_sepeda = $_POST["tipe_sepeda"];
		$pembeli = $_POST["pembeli"];
		$total_unit_pembelian = $_POST["total_unit_pembelian"];
		$harga_satuan = $_POST["harga_satuan"];
		$total_yang_dibayar = $_POST["total_yang_dibayar"];
		$sql = "INSERT INTO penjualan_sepeda (nama_sepeda,tipe_sepeda,pembeli,total_unit_pembelian,harga_satuan,total_yang_dibayar) 
		VALUES ('".$nama_sepeda."','".$tipe_sepeda."','".$pembeli."','".$total_unit_pembelian."','".$harga_satuan."','".$total_yang_dibayar."')";
		if (mysqli_query($conn, $sql)) {
			echo "Berhasil menambahkan data.";
		} else {
			echo "Gagal menambahkan data.";
		}
	}

// Close Connection
mysqli_close($conn);
?>