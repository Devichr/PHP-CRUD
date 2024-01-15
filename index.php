<?php 
include __DIR__ ."/./functions/function.php";

$connect = connect();
$show = showmhs();
$no = 1;
$status = "mahasiswa";
if (isset($_GET['table'])) {
    $table = $_GET['table'];
    if ($table == "mahasiswa") {
        $show = showmhs();
        $status = "mahasiswa";
    }else{
        $show = showstaff();
        $status = "staff";
    }
}

if(isset($_GET["act"])) {
    $act = $_GET["act"];
    if ($act == "del") {
        $del = delete();
        header("location:index.php?table=$table");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <a class="btn" href="index.php?table=mahasiswa">Mahasiswa</a>
    <a class="btn" href="index.php?table=staff">Staff</a>
    <a class="btn" href="add.php?table=<?php echo $status  ?>">Add Data</a>
    <br>
    <div class="container">
        <div class="table-wrap">
    <table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Nomor Induk</th>
        <th>Email</th>
        <th>Opsi</th>
    </tr>
    <?php while ($data = mysqli_fetch_assoc($show)) {?>
    <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $data['nama'] ?></td>
        <td><?php echo $data['ni'] ?></td>
        <td><?php echo $data['email'] ?></td>
        <td>
            <a class="btn btn-yellow" href="update.php?table=<?php echo $status ?>&amp;id=<?php echo $data['id'] ?>">Update</a>
            <a class="btn btn-red"href="index.php?table=<?php echo $status ?>&amp;act=del&amp;id=<?php echo $data['id'] ?>">Delete</a>
        </td>
    </tr>
    <?php
    }
    ?>
    </table>
    </div>
    </div>
</body>
</html>


