<?php

include("view/TampilMahasiswa.php");

$tp = new TampilMahasiswa();

if (isset($_GET['add'])) {
    $tp->directAdd();
} elseif (isset($_POST['nim'])) {
    if (!empty($_POST['id'])) {
        $tp->editAtDB($_POST);
    } else {
        $tp->addToDB($_POST);
    }
} elseif (!empty($_GET['id']) && !isset($_GET['delete'])) {
    $tp->directEdit($_GET['id']);
} elseif (!empty($_GET['id']) && isset($_GET['delete'])) {
    $tp->deleteAtDB($_GET['id']);
} else {
    if (isset($_GET['status']) && $_GET['status'] == 'success') {
        echo "<script>alert('Data berhasil ditambahkan!');</script>";
    }    
    $tp->tampil();
}