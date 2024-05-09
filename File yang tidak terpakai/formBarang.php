<?php 
    session_start();
    if(!$_SESSION['login']){
        header("location: formLogin.php");
    }
?>
<html>
    <head>
        <title>Form Barang</title>
    </head>
    <body>
        <form action="simpanBarang.php" method="get">
            <label for="">Nama Barang </label><br/>
            <input type="text" name="nama_barang" /> <br/><br/>
            <label for="">Harga Barang</label></br>
            <input type="number" name="harga"> <br/><br/>
            <label for="">Jumlah Stok</label><br/>
            <input type="number" name="stok"> <br/><br/>
            <button type="submit">Simpan</button>
        </form>
    </body>
</html>