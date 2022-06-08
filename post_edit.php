<?php
session_start();
include './inc/env.php';
$_id = $_GET['id'];
include './inc/header.php';
include './inc/nav.php';
$edit = "SELECT * FROM posts WHERE id = $_id";
$query = mysqli_query($conn, $edit);
$fetch = mysqli_fetch_assoc($query);
?>
<div class="container my-4">
    <div class="card text-center border border-success">
        <div class="card-header text-uppercase text-warning bg-success">
            edit post page
        </div>
        <div class="card-body">
            <form class="text-uppercase" action="./controller/post_update.php" method="POST">
                <input type="hidden" name="id" value="<?=$_id?>">
                <div class="mb-3">
                    <label for="inputTitle">Post title or name here</label>
                    <input type="text" class="form-control my-2" id="inputTitle" placeholder="Please Write Post Title here" name="post_title" value="<?= $fetch['post_title'] ?>">
                    <span class="text-danger">
                        <?php
                        if (isset($_SESSION['error_name'])) {
                            echo $_SESSION['error_name'];
                        }
                        ?>
                    </span>
                </div>
                <div class="form-floating my-4">
                    <textarea class="form-control" placeholder="Leave a comment here" id="inputDetail" style="height: 100px" name="post_detail" value=""><?= $fetch['post_detail']?></textarea>
                    <span class="text-danger">
                        <?php
                        if (isset($_SESSION['error_detail'])) {
                            echo $_SESSION['error_detail'];
                        }
                        ?>
                    </span>
                    <label for="inputDetail">Post Details</label>
                </div>
                <div class="row">
                    <label for="inputAuthor">Author Name</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend2">@</span>
                        </div>
                        <input type="text" class="form-control" id="inputAuthor" placeholder="Author Name here" aria-describedby="inputGroupPrepend2" name="author_name" value="<?= $fetch['author_name']?>">
                    </div>
                    <span class="text-danger">
                        <?php
                        if (isset($_SESSION['error_author'])) {
                            echo $_SESSION['error_author'];
                        }
                        ?>
                    </span>
                </div>
                <div class="my-4">
                    <button class="btn btn-warning text-uppercase" type="submit" name="submit">update post</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-uppercase text-warning bg-success">
            upload time here with date
        </div>
    </div>
</div>
<?php
include './inc/footer.php';
session_unset();
?>