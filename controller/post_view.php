<?php
$_id = $_GET['id'];
include '../inc/env.php';
include '../inc/header.php';
include '../inc/nav.php';
$show = "SELECT * FROM posts WHERE id = $_id";
$query = mysqli_query($conn, $show);
$fetch = mysqli_fetch_assoc($query);
?>



<div class="container mt-5 px-2">
    <div class="card text-center">
        <div class="card-header">
            <span class="text-success text-uppercase">Published by :> </span>
            <?= $fetch['author_name'] ?>
        </div>
        <div class="card-body">
            <h5 class="card-title"><?= $fetch['post_title']; ?></h5>
            <p class="card-text">
                <?= $fetch['post_detail']; ?>
            </p>
        </div>
        <div class="card-footer text-muted">
            <?= $fetch['post_date']; ?>
        </div>
    </div>
</div>
<?php
include '../inc/footer.php';
?>