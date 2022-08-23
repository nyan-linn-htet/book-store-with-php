<?php
    include("confs/config.php");

    $id = $_GET['id'];
    $sql = "Delete FROM categories WHERE id = $id";

    mysqli_query($conn, $sql);

    header("location: cat-list.php");

?>