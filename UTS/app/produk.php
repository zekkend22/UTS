<?php
class produk{
    private $db;
    public function __construct()
    {
        try {
            $this->db =
new PDO("mysql:host=localhost;dbname=barang","root","");

        } catch (PDOException $e) {
            die ("Error " . $e->getMessage());
        }
    }
    
    public function tampil()
    {
        $sql = "SELECT * FROM produk";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
        }

        return $data;
    }
    public function simpan() {
            $sql = "insert into produk values ('','".$_GET['nama']."','".$_GET['tipe']."','".$_GET['stok']."')";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            echo "DATA BERHASIL DISIMPAN !";
        }
    public function hapus()
    {
        $sql = "delete from produk where produk_id='".$_GET['produk_id']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIHAPUS !";
    }      
    public function tampil_update()
    {
        $sql = "SELECT * FROM produk where produk_id='".$_GET['produk_id']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function update($id, $nama,$tipe,$stok)
    {
        $sql = "update produk set produk_nama='".$nama."', produk_tipe='".$tipe."', produk_stok='".$stok."' where produk_id='".$id."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIUPDATE !";
    }   
    public function cari($nama){
        $sql = "SELECT * FROM produk where produk_nama LIKE '%".$nama."%'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()){
            $data[] = $rows;
            }
        return $data;
    }
 }