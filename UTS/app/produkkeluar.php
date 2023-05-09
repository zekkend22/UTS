<?php
class produkkeluar{
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
        $sql = "SELECT * FROM produkkeluar";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
        }

        return $data;
    }
    public function simpan() {
            $sql = "insert into produkkeluar values ('','".$_GET['tipe']."','".$_GET['nama']."','".$_GET['harga']."','".$_GET['stok']."')";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            echo "DATA BERHASIL DISIMPAN !";
        }
    public function hapus()
    {
        $sql = "delete from produkkeluar where keluar_id='".$_GET['keluar_id']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIHAPUS !";
    }      
    public function tampil_update()
    {
        $sql = "SELECT * FROM produkkeluar where keluar_id='".$_GET['keluar_id']."'";
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
        $sql = "update produkkeluar set keluar_tipe='".$tipe."',keluar_nama='".$nama."',keluar_harga='".$harga."', keluar_stok='".$stok."' where keluar_id='".$id."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIUPDATE !";
    }   
    public function cari($stok){
        $sql = "SELECT * FROM produkkeluar where keluar_stok LIKE '%".$stok."%'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()){
            $data[] = $rows;
            }
        return $data;
    }
 }