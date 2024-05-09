<?php

    include "koneksi.php";    

    //Ambil data yang di kirim
    $dataBarang = [
        'nama_barang' => $_GET['nama_barang'],
        'harga' => $_GET['harga'],
        'stok' => $_GET['stok']
    ];

    //membangun query
    $sql = "insert into barang(nama_barang,harga,stok)
    values('$dataBarang[nama_barang]',$dataBarang[harga], $dataBarang[stok])";

    //mengeksekusi query
    $newBarang = mysqli_query($connect, $sql);

    if($newBarang){
        header('Location:listBarang.php');
    }else{
        echo "Gagal Menyimpan Data!!";
    }
?>