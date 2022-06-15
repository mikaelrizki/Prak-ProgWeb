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
						<td><input type="" name="product_name"></td>
					</tr>
					<tr>
						<td>Variety</td>
						<td>
							<!-- lengkapi input type -->
							<input type="" id="chocolate" name="variety" value="Chocolate">
							<label for="chocolate">Chocolate</label><br>
							<input type="" id="candy" name="variety" value="Candy">
							<label for="candy">Candy</label><br>
							<input type="" id="cake" name="variety" value="Cake">
							<label for="cake">Cake</label><br>
						</td>
					</tr>
					<tr>
						<td>Stock Number</td>
						<!-- lengkapi input type -->
						<td><input type="" name="stock"></td>
					</tr>
					<tr>
						<td>Price</td>
						<!-- lengkapi input type -->
						<td><input type="" name="price"></td>
					</tr>
					<tr>
						<td></td>
						<!-- lengkapi input type -->
						<td><input type="" name="Submit" value="Tambah"></td>
					</tr>
				</table>
			</form>

			<?php
				//kode anda
			?>
</body>

</html>