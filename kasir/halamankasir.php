<?php	
session_start();
if(!empty($_SESSION['id_kasir'])){
	if(isset($_POST['query'])){
		$db = mysqli_connect("localhost","root","","db_toko");
		$output = '';
		$cari = $_POST['query']
		if($cari == '')
		{

		}else{
			$sql = "select barang.*, kategori.id_kategori, kategori.nama_kategori
					from barang inner join kategori on barang.id_kategori = kategori.id_kategori
					where barang.id_barang like '%$cari%' or barang.nama_barang like '%$cari%' or barang.merk like '%$cari%'";
			$result = mysqli_query($db,$sql);
			$hasil1= $result;
	?>
		<table class="table table-stripped" width="100%" id="example2">
			<tr>
				<th>ID Barang</th>
				<th>Nama Barang</th>
				<th>Merk</th>
				<th>Harga Jual</th>
				<th>Aksi</th>
			</tr>
		<?php foreach($hasil1 as $hasil){?>
			<tr>
				<td><?php echo $hasil['id_barang'];?></td>
				<td><?php echo $hasil['nama_barang'];?></td>
				<td><?php echo $hasil['merk'];?></td>
				<td><?php echo $hasil['harga_jual'];?></td>
				<td>
				<a href="../fungsi/tambah/tambah.php?jual_kasir=jual&id=<?php echo $hasil['id_barang'];?>&id_kasir=<?php echo $_SESSION['admin']['id_member'];?>" 
					class="btn btn-success">
					<i class="fa fa-shopping-cart"></i></a></td>
			</tr>
		<?php }?>
		</table>
<?php	
		}
	}
}
?>