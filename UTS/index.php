<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Data Barang</title>
</head>
<body>

<?php
require_once "app/produk.php";
$produk = new produk();
$rows = $produk->tampil();
if(isset($_GET['simpan'])) $vsimpan =$_GET['simpan'];
else $vsimpan ='';
if(isset($_GET['update'])) $vupdate =$_GET['update'];
else $vupdate ='';
if(isset($_GET['reset'])) $vreset =$_GET['reset'];
else $vreset ='';
if(isset($_GET["cari"])){
    $rows = $produk->cari($_GET["nama"]);
}
if(isset($_GET['aksi'])) $vaksi =$_GET['aksi'];
else $vaksi ='';
if(isset($_GET['id'])) $vid =$_GET['id'];
else $vid ='';
if(isset($_GET['nama'])) $vnama =$_GET['nama'];
else $vnama ='';
if(isset($_GET['tipe'])) $vtipe =$_GET['tipe'];
else $vtipe ='';
if(isset($_GET['stok'])) $vstok =$_GET['stok'];
else $vstok ='';

if($vsimpan=='simpan' && ($vid <>''||$vnama <>''||$vtipe <>''||$vstok <>'')){
    $produk->simpan();
    $rows = $produk->tampil();
    $vid ='';
    $vnama ='';
    $vtipe ='';
    $vstok ='';
}

if($vaksi=="hapus")  {
    $produk->hapus();
    $rows = $produk->tampil();
}

 if($vaksi=="lihat_update")  {
    $urows = $produk->tampil_update();
    foreach ($urows as $row) {
        $vid = $row['produk_id'];
        $vnama = $row['produk_nama'];
        $vtipe = $row['produk_tipe'];
        $vstok = $row['produk_stok'];
    }
 }

if ($vupdate=="update"){
    $produk->update($vid,$vnama,$vtipe,$vstok);
    $rows = $produk->tampil();
    $vid ='';
    $vnama ='';
    $vtipe ='';
    $vstok ='';
}
if ($vreset=="reset"){
    $vid ='';
    $vnama ='';
    $vtipe ='';
    $vstok ='';
}
if($vaksi=="cari"){
    $rows = $produk->cari();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<form action="?" method="get">
<table>
    <tr><td>NAMA</td><td>:</td><td>
        <input type="hidden" name="id" value="<?php echo $vid; ?>" />
        <input type="text" name="nama" value="<?php echo $vnama; ?>" /></td></tr>
    <tr><td>TIPE</td><td>:</td><td>
        <input type="text" name="tipe" value="<?php echo $vtipe; ?>"/></td></tr>
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
    <table border="2px" class="index">
    <tr>
        <td>NO</td>
        <td>NAMA</td>
        <td>TIPE</td>
        <td>STOK</td>
        <td>AKSI</td>
    </tr>

    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['produk_id']; ?></td>
            <td><?php echo $row['produk_nama']; ?></td>
            <td><?php echo $row['produk_tipe']; ?></td>
            <td><?php echo $row['produk_stok']; ?></td>
            <td><a href="?produk_id=<?php echo $row['produk_id']; ?>&aksi=hapus">Hapus</a>&nbsp;&nbsp;&nbsp;
                <a href="?produk_id=<?php echo $row['produk_id']; ?>&aksi=lihat_update">Update</a>&nbsp;&nbsp;&nbsp;
                <a href="indexmasuk.php">Produk Masuk</a>
                <a href="indexkeluar.php">Produk Keluar</a></td>

        </tr>
    <?php } ?>
 </table>	
</body>
</html>