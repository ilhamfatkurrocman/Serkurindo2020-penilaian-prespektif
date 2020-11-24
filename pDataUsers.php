<?php
include "Koneksi.php";

if (isset($_POST['insert'])) {
    $i = $_POST['ID_LOGIN'];
    $us = $_POST['USER'];
    $ps = $_POST['PASSWORD'];
    $st = $_POST['STATUS'];

    $sql = "INSERT INTO USER (ID_LOGIN, USER, PASSWORD, STATUS) 
          VALUES ('$i','$us','$ps', '$st')";
    if (empty($i && $us && $ps && $st)) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataUsers.php?failed\">");
    } else {
        mysqli_query($con, $sql);
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataUsers.php?success\">");
    }
}
if (isset($_POST['Update'])) {
    $i = $_POST['ID_LOGIN'];
    $us = $_POST['USER'];
    $ps = $_POST['PASSWORD'];
    $st = $_POST['STATUS'];

    $sql = "UPDATE USER SET USER ='$us', PASSWORD = '$ps', STATUS = '$st'
            WHERE ID_LOGIN = '$i'";
    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataUsers.php?update\">");
    }
} else if (isset($_POST['Delete'])) {
    $i = $_POST['Delete'];
    $sql = "DELETE FROM USER WHERE ID_LOGIN = '$i'";
    $qwr = mysqli_query($con, $sql);
    if ($qwr) {
        echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=mDataUsers.php?hapus\">");
    }
}
