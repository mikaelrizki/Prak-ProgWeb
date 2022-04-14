<!-- Mikael Rizki Pandu Ekanto -->
<!-- 71200560 -->

<?php
    $array = [
        "Farel" => [
            [
                "channel" => "ANTV",
                "acara" => "Bipanah",
                "waktu" => "16.00",
                "durasi" => "3 jam"
            ],
            [
                "channel" => "RCTI",
                "acara" => "Ikatan Cinta",
                "waktu" => "19.00",
                "durasi" => "2 jam"
            ],
            [
                "channel" => "Global TV",
                "acara" => "Spongebob Squarepants",
                "waktu" => "06.00",
                "durasi" => "1 jam"
            ],
        ],
        "Harris" => [
            [
                "channel" => "SCTV",
                "acara" => "Anak Jalanan",
                "waktu" => "19.00",
                "durasi" => "2 jam"
            ],
            [
                "channel" => "MNC TV",
                "acara" => "Upin dan Ipin",
                "waktu" => "16.00",
                "durasi" => "3 jam"
            ],
            [
                "channel" => "Trans TV",
                "acara" => "Opera Van Java",
                "waktu" => "21.00",
                "durasi" => "2 jam"
            ],
        ],
    ];

    $acaraTop4 = array (
        array("Ikatan Cinta",1024,10.0),
        array("Anak Jalanan",99,9.0),
        array("Bipanah",16,8.8),
        array("Upin dan Ipin",111,8.7)
    );

    // Judul Farel
    $html = '<h1><b style="text-decoration: underline;">Farel</b> senang menonton acara tv pada tabel berikut :</h1>';

    // Thead Statis
    $html .= '<table border="1px"><thead><th>Channel</th><th>Acara</th><th>Waktu</th><th>Durasi</th>';

    // Tbody Dinamis Farel
    $totalDurasi = 0;
    foreach($array['Farel'] as $tv){
        $html .= '<tr>';
        foreach($tv as $key => $value){
            $html .= '<td>'.$value.'</td>';
            if($key == 'durasi'){
                $totalDurasi += intval($value);
            }    
        }
        $html .= '</tr>';
    }
    $html .= '<tr><td colspan="3">Total Durasi</td><td>'.$totalDurasi.' jam</td></tr>';
    $html .= '</table>';

    // Judul Harris
    $html .= '<h1><b style="text-decoration: underline;">Harris</b> senang menonton acara tv pada tabel berikut :</h1>';

    // Thead Statis
    $html .= '<table border="1px"><thead><th>Channel</th><th>Acara</th><th>Waktu</th><th>Durasi</th>';
    
    // Tbody Dinamis Harris
    $totalDurasi = 0;
    foreach($array['Harris'] as $tv){
        $html .= '<tr>';
        foreach($tv as $key => $value){
            $html .= '<td>'.$value.'</td>';
            if($key == 'durasi'){
                $totalDurasi += intval($value);
            }    
        }
        $html .= '</tr>';
    }
    $html .= '<tr><td colspan="3">Total Durasi</td><td>'.$totalDurasi.' jam</td></tr>';
    $html .= '</table>';

    // Judul Top 4 Acara
    $html .= '<h2>Top 4 Acara Dengan Rating Tertinggi</h2>';

    // Thead Statis
    $html .= '<table border="1px"><thead><th>Nama Acara</th><th>Jumlah Episode</th><th>Rating</th>';

    // Tbody Dinamis 4 Acara
    foreach($acaraTop4 as $acara){
        $html .= '<tr>';
        foreach($acara as $elemen){
            $html .= '<td>'.$elemen.'</td>';
        }
        $html .= '</tr>';
    }

    // Print html
    echo $html;
?>