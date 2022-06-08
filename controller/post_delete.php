<?php
$_id = $_GET['id'];
include '../inc/env.php';
$delete = "DELETE FROM posts WHERE id = $_id";
$query = mysqli_query($conn, $delete);
header("Location: ../all_post.php");
