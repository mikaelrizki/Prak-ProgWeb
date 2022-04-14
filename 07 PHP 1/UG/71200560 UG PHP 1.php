<?php
    $karyawan[0]['nik'] = '16E001'; 
    $karyawan[0]['nama'] = 'Danny Sebastian';
    $karyawan[0]['jenis_kelamin'] = 'L';
    $karyawan[0]['alamat'] = 'Yogyakarta';
    $karyawan[0]['hobi'] = Array('Belajar', 'Bermain', "Berlari");
    $karyawan[0]['gaji'] = "1300000";

    $karyawan[1]['nik'] = '20E002';
    $karyawan[1]['nama'] = 'Agata Filiana';
    $karyawan[1]['jenis_kelamin'] = 'P';
    $karyawan[1]['alamat'] = 'Sleman';
    $karyawan[1]['hobi'] = Array('Belajar', 'Bekerja');
    $karyawan[1]['gaji'] = "1200000";

    $karyawan[2]['nik'] = '20E003';
    $karyawan[2]['nama'] = 'Maria Nila A';
    $karyawan[2]['jenis_kelamin'] = 'P';
    $karyawan[2]['alamat'] = 'Desa Pelosok';
    $karyawan[2]['hobi'] = Array('Bekerja', 'Bercocok tanam');
    $karyawan[2]['gaji'] = "1300000";

    $karyawan[3]['nik'] = '20E004';
    $karyawan[3]['nama'] = 'Rizky';
    $karyawan[3]['jenis_kelamin'] = 'L';
    $karyawan[3]['alamat'] = 'Banyuwangi';
    $karyawan[3]['hobi'] = Array('Bekerja');
    $karyawan[3]['gaji'] = "1700000"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UG PHP 1</title>
    <style> table, tr, td {border: 1px solid black; border-collapse: collapse; padding: 10px;} ul {padding-left: 20px;}</style>
</head>
<body>
    <h2>Mikael Rizki Pandu Ekanto (71200560)</h2>
    <h3>Alpro ato PHP nih?!</h3>
    <h4>1. Segi-telu</h4>
    <?php
        // Array Variabel n
        $arrayN = [1,2,3,5,6];

        // Table
        $html = '<table>';

        // Table Head
        $html .= '<tr> <td>Nilai n</td> <td>Output</td> </tr>';

        // Perulangan Isi Tabel
        foreach($arrayN as $n){
            $html .= '<tr> <td>'.$n.'</td> <td>';
            // Ganjil
            if($n % 2 == 1){
                for($i = 1; $i <= $n; $i++){
                    for($j = 1; $j <= $i; $j++){
                        $html .= '*';
                    }
                    $html .= '<br>';
                }
            }
            // Genap
            else{
                for($i = $n; $i >= 1; $i--){
                    for($j = 1; $j <= $i; $j++){
                        $html .= '*';
                    }
                    $html .= '<br>';
                }
            }
            $html .= '</td></tr>';
        }

        // Menutup Table dan Mencetak Tabel
        $html .= '</table>';
        echo $html;
    ?>

    <h4>2. Angkane baris</h4>
    <table>
        <tr>
            <td><b>Nilai n</b></td>
            <td><b>Output</b></td>
        </tr>
        <?php
            function tribonacci($n){
                $x = 1;
                $y = 1;
                $z = 1;
                
                for($i = 0; $i <= $n; $i++){
                    if($i <= 2){
                        echo $x.' ';
                    } else {
                        $t = $x + $y + $z;
                        echo $t.' ';
                        $x = $y;
                        $y = $z;
                        $z = $t;
                    }
                }
                echo '<br>';
            }
            for ($n = 0;$n < 7;$n++){
                if($n == 5){continue;}
                else{
                    $iterasi = $n+1;
                echo '<tr><td>'.$iterasi.'</td><td>';
                tribonacci($n);
                echo '</td></tr>';
                }
            }
        ?>
        </table>

    <h3>Tabel lagi nih!</h3>
    <?php
        // Variabel Tampungan
        $jumlah = 0;
        $count = 0;
        $max = 0;
        $min = $karyawan[0]['gaji'];

        // Table
        $html = '<table>';

        // Table Head
        $html .= '<tr> <td>NIK</td> <td>Nama</td> <td>Jenis Kelamin</td> <td>Alamat</td> <td>Hobi</td> <td>Gaji</td> </tr>';

        // Perulangan Isi Tabel
        foreach($karyawan as $data){
            $html .= '<tr>';
            foreach($data as $key => $value){
                // Menampilkan Jenis Kelamin
                if($key == 'jenis_kelamin'){ 
                    if($value == 'L'){
                        $html .= '<td>Laki-laki</td>';
                    }
                    elseif($value == 'P'){
                        $html .= '<td>Perempuan</td>';
                    }
                    else{
                        $html .= '<td>Tidak tahu.</td>';
                    }
                }
                // Menampilkan Hobby Dengan Bullet
                elseif($key == 'hobi'){
                    $html .= '<td><ul>';
                    foreach($value as $hobi){
                        $html .= '<li>'.$hobi.'</li>';
                    }
                    $html .= '</ul></td>';
                }
                // Menampilkan Gaji Dengan Format Ribuan
                elseif($key == 'gaji'){
                    $jumlah += $value;
                    // Mencari Gaji Maksimal
                    if($value >= $max){
                        $max = $value;
                    }
                    // Mencari Gaji Minimum
                    if($value <= $min){
                        $min = $value;
                    }
                    $html .= '<td>Rp '.number_format($value,0,'','.').'</td>';
                }
                else{
                    $html .= '<td>'.$value.'</td>';
                }
            }
            $count += 1;
            $html .= '</tr>';
        }

        // Menghitung Rerata Gaji
        $rerata = $jumlah/$count;
        $html .= '<tr><td colspan="5">Rata-rata</td> <td>Rp '.number_format($rerata,0,'','.').'</td></tr>';

        // Menampilkan Gaji Maksimal dan Minimum
        $html .= '<tr><td colspan="5">Max</td> <td>Rp '.number_format($max,0,'','.').'</td></tr>';
        $html .= '<tr><td colspan="5">Min</td> <td>Rp '.number_format($min,0,'','.').'</td></tr>';

        // Menutup Table dan Mencetak Tabel
        $html .= '</table>';
        echo $html;
    ?>
</body>
</html>