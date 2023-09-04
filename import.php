<?php
// Koneksi ke database MySQL
// $host = 'localhost'; // Ganti dengan host database Anda
// $db = 'kuliah_penambangan_data'; // Ganti dengan nama database Anda
// $user = 'root'; // Ganti dengan username database Anda
// $password = ''; // Ganti dengan password database Anda

// $koneksi = mysqli_connect($host, $user, $password, $db);
// if (!$koneksi) {
//     die('Koneksi database gagal: ' . mysqli_connect_error());
// }

// // Path file CSV yang akan diimpor
// $file = 'Stunting.csv';

// // Membuka file CSV
// $handle = fopen($file, "r");

// // Melakukan iterasi baris per baris pada file CSV
// while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) {
//     // Mengambil data dari setiap kolom
//     $Sex = $data[0];
//     $Age = $data[1];
//     $BirthWeight = $data[2];
//     $BirthLenght = $data[3];
//     $bodyWeight = $data[4];
//     $bodyLength = $data[5];
//     $ASIEksklusif = $data[6];
//     $Stunting = $data[7];

//     // Menyiapkan query INSERT
//     $query = "INSERT INTO stunting  VALUES ('$Sex', '$Age', '$BirthWeight', '$BirthLenght', '$bodyWeight', '$bodyLength', '$ASIEksklusif','$Stunting','')";

//     // Menjalankan query INSERT
//     mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
// }

// // Menutup file CSV
// fclose($handle);

// // Menampilkan pesan jika import berhasil
// echo "Import file CSV berhasil";

// // Menutup koneksi ke database MySQL
// mysqli_close($koneksi);
