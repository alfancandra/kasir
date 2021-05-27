<?php 
	require '../config.php';
	session_start();
	$id_kasir=$_SESSION["id_kasir"];
	$nama=$_SESSION["nama"];
	$idprint = $_GET['kasir'];
	$koneksi = mysqli_connect("localhost","root","","db_toko");
	$nama_pelanggan = mysqli_query($koneksi,"SELECT nama_pelanggan FROM nota_backup WHERE id_nota='".$idprint."';");
	$bayar = mysqli_query($koneksi,"SELECT bayar FROM nota_backup WHERE id_nota='".$idprint."';");
	$total = mysqli_query($koneksi,"SELECT total FROM nota_backup WHERE id_nota='".$idprint."';");
	$kodenota = mysqli_query($koneksi,"SELECT id_nota FROM nota_backup WHERE id_nota='".$idprint."';");
	$tanggal_input = mysqli_query($koneksi,"SELECT tanggal_input FROM nota_backup WHERE nota_backup.id_nota='".$idprint."';");
	$sql = mysqli_query($koneksi,"SELECT nota_backup.*,barang.*,kasir.* FROM nota_backup INNER JOIN
						barang ON nota_backup.id_barang = barang.id_barang INNER JOIN kasir ON nota_backup.id_kasir = kasir.id_kasir
						WHERE nota_backup.id_nota= '".$idprint."';");

	
	$hsl = $sql;
	$row = mysqli_fetch_array($nama_pelanggan);
	$row2 = mysqli_fetch_array($kodenota);
	$row3 = mysqli_fetch_array($bayar);
	$row4 = mysqli_fetch_array($total);
	$row5 = mysqli_fetch_array($tanggal_input);
	$hitung = $row3[0] - $row4[0];
?>
<html>
	<head>
		<title>print</title>
		<link rel="stylesheet" href="../assets/css/bootstrap.css">
	</head>
	<body>
		<script>window.print();</script>
		<div class="container">
			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<center><b>
						<br>
						<p>KARUNIA PLASTIK</p>
						<p>Jl. Purwokerto</p>
						<hr>
						<p><?php echo $row5[0];?></p>
						<p>Kasir : <?php  echo $nama;?></p>
						<p>Pelanggan : <?php echo $row[0];?></p>
						<p>ID NOTA : <?php echo $row2[0];?></p>
						<hr>
					</b>
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
						<br/>
						Bayar : Rp.<?php echo number_format($row3[0]);?>,-
						<br/>
						Kembali : Rp.<?php echo number_format($hitung);?>,-
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
