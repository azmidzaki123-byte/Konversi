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
            box-sizing: border-box;
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

        .error{
            margin-top:20px;
            padding:15px;
            background:#ffcccc;
            border-radius:10px;
            font-size:16px;
            color:#cc0000;
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
            step="0.01"
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

        $nilai = floatval($_POST['nilai']);
        $jenis = $_POST['jenis'];

        $hasil = "";
        $error = "";

        // Validasi input
        if(is_nan($nilai)){
            $error = "Input harus berupa angka!";
        } else {
            if($jenis == "c_to_f"){
                $hasil = round(($nilai * 9/5) + 32, 2) . " °F";
            }
            elseif($jenis == "f_to_c"){
                $hasil = round(($nilai - 32) * 5/9, 2) . " °C";
            }
            elseif($jenis == "c_to_k"){
                $hasil = round($nilai + 273.15, 2) . " K";
            }
            elseif($jenis == "k_to_c"){
                $hasil = round($nilai - 273.15, 2) . " °C";
            }
        }

        if(!empty($error)){
            echo "
            <div class='error'>
                ⚠️ $error
            </div>
            ";
        } else {
            echo "
            <div class='hasil'>
                Hasil Konversi: <br><br>
                <b>$hasil</b>
            </div>
            ";
        }
    }

    ?>

</div>

</body>
</html>
