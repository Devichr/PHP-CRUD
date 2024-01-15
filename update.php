<html>
<head>
	<title>Update Users</title>
	<link rel="stylesheet" href="style.css">
</head>
 
<body>
	
	
	<?php
    include __DIR__ .'/./functions/function.php';
	
    $connect = connect();
	
	$status = "mahasiswa";
	if (isset($_GET['table'])) {
		$table = $_GET['table'];
		if ($table == "mahasiswa") {
			$find = findmhs();
			$status = "mahasiswa";
		}else{
			$find = findstaff();
			$status = "staff";
		}
	}
	while ($data = mysqli_fetch_assoc($find)) {
		?>
	<div class="form-container">
		<div class="wrap-form">
			<a href="index.php">Go to Home</a>
	<form class="form-master" name="add" method="post" action="update.php?table=<?php echo $status ?>&amp;id=<?php echo $_GET['id'] ?>">
			<h2>
					<center>Silahkan Ubah Data</center>
			</h2>
		Nama
		<input type="text" name="nama" value="<?php echo $data['nama'] ?>" ><br>
		Nomor Induk
		<input type="text" name="nim" value="<?php echo $data['ni'] ?>"><br>
		Email
		<input type="text" name="email" value="<?php echo $data['email'] ?>"><br>
		<input type="hidden" name="table" value="<?php echo $_GET['id'] ?>">
		<input type="hidden" name="table" value="<?php echo $_GET['table'] ?>">
		<input type="submit" name="update" value="Update Data">
	</form>
		</div>
	</div>

<?php
	 }
		if(isset($_POST['update'])) {
		$id = $_POST['id'];
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $email = $_POST['email'];
		$table = $_POST['table'];

			$update = update($id,$nama, $nim, $email);
		header("location:index.php?table=$table");
	}
?>
</body>
</html>