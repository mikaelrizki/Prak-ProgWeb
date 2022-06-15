<?php
    //kode anda
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
                    <input type="hidden" name="id" value=>
                    <tr>
                        <!-- lengkapi type dan valuenya -->
                        <td>Product Name</td>
                        <td><input type="" name="product_name" value=""></td>
                    </tr>
                    <tr>
                        <td>Variety</td>
                        <td>
                            <?php
                             //kode anda
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Stock Number</td>
                        <!-- lengkapi type dan valuenya -->
                        <td><input type="" name="stock" value=></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <!-- lengkapi type dan valuenya -->
                        <td><input type="" name="price" value=></td>
                    </tr>
                    <tr>
                        <td></td>
                        <!-- lengkapi typenya -->
                        <td><input type="" name="update" value="Update"></td>
                    </tr>
                </table>
            </form>

</body>

</html>