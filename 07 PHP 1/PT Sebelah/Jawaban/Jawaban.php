<?php
    $data_mahasiswa = [
        [
            "nama" => "Harris",
            "nim" => "71190434",
            "matkul" => [
                "visdat" => 3,
                "manpro" => 3
            ]
        ],
        [
            "nama" => "Vito",
            "nim" => "71190429",
            "matkul" => [
                "prog ios" => 3,
                "manpro" => 3,
                "mbkm" => 6,
            ]
        ],
        [
            "nama" => "Farel",
            "nim" => "71190422",
            "matkul" => []
        ]
    ];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT PHP#1</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Tabel Data Mahasiswa</h1>
    <?php
        function buatTable($data_mahasiswa){
            $html = '<table>';
            // Table Head
            $html .= '<tr>';
            foreach($data_mahasiswa[0] as $key => $value){
                $html .= '<th>'.$key.'</th>';
            }
            $html .= '<th>SKS</th>';
            $html .= '</tr>';
            // Body
            foreach($data_mahasiswa as $mahasiswa){
                $totalSKS = 0;
                $jumlahBaris = count($mahasiswa['matkul']);
                $html .= '<tr>';
                if($jumlahBaris == 0){
                    $html .= '<td>'.$mahasiswa['nama'].'</td>';
                    $html .= '<td>'.$mahasiswa['nim'].'</td><td>Cuti Studi</td><td>0</td></tr>';
                }
                else{
                    $totalSKS = reset($mahasiswa['matkul']);
                    $html .= '<td rowspan="'.$jumlahBaris.'">'.$mahasiswa['nama'].'</td>';
                    $html .= '<td rowspan="'.$jumlahBaris.'">'.$mahasiswa['nim'].'</td>';
                    $html .= '<td>'.key($mahasiswa['matkul']).'</td>';
                    $html .= '<td>'.reset($mahasiswa['matkul']).'</td>';
                    foreach($mahasiswa['matkul'] as $key => $value){
                        if($key == key($mahasiswa['matkul'])){
                            continue;
                        }
                        else{
                            $html .= '<tr><td>'.$key.'</td><td>'.$value.'</td></tr>';
                        }
                        $totalSKS += $value;
                    }
                    $html .= '</tr>';
                }
                
                $html .= '<td colspan="3">Total SKS</td><td>'.$totalSKS.'</td>';
            }
            $html .= '</table>';
            return $html;
        }
        echo buatTable($data_mahasiswa);
    ?>
</body>

</html>