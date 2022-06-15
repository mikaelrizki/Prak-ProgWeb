<?php
    // Open Connection
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $databasename = "pt_php2_a";
    $conn = mysqli_connect($servername, $username, $password, $databasename) or die("Koneksi gagal.");

    // SELECT
    $sql = "SELECT * FROM penjualan_sepeda";

    // Run Query
    $result = mysqli_query($conn, $sql); 
?>

<html>
<head>    
    <title>Pembelian Sepeda 2022</title>
</head>

<body>
<a href='add.php'>+ Tambah Data</a><br/><br/>
    <h1>Pembelian Sepeda 2022</h1>
    <table width='80%' border=1>

    <tr>
        <th>Nama Sepeda</th> 
        <th>Tipe Sepeda</th> 
        <th>Pembeli</th> 
        <th>Total Unit</th> 
        <th>Harga Satuan</th>
        <th>Total Harga</th>
        <th>Action</th>
    </tr>

    <?php
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row["nama_sepeda"]."</td>";
            echo "<td>".$row["tipe_sepeda"]."</td>";
            echo "<td>".$row["pembeli"]."</td>";
            echo "<td>".$row["total_unit_pembelian"]."</td>";
            echo "<td>".$row["harga_satuan"]."</td>";
            echo "<td>".$row["total_yang_dibayar"]."</td>";
            echo "<td>";
                echo "<a href='edit.php?id=".$row['id']."'>Edit</a>";
                echo "<span> | </span>";
                echo "<a href='delete.php?id=".$row['id']."'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
    ?>
    </table>
</body>
</html>