<?php

include "koneksi.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

    <div class="container">
        <h2 class="title">Things To Do</h2>
        <div class="todo">
            <div class="add-box">
                <form action="" method="post">
                <input type="text" placeholder="Write Here" id="input" name="nama">
                <button class="btn btn-add" type="submit" name="submit">+</button>
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Task</th>
                        <th scope="col">Action</th>
                    </tr>
                    <?php
                    $no = 1;
                    $tambah = mysqli_query($conn, "SELECT * FROM todolist");
                    while( $row = mysqli_fetch_array($tambah) ) {
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row["task"]; ?></td>
                        <td><a href="hapus.php?id=<?php echo $row['id']; ?>"><img src="delete.png" width="20px"></td>
                    </tr>
                <?php } ?>
                </thead>
                </table>
            </form>
            </div>
        </div>
    </div>
    <?php

if(isset($_POST["submit"])) {

    $nama = $_POST["nama"];

    $tambah = mysqli_query($conn,"INSERT INTO todolist VALUES(
                        null,
                        '".$nama."' )"); 

    if($tambah) {
        header("location: index.php");
    } else {
        echo "gagal" .mysqli_error($conn);
    }
}
    

?>
    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>