<?php
    // Open Connection
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $databasename = "pt_php2_a";
    $conn = mysqli_connect($servername, $username, $password, $databasename) or die("Koneksi gagal.");

	// SELECT
    $sql = "SELECT * FROM penjualan_sepeda";

	// State 
	$sudahUpdate = false;

    // Run Query
    $result = mysqli_query($conn, $sql); 

	// Initial Var
	$old_nama_sepeda = "";
	$old_tipe_sepeda = "";
	$old_pembeli = "";
	$old_total_unit_pembelian = "";
	$old_harga_satuan = "";
	$old_total_yang_dibayar = "";

	// Method GET
    if($_GET){
        $id = $_GET['id'];
        $sql = "SELECT * FROM penjualan_sepeda WHERE id=".$id;
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
            $old_nama_sepeda = $row["nama_sepeda"];
			$old_tipe_sepeda = $row["tipe_sepeda"];
			$old_pembeli = $row["pembeli"];
			$old_total_unit_pembelian = $row["total_unit_pembelian"];
			$old_harga_satuan = $row["harga_satuan"];
			$old_total_yang_dibayar = $row["total_yang_dibayar"];
        }
        else {
            echo "Data yang akan diedit tidak ditemukan";
        }
    }
?>

<html>
<head>	
	<title>Edit User Data</title>
</head>

<body>
<a href="index.php"><< Go to Home</a>
	<br/><br/>

    <h1>Edit data Sepeda</h1>
	<form action="edit.php" method="post" name="formEditData">
		<table width="50%" border="0">
			<input type="hidden" name="id" value ="<?php echo $id;?>">
			<tr> 
				<td>Nama Sepeda</td>
				<td><input type="text" name="nama_sepeda" value="<?php if($sudahUpdate == false){echo $old_nama_sepeda;}else{echo "";} ?>"></td>
			</tr>
            <tr> 
				<td>Tipe Sepeda</td>
				<td>
					<input type="radio" name="tipe_sepeda" value="Special Edition" <?php if($old_tipe_sepeda == "Spesial Edition"){echo "checked";} ?> > Special Edition
					<input type="radio" name="tipe_sepeda" value="Ultimate Edition" <?php if($old_tipe_sepeda == "Ultimate Edition"){echo "checked";} ?> > Ultimate Edition
				</td>
			</tr>
			<tr> 
				<td>Pembeli</td>
				<td><input type="text" name="pembeli" value="<?php if($sudahUpdate == false){echo $old_pembeli;} ?>"></td>
			</tr>
			<tr> 
				<td>Total Unit</td>
				<td><input type="text" name="total_unit_pembelian" value="<?php if($sudahUpdate == false){echo $old_total_unit_pembelian;} ?>"></td>
			</tr>
            <tr> 
				<td>Harga Satuan</td>
				<td><input type="text" name="harga_satuan" value="<?php if($sudahUpdate == false){echo $old_harga_satuan;} ?>"></td>
			</tr>
			<tr> 
				<td>Total di bayar</td>
				<td><input type="text" name="total_yang_dibayar" value="<?php if($sudahUpdate == false){echo $old_total_yang_dibayar;} ?>"></td>
			</tr>
			<tr> 
				<td></td>
				<?php $sudahUpdate = True; ?>
				<td><input type="submit" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>

<?php
    if($_POST) {
		if($_POST['id'] != null) {
			// Edit
			$nama_sepeda = $_POST["nama_sepeda"];
			$tipe_sepeda = $_POST["tipe_sepeda"];
			$pembeli = $_POST["pembeli"];
			$total_unit_pembelian = $_POST["total_unit_pembelian"];
			$harga_satuan = $_POST["harga_satuan"];
			$total_yang_dibayar = $_POST["total_yang_dibayar"];
			$sql = "UPDATE penjualan_sepeda SET 
				nama_sepeda = '".$nama_sepeda."', 
				tipe_sepeda = '".$tipe_sepeda."', 
				pembeli = '".$pembeli."', 
				total_unit_pembelian = '".$total_unit_pembelian."', 
				harga_satuan = '".$harga_satuan."', 
				total_yang_dibayar = '".$total_yang_dibayar."' WHERE id=".$_POST['id'];
			if(mysqli_query($conn, $sql)) {
				echo "Berhasil mengedit data.";
			} else {
				echo "Gagal mengedit data.";
			}
		}
		else {
			echo "Tidak ada data penjualan sepeda";
		}
	}

// Close Connection
mysqli_close($conn);
?>