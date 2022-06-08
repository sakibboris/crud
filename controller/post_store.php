<?php
session_start();
include '../inc/env.php';

if (isset($_POST['submit'])) {
    $_post_name = $_POST['post_title'];
    $_post_detail = $_POST['post_detail'];
    $_author_name = $_POST['author_name'];
    $_post_date = $_POST['post_date'];

    if (empty($_post_name)) {
        $_SESSION['error_name'] = "Please input post title";
        header("Location: ../home.php");
    }

    if (empty($_post_detail)) {
        $_SESSION['error_detail'] = "Please input post Detail";
        header("Location: ../home.php");
    }

    if (empty($_author_name)) {
        $_SESSION['error_author'] = "Please input Author Name";
        header("Location: ../home.php");
    }

    if (empty($_post_date)) {
        $_SESSION['error_date'] = "Please input Date";
        header("Location: ../home.php");
    } else {
        $_string_to_date = strtotime($_post_date);
        date_default_timezone_set('Asia/Dhaka');
        $_formate_date =  date('D dS M Y',$_string_to_date);

        $insert = "INSERT INTO posts(post_title, post_detail, post_date, author_name) VALUES('$_post_name','$_post_detail','$_formate_date','$_author_name')";
        $query = mysqli_query($conn, $insert);
        if ($query) {
            $_SESSION['success_message'] = "Data Inserted successfully";
            header("Location: ../home.php");
        } else {
            $_SESSION['success_message'] = "Data is not Inserted";
            header("Location: ../home.php");
        }
    }
} else {
    echo "please write something";
}
