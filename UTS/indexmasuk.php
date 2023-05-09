<?php

require_once "app/produkmasuk.php";
$produkmasuk = new produkmasuk();
$rows = $produkmasuk->tampil();
if(isset($_GET['simpan'])) $vsimpan =$_GET['simpan'];
else $vsimpan ='';
if(isset($_GET['update'])) $vupdate =$_GET['update'];
else $vupdate ='';
if(isset($_GET['reset'])) $vreset =$_GET['reset'];
else $vreset ='';
if(isset($_GET["cari"])){
    $rows = $produkmasuk->cari($_GET["stok"]);
}
if(isset($_GET['aksi'])) $vaksi =$_GET['aksi'];
else $vaksi ='';
if(isset($_GET['id'])) $vid =$_GET['id'];
else $vid ='';
if(isset($_GET['nama'])) $vnama =$_GET['nama'];
else $vnama ='';
if(isset($_GET['tipe'])) $vtipe =$_GET['tipe'];
else $vtipe ='';
if(isset($_GET['harga'])) $vharga =$_GET['harga'];
else $vharga ='';
if(isset($_GET['stok'])) $vstok =$_GET['stok'];
else $vstok ='';

if($vsimpan=='simpan' && ($vid <>''||$vtipe <>''||$vnama <>''||$vharga <>''||$vstok <>'')){
    $produkmasuk->simpan();
    $rows = $produkmasuk->tampil();
    $vid ='';   
    $vtipe='';
    $vnama ='';
    $vharga ='';
    $vstok ='';
}

if($vaksi=="hapus")  {
    $produkmasuk->hapus();
    $rows = $produkmasuk->tampil();
}

 if($vaksi=="lihat_update")  {
    $urows = $produkmasuk->tampil_update();
    foreach ($urows as $row) {
        $vid = $row['masuk_id'];
        $vtipe = $row['masuk_tipe'];
        $vnama = $row['masuk_nama'];
        $vharga = $row['masuk_harga'];
        $vstok = $row['masuk_stok'];
    }
 }

if ($vupdate=="update"){
    $produkmasuk->update($vid,$vtipe,$vnama,$vharga,$vstok);
    $rows = $produkmasuk->tampil();
    $vid ='';
    $vtipe ='';
    $vnama ='';
    $vharga ='';
    $vstok ='';
}
if ($vreset=="reset"){
    $vid ='';
    $vtipe='';
    $vnama ='';
    $vharga ='';
    $vstok ='';
}
if($vaksi=="cari"){
    $rows = $produkmasuk->cari();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Produk masuk</title>
    <link rel="stylesheet" href="style2.css">
</head>
<form action="?" method="get">
<table>
    <tr><input type="hidden" name="id" value="<?php echo $vid; ?>" />
    <td>TIPE</td><td>:</td><td>    
        <input type="text" name="tipe" value="<?php echo $vtipe; ?>"/></td></tr>
         <tr><td>NAMA</td><td>:</td><td>
        <input type="text" name="nama" value="<?php echo $vnama; ?>" /></td></tr>
    <tr><td>HARGA</td><td>:</td><td>
        <input type="text" name="harga" value="<?php echo $vharga; ?>"/></td></tr>
    <tr><td>STOK</td><td>:</td><td>
        <input type="text" name="stok" value="<?php echo $vstok; ?>"/></td></tr>
    <tr><td></td><td></td><td>
        <input type="submit" name='simpan' value="simpan"/>
    <input type="submit" name='update' value="update"/> 
    <input type="submit" name='reset' value="reset"/>
    <input type="submit" name='cari' value="cari"/>
</td></tr>
</table>
</form>
<body>
    <table border="1px" class="indexmasuk">
    <tr>
        <td>NO</td>
        <td>TIPE</td>
        <td>NAMA</td>
        <td>HARGA</td>
        <td>STOK</td>
        <td>AKSI</td>
    </tr>

    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['masuk_id']; ?></td>
            <td><?php echo $row['masuk_tipe']?></td>
            <td><?php echo $row['masuk_nama']; ?></td>
            <td><?php echo $row['masuk_harga']; ?></td>
            <td><?php echo $row['masuk_stok']; ?></td>
            <td><a href="?masuk_id=<?php echo $row['masuk_id']; ?>&aksi=hapus">Hapus</a>&nbsp;&nbsp;&nbsp;
                <a href="?masuk_id=<?php echo $row['masuk_id']; ?>&aksi=lihat_update">Update</a>
                <a href="index.php">Iventory</a></td>

        </tr>
    <?php } ?>
 </table>	
</body>
</html>