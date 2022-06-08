<?php
session_start();

if(isset($_POST['submit'])){
    $_post_name = $_POST['post_title'];
    $_post_detail = $_POST['post_detail'];
    $_author_name = $_POST['author_name'];
    $_post_date = $_POST['post_date'];

    if(empty($_post_name)){
        $_SESSION['error_name'] = "Please input post title";
        header("Location: ../home.php");
    }

    if(empty($_post_detail)){
        $_SESSION['error_detail'] = "Please input post Detail";
        header("Location: ../home.php");
    }

    if(empty($_author_name)){
        $_SESSION['error_author'] = "Please input Author Name";
        header("Location: ../home.php");
    }

    if(empty($_post_date)){
        $_SESSION['error_date'] = "Please input Date";
        header("Location: ../home.php");
    }

    else{
        echo '<pre>';
        print_r($_POST);
        echo '<pre>';
    }
}
else{
    echo "please write something";
}