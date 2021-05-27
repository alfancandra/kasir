<?php 
	require '../../../../config.php';
	session_start();
	$id = $_SESSION['admin']['nama'];
	$nama=$_SESSION["nama"];
	$idprint = $_GET['kasir'];
	$koneksi = mysqli_connect("localhost","root","","db_toko");
	$nama_pelanggan = mysqli_query($koneksi,"SELECT nama_pelanggan FROM nota_backup WHERE id_nota='".$idprint."';");
	$sql = mysqli_query($koneksi,"SELECT nota_backup.*,barang.*,kasir.* FROM nota_backup INNER JOIN
						barang ON nota_backup.id_barang = barang.id_barang INNER JOIN kasir ON nota_backup.id_kasir = kasir.id_kasir
						WHERE nota_backup.id_nota= '".$idprint."';");
	$hsl = $sql;
	$row = mysqli_fetch_array($nama_pelanggan);
?>
<html>
	<head>
		<title>print</title>
		<link rel="stylesheet" href="../../../../assets/css/bootstrap.css">
	</head>
	<body>
		<script>window.print();</script>
		<div class="container">
			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<center>
						<p>KARUNIA PLASTIK</p>
						<p>Jl. Purwokerto</p>
						<p>Tanggal : <?php  echo date("j F Y, G:i");?></p>
						<p>Kasir : <?php  echo "admin ".$id;?></p>
						<p>Pelanggan : <?php echo $row[0];?></p>
					</center>
					<table class="table table-bordered" style="width:100%;">
						<tr>
							<td>No.</td>
							<td>Barang</td>
							<td>Jumlah</td>
							<td>Total</td>
						</tr>
						<?php $no=1; foreach($hsl as $isi){?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $isi['nama_barang'];?></td>
							<td><?php echo $isi['jumlah'];?></td>
							<td><?php echo $isi['total'];?></td>
						</tr>
						<?php $no++; 
						}?>
					</table>
					<div class="pull-right">
						<?php
						$totalnya = mysqli_query($koneksi,"SELECT SUM(total) as total FROM nota_backup WHERE id_nota='".$idprint."';");
						$hasil = mysqli_fetch_array($totalnya); ?>
						Total : Rp.<?php echo number_format($hasil[0]);?>,-
					</div>
					<div class="clearfix"></div><br>
					<center>
						<p>Terima Kasih Telah berbelanja di toko kami !</p>
					</center>
				</div>
				<div class="col-sm-4"></div>
			</div>
		</div>
	</body>
</html>