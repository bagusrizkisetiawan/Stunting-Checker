<?php

$conn = mysqli_connect("localhost", "root", "", "kuliah_penambangan_data");

$cek = fn ($a, $aa, $b, $bb) => mysqli_num_rows(mysqli_query($conn, "SELECT * FROM stunting WHERE $a = '$aa' and $b='$bb' "));

$q = mysqli_query($conn, "SELECT * FROM stunting WHERE predict=''");

while ($d = mysqli_fetch_array($q)) {
    $sex = $d['1'];
    $age = $d['2'];
    $bw = $d['3'];
    $bl = $d['4'];
    $bdw = $d['5'];
    $bdl = $d['6'];
    $asi = $d['7'];

    $nData = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM stunting"));

    $yes =  mysqli_num_rows(mysqli_query($conn, "SELECT * FROM stunting WHERE stunting ='Yes'"));
    $p_yes = $yes / $nData;

    $no = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM stunting WHERE stunting ='No'"));
    $p_no = $no / $nData;


    $sex_yes = $cek("Sex", $sex, "Stunting", "Yes") / $yes;
    $age_yes = $cek("Age", $age, "Stunting", "Yes") / $yes;
    $bw_yes = $cek("BirthWeight", $bw, "Stunting", "Yes") / $yes;
    $bl_yes = $cek("BirthLength", $bl, "Stunting", "Yes") / $yes;
    $bdw_yes = $cek("BodyWeight", $bdw, "Stunting", "Yes") / $yes;
    $bdl_yes = $cek("BodyLength", $bdl, "Stunting", "Yes") / $yes;
    $asi_yes = $cek("ASIEksklusif", $asi, "Stunting", "Yes") / $yes;

    $class_yes = $p_yes * $sex_yes * $age_yes * $bw_yes * $bl_yes * $bdw_yes * $bdl_yes * $asi_yes;


    $sex_no = $cek("Sex", $sex, "Stunting", "No") / $no;
    $age_no = $cek("Age", $age, "Stunting", "No") / $no;
    $bw_no = $cek("BirthWeight", $bw, "Stunting", "No") / $no;
    $bl_no = $cek("BirthLength", $bl, "Stunting", "No") / $no;
    $bdw_no = $cek("BodyWeight", $bdw, "Stunting", "No") / $no;
    $bdl_no = $cek("BodyLength", $bdl, "Stunting", "No") / $no;
    $asi_no = $cek("ASIEksklusif", $asi, "Stunting", "No") / $no;

    $class_no = $p_no * $sex_no * $age_no * $bw_no * $bl_no * $bdw_no * $bdl_no * $asi_no;


    if ($class_no < $class_yes) {
        mysqli_query($conn, "UPDATE stunting SET Predict = 'Yes' WHERE id='$d[0]'");
    } else {
        mysqli_query($conn, "UPDATE stunting SET Predict = 'No' WHERE id='$d[0]'");
    }
}
if (isset($_POST['cek'])) {
}
