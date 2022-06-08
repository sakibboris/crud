<?php
session_start();
include './inc/header.php';
include './inc/nav.php';
if (isset($_SESSION['success_message'])) {
?>
    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast show tapopop" data-bs-autohide="false">
        <div class="toast-header">
            <img src="./img/fav_ico.png" class="rounded me-2" alt="fav_icon" style="width: 20px;">
            <strong class="me-auto">CRUD Pro Max</strong>
            <small>
                <?=
                date_default_timezone_set('Asia/Dhaka');
                echo date('D dS M Y h:i:s');
                ?>
            </small>
            <button onClick="window.location.reload();" type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" name="close_toast"></button>
        </div>
        <div class="toast-body">
            <span class="text-success">
                <?= $_SESSION['success_message']; ?>
            </span>
        </div>
    </div>
<?php
}
?>
<div class="container my-4">
    <div class="card text-center border border-success">
        <div class="card-header text-uppercase text-warning bg-success">
            add post page
        </div>
        <div class="card-body">
            <form class="text-uppercase" action="./controller/post_store.php" method="POST">
                <div class="mb-3">
                    <label for="inputTitle">Post title or name here</label>
                    <input type="text" class="form-control my-2" id="inputTitle" placeholder="Please Write Post Title here" name="post_title" value="">

                    <span class="text-danger">
                        <?php
                        if (isset($_SESSION['error_name'])) {
                            echo $_SESSION['error_name'];
                        }
                        ?>
                    </span>
                </div>
                <div class="form-floating my-4">
                    <textarea class="form-control" placeholder="Leave a comment here" id="inputDetail" style="height: 100px" name="post_detail" value=""></textarea>
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
                    <div class="col-md-8 mb-3">
                        <label for="inputAuthor">Author Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend2">@</span>
                            </div>
                            <input type="text" class="form-control" id="inputAuthor" placeholder="Author Name here" aria-describedby="inputGroupPrepend2" name="author_name" value="">
                        </div>
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['error_author'])) {
                                echo $_SESSION['error_author'];
                            }
                            ?>
                        </span>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="inputPicture">Input picture here</label>
                        <input class="form-control" type="date" id="inputPicture" name="post_date">
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['error_date'])) {
                                echo $_SESSION['error_date'];
                            }
                            ?>
                        </span>
                    </div>
                </div>
                <!-- <div class="col-md-4 mb-3">
                            <label for="inputPicture">Input picture here</label>
                            <input class="form-control" type="file" id="inputPicture" name="post_picture">
                        </div> -->
                <div class="my-4">
                    <button class="btn btn-warning text-uppercase" type="submit" name="submit">Submit</button>
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