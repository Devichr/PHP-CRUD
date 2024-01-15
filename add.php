<html>
<head>
	<title>Add Users</title>
	<link rel="stylesheet" href="style.css">
</head>
 
<body>

 
	<div class="form-container">
		<div class="wrap-form">
			<a href="index.php">Go to Home</a>
			<form class="form-master" name="add" method="post" action="add.php?table=staff">
				<h2>
					<center>Silahkan Masukan Data</center>
				</h2>
				Nama
				<input type="text" name="nama"><br>
				Nomor Induk
				<input type="text" name="nim"><br>
				Email
				<input type="text" name="email"><br>
				<input type="hidden" name="table" value="<?php echo $_GET['table'] ?>">
				<input type="submit" name="add" value="Add Data">
			</form>
		</div>
	</div>
	<?php
    include __DIR__ .'/./functions/function.php';

    $connect = connect();
	if(isset($_POST['add'])) {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $email = $_POST['email'];
		$table = $_POST['table'];
		if ($table == "mahasiswa") {
			$add = addmhs($nama, $nim, $email);
		}else{
			$add = addstaff($nama, $nim, $email);
		}
		header("location:index.php?table=$table");
	}



	?>
</body>
</html>