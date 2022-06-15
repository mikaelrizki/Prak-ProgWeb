<!-- Mikael Rizki Pandu Ekanto -->
<!-- 71200560 -->

<?php
    // Open Connection
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $databasename = "ug_php2";
    $conn = mysqli_connect($servername, $username, $password, $databasename) or die("Koneksi gagal.");
?>

<html>
<head>
    <title>Hapus Data</title>
</head>
<body>
    <a href="index.php"><< Home</a>
    <br><br>
    <?php
        //DELETE
        $id = $_GET["id"];
        $sql = "DELETE FROM pengguna WHERE id=".$id;
        if (mysqli_query($conn, $sql)) {
            echo "Berhasil menghapus data.";
        } 
        else {
            echo "Gagal menghapus data.";
        }
    ?>
</body>
</html>

<?php
    // Close Connection
    mysqli_close($conn);
?>