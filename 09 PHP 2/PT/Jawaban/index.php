<?php
    // Open Connection
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $databasename = "pt_php2_b";
    $conn = mysqli_connect($servername, $username, $password, $databasename) or die("Koneksi gagal.");

    // SELECT
    $sql = "SELECT * FROM honeydukes_products";

    // Run Query
    $result = mysqli_query($conn, $sql); 
?>

<html>
<head>    
    <title>Honeydukes Products</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <h1>Honeydukes Products <a href="add.php">+ Add Item</a></h1>
    <table width='80%' border=1>

    <tr>
        <th>PRODUCT NAME</th> 
        <th>VARIETY</th> 
        <th>STOCK</th> 
        <th>PRICE</th>
        <th>ACTION</th>
    </tr>
    <?php
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row["product_name"]."</td>";
            echo "<td>".$row["variety"]."</td>";
            echo "<td>".$row["stock"]."</td>";
            echo "<td>".$row["price"]."</td>";
            echo "<td>";
                echo "<a href='edit.php?id=".$row["id"]."'>Edit</a>";
                echo "<span> | </span>";
                echo "<a href='delete.php?id=".$row["id"]."'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
    ?>

    </table>
</body>
</html>