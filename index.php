<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Aplikasi Konversi Suhu</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg,#004aad,#00b4ff);
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
            margin:0;
        }

        .container{
            background:white;
            padding:30px;
            width:350px;
            border-radius:15px;
            box-shadow:0 5px 15px rgba(0,0,0,0.2);
            text-align:center;
        }

        h2{
            color:#004aad;
            margin-bottom:20px;
        }

        input, select{
            width:100%;
            padding:12px;
            margin:10px 0;
            border:1px solid #ccc;
            border-radius:8px;
            font-size:16px;
        }

        button{
            width:100%;
            padding:12px;
            border:none;
            background:#004aad;
            color:white;
            font-size:16px;
            border-radius:8px;
            cursor:pointer;
        }

        button:hover{
            background:#007bff;
        }

        .hasil{
            margin-top:20px;
            padding:15px;
            background:#f1f1f1;
            border-radius:10px;
            font-size:18px;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>Aplikasi Konversi Suhu</h2>

    <form method="POST">

        <input 
            type="number" 
            name="nilai" 
            placeholder="Masukkan suhu"
            required
        >

        <select name="jenis">
            <option value="c_to_f">Celsius ke Fahrenheit</option>
            <option value="f_to_c">Fahrenheit ke Celsius</option>
            <option value="c_to_k">Celsius ke Kelvin</option>
            <option value="k_to_c">Kelvin ke Celsius</option>
        </select>

        <button type="submit" name="konversi">
            Konversi
        </button>

    </form>

    <?php

    if(isset($_POST['konversi'])){

        $nilai = $_POST['nilai'];
        $jenis = $_POST['jenis'];

        $hasil = "";

        if($jenis == "c_to_f"){
            $hasil = ($nilai * 9/5) + 32 . " °F";
        }

        elseif($jenis == "f_to_c"){
            $hasil = ($nilai - 32) * 5/9 . " °C";
        }

        elseif($jenis == "c_to_k"){
            $hasil = $nilai + 273.15 . " K";
        }

        elseif($jenis == "k_to_c"){
            $hasil = $nilai - 273.15 . " °C";
        }

        echo "
        <div class='hasil'>
            Hasil Konversi: <br><br>
            <b>$hasil</b>
        </div>
        ";
    }

    ?>

</div>

</body>
</html>
