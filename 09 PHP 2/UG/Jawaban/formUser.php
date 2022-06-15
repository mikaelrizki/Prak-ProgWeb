<!-- Mikael Rizki Pandu Ekanto -->
<!-- 71200560 -->

<?php
    // Open Connection
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $databasename = "ug_php2";
    $conn = mysqli_connect($servername, $username, $password, $databasename) or die("Koneksi gagal.");

    // Initial Variabel
    $id = "";
    $oldND = "";
    $oldNB = "";
    $oldJK = "";
    $oldTL = "";
    $oldHB = "";
    $oldEM = "";
    $oldAL = "";
    $oplPass = "";
    $oldGame = "";
    $oldCoding = "";
    $oldDesign = "";

    // Get Method
    if($_GET){
        $id = $_GET["id"];
        $sql = "SELECT * FROM pengguna WHERE id=".$id;
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $oldND = $row['nama_depan'];
            $oldNB = $row['nama_belakang'];
            $oldJK = $row['jenis_kelamin'];
            $oldTL = $row['tanggal_lahir'];
            $oldHB = $row['hobi'];
            $oldEM = $row['email'];
            $oldAL = $row['alamat'];
            $oplPass = $row['password'];
        }
        else {
            echo "Data yang akan diedit tidak ditemukan.";
        }
        $x = explode("|",$oldHB);
        $oldGame = $x[0];
        $oldCoding = $x[1];
        $oldDesign = $x[2];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengguna</title>
</head>

<!-- Style -->
<style>
    *{
    font-family: Helvetica, sans-serif;
    /* text-align: center; */
    color: #363062;
}

body{
    margin: 0;
    background-color: #827397;
}

div.back{
    margin: auto;
    width: 500px;
    margin-top: 5%;
    background-color: #E9D5DA;
    padding: 30px;
    border-radius: 15px;
}

table, tr, th, td{
    margin: auto;
    border-collapse: collapse;
}

th, td{
    padding: 7px;
    font-size: 1em;
    height: 30px;
}

