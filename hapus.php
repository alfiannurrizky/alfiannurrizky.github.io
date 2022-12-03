<?php

include "koneksi.php";

$id = $_GET["id"];

    $delete = mysqli_query($conn, "DELETE FROM todolist WHERE id = '$id' ");
    header("location: index.php");
    


?>