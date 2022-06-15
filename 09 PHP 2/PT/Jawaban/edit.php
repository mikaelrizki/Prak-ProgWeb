<?php
    // Open Connection
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $databasename = "pt_php2_b";
    $conn = mysqli_connect($servername, $username, $password, $databasename) or die("Koneksi gagal.");

    // Initial State
	$old_product_name = "";
	$old_variety = "";
	$old_stock = "";
	$old_price = "";

    // Method GET
    if($_GET){
        $id = $_GET["id"];
        $sql = "SELECT * FROM honeydukes_products WHERE id=".$id;
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
            $old_product_name = $row["product_name"];
			$old_variety = $row["variety"];
			$old_stock = $row["stock"];
			$old_price = $row["price"];
        }
        else {
            echo "Item yang akan diedit tidak ditemukan";
        }
    }
?>
<html>

<head>
    <title>Edit Item</title>
    <link rel="stylesheet" href="edit.css">
</head>

<body>
    <a href="index.php">
        << Go to Home</a>
            <br /><br />

            <h1>Edit Product</h1>
            <form action="edit.php" method="post" name="formTambahData">
                <table width="50%" border="0">
                    <!-- lengkapi valuenya -->
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <tr>
                        <!-- lengkapi type dan valuenya -->
                        <td>Product Name</td>
                        <td><input type="text" name="product_name" value="<?php echo $old_product_name; ?>"></td>
                    </tr>
                    <tr>
                        <td>Variety</td>
                        <td>
                            <!-- Chocolate -->
                            <input type="radio" name="variety" value="Chocolate" 
                            <?php if($old_variety == "Chocolate"){echo "checked";} ?> >
                            <label for="chocolate">Chocolate</label><br>
                            <!-- Candy -->
                            <input type="radio" name="variety" value="Candy" 
                            <?php if($old_variety == "Candy"){echo "checked";} ?> >
                            <label for="candy">Candy</label><br>
                            <!-- Cake -->
                            <input type="radio" name="variety" value="Cake" 
                            <?php if($old_variety == "Cake"){echo "checked";} ?> >
                            <label for="cake">Cake</label><br>
                        </td>
                    </tr>
                    <tr>
                        <td>Stock Number</td>
                        <!-- lengkapi type dan valuenya -->
                        <td><input type="text" name="stock" value="<?php echo $old_stock; ?>"></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <!-- lengkapi type dan valuenya -->
                        <td><input type="number" name="price" max="10000" min="0" value=<?php echo $old_price; ?>></td>
                    </tr>
                    <tr>
                        <td></td>
                        <!-- lengkapi typenya -->
                        <td><input type="submit" name="update" value="Update"></td>
                    </tr>
                </table>
            </form>

</body>

</html>

<?php
    if($_POST) {
		if($_POST["id"] != null) {
			// Edit
			$product_name = $_POST["product_name"];
			$variety = $_POST["variety"];
			$stock = $_POST["stock"];
			$price = $_POST["price"];
			$sql = "UPDATE honeydukes_products SET 
				product_name = '".$product_name."', 
				variety = '".$variety."', 
				stock = '".$stock."',
				price = '".$price."' WHERE id=".$_POST['id'];
			if(mysqli_query($conn, $sql)) {
				?> <br><br><table><tr><td>Item berhasil diedit!</td></tr></table> <?php
			} else {
				?> <br><br><table><tr><td>Item gagal diedit!</td></tr></table> <?php
			}
		}
		else {
			echo "Item yang akan diedit tidak tersedia.";
		}
	}
    // Close Connection
    mysqli_close($conn);
?>