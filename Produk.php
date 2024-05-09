<?php
namespace Produk{
    // Menghubungkan ke file koneksi
    require_once "koneksi.php";
    use Connection\Connect;
    
// Menginisiasi class produk
class Produk extends Connect{
    // Menginisiasi method untuk menampilkan produk
    public function readProduk(){
        $conn = $this->getConnection();
        $query = "SELECT * FROM barang";  
        $result = $conn->query($query);
        $barang = $result->fetchAll();
        return $barang;
        }
// Menginisiasi method untuk mencari barang
         public function searchBarang($nama_barang){
        $conn = $this->getConnection();
        $query = "SELECT * FROM barang 
          WHERE nama_barang LIKE '%$nama_barang%' ";  
        $result = $conn->query($query);
        $barang = $result->fetchAll();
        return $barang;
        }
    

    }
}
?>