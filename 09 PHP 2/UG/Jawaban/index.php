<!-- Mikael Rizki Pandu Ekanto -->
<!-- 71200560 -->

<?php
    // Open Connection
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $databasename = "ug_php2";
    $conn = mysqli_connect($servername, $username, $password, $databasename) or die("Koneksi gagal.");

    // SELECT
    $sql = "SELECT * FROM pengguna";

    // Run Query
    $result = mysqli_query($conn, $sql); 
?>

<!-- Style -->
<style>
    *{
    font-family: Helvetica, sans-serif;
    text-align: center;
    color: #363062;
}

body{
    margin: 0;
    background-color: #827397;
}

div{
    width: 80%;
    margin: auto;
    margin-top: 5%;
    background-color: #E9D5DA;
    padding: 20px;
    border-radius: 15px;
}

table, tr, th, td{
    margin: auto;
    border-collapse: collapse;
    border: 2px solid black;
    background-color: #f3edee;
}

th, td{
    padding: 7px;
    font-size: 1em;
}

a{
    font-weight: bold;
}

.tambah{
    text-decoration: none;
    font-size: 1em;
    font-weight: bold;
    padding: 12px;
    color: white;
    background-color: #6f6381;
    border-radius: 8px;
    margin-bottom: 10px;
}
</style>


<!-- HTML -->
<div><h1>Daftar Pengguna</h1>
    <table>
        <thead>
            <th>Nama Depan</th>
            <th>Nama Belakang</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Hobi</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Password</th>
        </thead>
    
    <?php
    while ($row = mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td>" . $row["nama_depan"] . "</td>";
        echo "<td>" . $row["nama_belakang"] . "</td>";
        echo "<td>" . $row["jenis_kelamin"] . "</td>";
        echo "<td>" . $row["tanggal_lahir"] . "</td>";
        echo "<td>" . $row["hobi"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["alamat"] . "</td>";
        echo "<td>" . $row["password"] . "</td>";
        echo "<td>";
        echo "<a href='formUser.php?id=" . $row["id"] . "'>Edit</a>";
        echo " | ";
        echo "<a href='deleteUser.php?id=" . $row["id"] . "'>Delete</a>";
        echo "</td>";
        echo "</tr>";
    }
?>
</table>
<br><br><a href='formUser.php' class="tambah">Tambah Pengguna</a><br><br></div>

<?php
    // Close Connection
    mysqli_close($conn);
?>