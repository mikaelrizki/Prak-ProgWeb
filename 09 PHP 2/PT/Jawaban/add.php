<?php
    // Open Connection
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $databasename = "pt_php2_b";
    $conn = mysqli_connect($servername, $username, $password, $databasename) or die("Koneksi gagal.");
?>

<html>

<head>
	<title>Add Product</title>
	<link rel="stylesheet" href="add.css">
</head>

<body>
	<a href="index.php">
		<< Home</a>
			<br /><br />

			<h1>Add Item</h1>
			<form action="add.php" method="post" name="formTambahData">
				<table width="40%" border="0">
					<tr>
						<td>Product Name</td>
						<!-- lengkapi input type -->
						<td><input type="text" name="product_name"></td>
					</tr>
					<tr>
						<td>Variety</td>
						<td>
							<!-- lengkapi input type -->
							<input type="radio" id="chocolate" name="variety" value="Chocolate">
							<label for="chocolate">Chocolate</label><br>
							<input type="radio" id="candy" name="variety" value="Candy">
							<label for="candy">Candy</label><br>
							<input type="radio" id="cake" name="variety" value="Cake">
							<label for="cake">Cake</label><br>
						</td>
					</tr>
					<tr>
						<td>Stock Number</td>
						<!-- lengkapi input type -->
						<td><input type="text" name="stock"></td>
					</tr>
					<tr>
						<td>Price</td>
						<!-- lengkapi input type -->
						<td><input type="number" name="price" max="10000" min="0"></td>
					</tr>
					<tr>
						<td></td>
						<!-- lengkapi input type -->
						<td><input type="submit" name="Submit" value="Tambah"></td>
					</tr>
				</table>
			</form>

			<?php
				// Add Data
				if($_POST) {
					$product_name = $_POST["product_name"];
					$variety = $_POST["variety"];
					$stock = $_POST["stock"];
					$price = $_POST["price"];
					// SQL
					$sql = "INSERT INTO honeydukes_products (product_name,variety,stock,price)
					VALUES ('".$product_name."','".$variety."','".$stock."','".$price."')";
					if (mysqli_query($conn, $sql)) {
						?> <br><br><table><tr><td>Item berhasil ditambahkan!</td></tr></table> <?php
					} else {
						?> <br><br><table><tr><td>Item gagal ditambahkan!</td></tr></table> <?php
					}
				}
				// Close Connection
				mysqli_close($conn);
			?>
</body>

</html>