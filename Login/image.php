<!DOCTYPE html>
<html>
<body>
	<center> 
		<?php 
		include 'config.php';
		?>
		<form method="GET">
			<label>PILIH TANGGAL</label>
			<input type="date" name="Date">
			<input type="submit" value="FILTER">
		</form>

		<table border="1">
			<tr>
				<th>No</th>
				<th>Nitrogen</th>
				<th>Date</th>
			</tr>
			<?php 
			$no = 1;

			if(isset($_GET['Date'])){
				$tgl = $_GET['Date'];
				$sql = mysqli_query($config,"SELECT * FROM sensor1 where Date='$tgl'");
			}else{
				$sql = mysqli_query($config,"SELECT * from sensor1");
			}
			
			while($data = mysqli_fetch_array($sql)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['Nitrogen']; ?></td>
				<td><?php echo $data['Date']; ?></td>
			</tr>
			<?php 
			}
			?>
		</table>
	</center>
</body>
</html>