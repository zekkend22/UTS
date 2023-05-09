<?php
class produkmasuk{
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
        $sql = "SELECT * FROM produkmasuk";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
        }

        return $data;
    }
    public function simpan() {
            $sql = "insert into produkmasuk values ('','".$_GET['tipe']."','".$_GET['nama']."','".$_GET['harga']."','".$_GET['stok']."')";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            echo "DATA BERHASIL DISIMPAN !";
        }
    public function hapus()
    {
        $sql = "delete from produkmasuk where masuk_id='".$_GET['masuk_id']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIHAPUS !";
    }      
    public function tampil_update()
    {
        $sql = "SELECT * FROM produkmasuk where masuk_id='".$_GET['masuk_id']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function update($id,$tipe,$nama,$harga,$stok)
    {
        $sql = "update produkmasuk set masuk_tipe='".$tipe."',masuk_nama='".$nama."',masuk_harga='".$harga."', masuk_stok='".$stok."' where masuk_id='".$id."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIUPDATE !";
    }   
    public function cari($stok){
        $sql = "SELECT * FROM produkmasuk where masuk_stok LIKE '%".$stok."%'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()){
            $data[] = $rows;
            }
        return $data;
    }
 }