.radio{
    display: flex;
    align-items: center;
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

span{
    font-size: 2em;
    color: white;
}
</style>

<body>
    <div class="back">
    <button><a href="index.php">Home</a></button>
    <br><br>
    <form action="formUser.php" method="POST"> 
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <table>
            <tr>
                <td>Nama Depan</td>
                <td>
                    <input type="text" name="nama_depan" required 
                    value ="<?php if ($id != null) {echo $oldND;} ?>"/>
                </td>
            </tr>
            <tr>
                <td>Nama Belakang</td>
                <td>
                    <input type="text" name="nama_belakang" required 
                    value ="<?php if ($id != null) {echo $oldNB;} ?>"/>
                </td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <div class="radio">
                    <div class="Laki-laki">
                    <input type="radio" name="jenis_kelamin" value="L" 
                    <?php if($oldJK == "L"){echo "checked";} ?>/> Laki-laki</div>
                    <div class="perempuan">
                    <input type="radio" name="jenis_kelamin" value="P" 
                    <?php if($oldJK == "P"){echo "checked";} ?>/> Perempuan</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>
                    <input type="date" name="tanggal_lahir" required 
                    value ="<?php if ($id != null) {echo $oldTL;} ?>"/>
                </td>
            </tr>
            <tr>
                <td>Hobi</td>
                <td>
                    <input type="checkbox" name="game" value ="game" <?php if ($id != null) {echo($oldGame == "game" ? 'checked' : '');} ?>/> Game <br>
                    <input type="checkbox" name="coding" value ="coding" <?php if ($id != null) {echo($oldCoding == "coding" ? 'checked' : '');} ?>/> Coding <br>
                    <input type="checkbox" name="design" value ="design" <?php if ($id != null) {echo($oldDesign == "design" ? 'checked' : '');} ?>/> Design
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <input type="email" name="email" required 
                    value ="<?php if ($id != null) {echo $oldEM;} ?>"/>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>
                    <input type="text" name="alamat" required 
                    value ="<?php if ($id != null) {echo $oldAL;} ?>"/>
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="password" name="password" required 
                    value ="<?php if ($id != null) {echo $oldPass;} ?>"/>
                </td>
            </tr>
            <tr>
                <td>Konfirmasi Password</td>
                <td>
                    <input type="password" name="confpass" required 
                    value ="<?php if ($id != null) {echo $oldPass;} ?>"/>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="update" value="Submit / Update">
                    <input type="reset" name="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>

<?php
    if ($_POST) {
        if ($_POST['id'] != null) {
            $nama_depan = $_POST['nama_depan'];
            $nama_belakang = $_POST['nama_belakang'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $email = $_POST['email'];
            $alamat = $_POST['alamat'];
            $password = $_POST['password'];
            if(isset($_POST['game'])) {
                $game = $_POST['game'];
            } else {$game = "-";}
            if(isset($_POST['coding'])) {
                $coding = $_POST['coding'];
            } else {$coding = "-";}
            if(isset($_POST['design'])) {
                $design = $_POST['design'];
            } else {$design = "-";}
            $hobi = $game."|".$coding."|".$design;
            if ($_POST["password"] === $_POST["confpass"]) {
                $sql = "UPDATE pengguna SET 
                nama_depan = '" . $nama_depan . "', 
                nama_belakang = '" . $nama_belakang . "', 
                jenis_kelamin = '" . $jenis_kelamin . "', 
                tanggal_lahir = '" . $tanggal_lahir . "', 
                hobi = '" . $hobi . "', 
                email = '" . $email . "', 
                alamat = '" . $alamat . "', 
                password = '" . $password . "'WHERE id = '" . $_POST['id'] . "'";
                if(mysqli_query($conn, $sql)) {
                    ?> <br><br><table><tr><td><span>Data berhasil diedit!</span></td></tr></table> <?php
                } else {
                    ?> <br><br><table><tr><td><span>Data gagal diedit!</span></td></tr></table> <?php
                }
            } else {
                ?> <br><br><table><tr><td><span>Password tidak sama. Silahkan mengulangi lagi.</span></td></tr></table> <?php
            }
        }
        else {
            $nama_depan = $_POST['nama_depan'];
            $nama_belakang = $_POST['nama_belakang'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $email = $_POST['email'];
            $alamat = $_POST['alamat'];
            $password = $_POST['password'];
            if(isset($_POST['game'])) {
                $game = $_POST['game'];
            } else {$game = "-";}
            if(isset($_POST['coding'])) {
                $coding = $_POST['coding'];
            } else {$coding = "-";}
            if(isset($_POST['design'])) {
                $design = $_POST['design'];
            } else {$design = "-";}
            $hobi = $game."|".$coding."|".$design;
            if ($_POST["password"] === $_POST["confpass"]) {
                $sql = "INSERT INTO pengguna (nama_depan, nama_belakang, jenis_kelamin, tanggal_lahir, hobi, email, alamat, password) VALUES (
                    '" . $nama_depan . "', 
                    '" . $nama_belakang . "', 
                    '" . $jenis_kelamin . "', 
                    '" . $tanggal_lahir . "', 
                    '" . $hobi . "', 
                    '" . $email . "', 
                    '" . $alamat . "', 
                    '" . $password . "')";
                if(mysqli_query($conn, $sql)) {
                    ?> <br><br><table><tr><td><span>Data berhasil ditambahkan!</span></td></tr></table> <?php
                } else {
                    ?> <br><br><table><tr><td><span>Data gagal ditambahkan!</span></td></tr></table> <?php
                }
            } else {
                ?> <br><br><table><tr><td><span>Password tidak sama. Silahkan mengulangi lagi.</span></td></tr></table> <?php
            }
            
        }
    }
    // Close Connection
    mysqli_close($conn);
?>