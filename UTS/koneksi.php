<?php
require_once "produk.php";
class baru extends koneksi {
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
}
?>