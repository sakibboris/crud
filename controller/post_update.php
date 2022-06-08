<?php
session_start();
include '../inc/env.php';

if (isset($_POST['submit'])) {
    $_id = $_POST['id'];
    $_post_name = $_POST['post_title'];
    $_post_detail = $_POST['post_detail'];
    $_author_name = $_POST['author_name'];

    if (empty($_post_name)) {
        $_SESSION['error_name'] = "Please input post title";
        header("Location: ../post_edit.php");
    }

    if (empty($_post_detail)) {
        $_SESSION['error_detail'] = "Please input post Detail";
        header("Location: ../post_edit.php");
    }

    if (empty($_author_name)) {
        $_SESSION['error_author'] = "Please input Author Name";
        header("Location: ../post_edit.php");
    } else {
        date_default_timezone_set('Asia/Dhaka');
        $_formate_date =  date('D dS M Y');
        $update = "UPDATE posts SET post_title='$_post_name',post_detail='$_post_detail',author_name='$_author_name',update_time='$_formate_date' WHERE id = $_id";
        $query = mysqli_query($conn, $update);
        if ($query) {
            $_SESSION['success_message'] = "Data Updated successfully";
            header("Location: ../all_post.php");
        } else {
            $_SESSION['success_message'] = "Data is not Updated";
            header("Location: ../all_post.php");
        }
    }
} else {
    echo "please write something";
}
