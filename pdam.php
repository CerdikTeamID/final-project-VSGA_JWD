<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDAM</title>
    <!-- Menghubungkan ke file CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
        h1 {
            color: blue;
            font-weight: bold;
            font-size: 36px;
        }
        input[type=submit] {
            background-color: blue;
            color: white;
        }
    </style>

</head>
<body>
<form action="pdam.php" method="post">

<fieldset>
<h1 >Perhitungan Tagihan PDAM</h1>

<?php

// Array data lokasi
$lokasi = array("Jakarta", "Depok", "Bogor", "Tangerang", "Bekasi");

// Membuat dropdown list
echo "<label for='lokasi'>Lokasi		:</label> ";
echo "<select name='lokasi' id='lokasi'>";
foreach ($lokasi as $value) {
    echo "<option value='$value'>$value</option>";
}
echo "</select></br>";

?>


Nama Pelangan 		  : <input type="text" name="nama"/><br/>
Nomor Pelanggan 	: <input type="text" name="nomor"/><br/>
Golongan			:
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gol" id="A" value="A">
                    <label class="form-check-label" for="A">
                        (A)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gol" id="B" value="B">
                    <label class="form-check-label" for="golB">
                        (B)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gol" id="C" value="C">
                    <label class="form-check-label" for="golC">
                        (C)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gol" id="D" value="D">
                    <label class="form-check-label" for="golD">
                        (D)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gol" id="E" value="E">
                    <label class="form-check-label" for="golE">
                        (E)
                    </label>
                </div>
            </div>
            

Pemakaian(m3)	: <input type="text" name="pakai"/><br/>

<input type="submit" value="Hitung" name="hitung"/>

</fieldset>
<?php
if (isset($_POST['hitung'])) {
  // Tangkap variabel dari form
  $vlokasi = $_POST["lokasi"];
  $vnama = $_POST["nama"];
  $vnomor = $_POST["nomor"];
  $vgol = $_POST["gol"];
  $vpakai = $_POST["pakai"];

  if ($vgol >= "A" && $vgol <= "E") {
    $tarif_dasar = array(
      "A" => 5000,
      "B" => 8600,
      "C" => 9800,
      "D" => 11300,
      "E" => 15100
    );

    $tarif_pemakaian = $tarif_dasar[$vgol] * $vpakai;
    $harga_materai = 3000;
    $ppn = 1195;
    $biaya_pemeliharaan = 4400;

    $total_tagihan = $tarif_pemakaian + $ppn + $harga_materai + $biaya_pemeliharaan;
 
   

    // Menyimpan data ke dalam file JSON
    $file = "pdam.json";

    // Mendapatkan file JSON
    $konten = file_get_contents($file);

    // Mendecode file JSON
    $data = json_decode($konten, true);

    // Data array baru
    $data[] = array(
      'lokasi' => $vlokasi,
      'nama' => $vnama,
      'nomor' => $vnomor,
      'gol' => $vgol,
      'pakai' => $vpakai,
      'tarif' => $tarif_pemakaian,
      'total' => $total_tagihan
    );

    $konten = json_encode($data, JSON_PRETTY_PRINT);

    // Menyimpan konten di file
    file_put_contents($file, $konten);
    //menampilkan data

foreach ($data as $key => $value)
{

echo"<hr>";
echo "Lokasi      :" .$value['lokasi']. '<br>';
echo "Nama Pelanggan  :" .$value['nama']. '<br>';
echo "Nomor Pelanggan :" .$value['nomor']. '<br>';
echo "Golongan      :" .$value['gol']. '<br>';
echo "Pemakaian(m3)   :" .$value['pakai']. '<br>';
echo "Tarif Pemakaian :" .$value['tarif']. '<br>';
echo "Total Tagihan   :" .$value['total']. '<br>';

echo"<hr>";

}
  } else {
    echo "Pastikan Golongan Terisi";
  }
}
?>


</form>
</body>
</html>



