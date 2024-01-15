<?php

function connect(){
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "belajar";

    $conn = mysqli_connect($host, $user, $pass, $db);
    return $conn;
}

function createDB(){
    $conn = connect();
    $query = "CREATE DATABASE belajar";
    $result = mysqli_query($conn, $query);
    return $result;
}

function createTB(){
    $conn = connect();
    $query = "CREATE TABLE mahasiswa(
        id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        nim_mhs VARCHAR(8) NOT NULL,
        nama_mhs VARCHAR(50) NOT NULL,
        email_mhs VARCHAR(100) NOT NULL
    )";
    $result = mysqli_query($conn, $query);
    return $result;
}

function seedmhs(){
    $conn = connect();
    $datamhs =[
        [
            "nama_mhs" => "Firli",
            "nim_mhs" => "23114554",
            "email_mhs" => "firlisanma@gmail.com"
        ],
        [
            "nama_mhs" => "Deviano",
            "nim_mhs" => "23110572",
            "email_mhs" => "devichr@gmail.com"
        ]
    ];
    foreach ($datamhs as $key => $val) {
        $query = "INSERT INTO mahasiswa(nama_mhs,nim_mhs,email_mhs)
        VALUES('$val[nama_mhs]','$val[nim_mhs]','$val[email_mhs]')";
    $result = mysqli_query($conn, $query);
    }
    return $result;
}

function seedstaff(){
    $conn = connect();
    $datastaff =[
        [
            "nama" => "Asep",
            "nip" =>"134567443",
            "email" => "asep@yahoo.com",
        ],
        [
            "nama" => "Ujang",
            "nip" =>"134568641",
            "email" => "ujang@yahoo.com",
        ]
        ];
        foreach ($datastaff as $key => $val) {
        $query ="INSERT INTO staff(nama_staff,nip_staff,email_staff)
        VALUES('$val[nama]','$val[nip]','$val[email]')";
        $result = mysqli_query($conn, $query);
        }
        return $result;
}

function showstaff(){
    $conn = connect();
    $query = "SELECT staff.id AS id , staff.nama_staff AS nama , staff.nip_staff AS ni , staff.email_staff AS email FROM staff   ";
    $result = mysqli_query($conn, $query);
    return $result;
}
function showmhs(){
    $conn = connect();
    $query = "SELECT mahasiswa.id AS id , mahasiswa.nama_mhs AS nama , mahasiswa.nim_mhs AS ni , mahasiswa.email_mhs AS email FROM mahasiswa";
    $result = mysqli_query($conn, $query);
    return $result;
}

function addmhs($nama, $nim, $email){
    $conn = connect();
    $query = "INSERT INTO mahasiswa (nama_mhs,nim_mhs,email_mhs) VALUES('$nama','$nim','$email')";
    $result = mysqli_query($conn, $query);
    return $result;
}
function addstaff($nama, $nim, $email){
    $conn = connect();
    $query = "INSERT INTO staff (nama_staff,nip_staff,email_staff) VALUES('$nama','$nim','$email')";
    $result = mysqli_query($conn, $query);
    return $result;
}
function delete(){
    $conn = connect();
    $table =  $_GET["table"];
    $id = $_GET["id"];
    $query = "DELETE FROM $table WHERE id=$id ";
    $result = mysqli_query($conn, $query);
    return $result;

}

function findstaff(){
    $conn = connect();
    $table =  $_GET["table"];
    $id = $_GET["id"];
    $query = "SELECT staff.id AS id , staff.nama_staff AS nama , staff.nip_staff AS ni , staff.email_staff AS email FROM staff WHERE id=$id  ";
    $result = mysqli_query($conn, $query);
    return $result;
}
function findmhs(){
    $conn = connect();
    $table =  $_GET["table"];
    $id = $_GET["id"];
    $query = "SELECT mahasiswa.id AS id , mahasiswa.nama_mhs AS nama , mahasiswa.nim_mhs AS ni , mahasiswa.email_mhs AS email FROM mahasiswa WHERE id=$id";
    $result = mysqli_query($conn, $query);
    return $result;
}

function update($id,$nama, $nim, $email){
    $conn = connect();
    $table =  $_GET["table"];
    $id = $_GET["id"];
    if ($table == "mahasiswa") {
        $query = "UPDATE $table SET nama_mhs ='$nama',nim_mhs='$nim',email_mhs='$email' WHERE id=$id ";
    }else{
        $query = "UPDATE $table SET nama_staff ='$nama',nip_staff='$nim',email_staff='$email' WHERE id=$id ";   
    }
    $result = mysqli_query($conn, $query);
    return $result;
}
?>