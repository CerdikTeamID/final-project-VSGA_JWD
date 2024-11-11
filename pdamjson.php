<?php
if(isset($_POST['hitung']))
// Tangkap variabel dari form
$vlokasi = $_POST["lokasi"];
$vnama = $_POST["nama"];
$vnomor = $_POST["nomor"];
$vgol = $_POST["gol"];
$vpakai = $_POST["pakai"];

if (isset($_POST['hitung'])) {
  $vgol = $_POST['gol'];
  $vpakai = $_POST['pakai'];

  if ($vgol >= "A" && $vgol <= "E") {
    $tarif_dasar = array(
      "A" => 5000,
      "B" => 8600,
      "C" => 10600,
      "D" => 11300,
      "E" => 15100
    );

    $tarif_pemakaian = $tarif_dasar[$vgol] * $vpemakaian;
    $harga_materai = 3000;
    $ppn = 1195;
    $biaya_pemeliharaan = 4400;

    $total_tagihan = $tarif_pemakaian + $ppn + $harga_materai + $biaya_pemeliharaan;

    echo "Tarif Pemakaian: " . $tarif_pemakaian . "<br>";
    echo "Total Tagihan: " . $total_tagihan . "<br>";
  } else {
    echo "Pastikan Golongan Terisi";
  }
}







//Tampilkan datanya
echo "Lokasi    		: $vlokasi <br>";
echo "Nama Pelanggan    : $vnama <br>";
echo "Nomor Pelangan    : $vnomor <br>";
echo "Golongan		    : $vgol <br>";
echo "Pemakaian(m3)     : $vpakai <br>";
echo "Tarif Pemakaian   : $vtarif <br>";
echo "Total Tagihan     : $vtotal <br>";


// File json yang akan dibaca
$file = "pdam.json";

// Mendapatkan file json
$konten = file_get_contents($file);

// Mendecode anggota.json
$data = json_decode($konten, true);

// Data array baru
$data[] = array (

'lokasi' => "$vlokasi",
'nama' => "$vnama",
'nomor' => "$vnomor",
'gol' => "$vgol",
'pakai' => "$vpakai",
'tarif' => "$vtarif",
'total' => "$vtotal",


);

$konten = json_encode($data, JSON_PRETTY_PRINT);

//menyimpan konten di file
file_put_contents($file, $konten);

//menampilkan data

foreach ($data as $key => $value)
{

echo"<hr><br>";
echo "Lokasi 		  :" .$value['lokasi']. '<br>';
echo "Nama Pelanggan  :" .$value['nama']. '<br>';
echo "Nomor Pelanggan :" .$value['nomor']. '<br>';
echo "Golongan 		  :" .$value['gol']. '<br>';
echo "Pemakaian(m3)   :" .$value['pakai']. '<br>';
echo "Tarif Pemakaian :" .$value['tarif']. '<br>';
echo "Total Tagihan   :" .$value['total']. '<br>';

echo"<hr>";

}
?>