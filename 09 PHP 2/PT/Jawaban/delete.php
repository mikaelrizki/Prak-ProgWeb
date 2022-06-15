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
    <title>Hapus Data Pembelian Sepeda</title>
</head>
<body>
    <a href="index.php"><< Home</a>
    <br><br>
    <?php
        //DELETE
        $id = $_GET["id"];
        $sql = "DELETE FROM honeydukes_products WHERE id=".$id;
        if (mysqli_query($conn, $sql)) {
            echo "Berhasil menghapus item.";
        } 
        else {
            echo "Gagal menghapus item.";
        }
    ?>
</body>
</html>