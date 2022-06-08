<?php
session_start();
include './inc/env.php';
include './inc/header.php';
include './inc/nav.php';
$show = "SELECT * FROM posts";
$query = mysqli_query($conn, $show);
$fetch = mysqli_fetch_all($query, 1);
?>
<div class="container mt-5 px-2">
    <div class="mb-2 d-flex justify-content-between align-items-center">
        <div class="position-relative"><input class="form-control w-100" placeholder="Search by order#, name..."> </div>
        <div class="px-2"> <span>Filters <i class="fa fa-angle-down"></i></span> <i class="fa fa-ellipsis-h ms-3"></i> </div>
    </div>
    <div class="table-responsive">
        <table class="table table-responsive table-bordered border-danger">
            <thead>
                <tr class="bg-light">
                    <th scope="col">#</th>
                    <th scope="col">Author Name</th>
                    <th scope="col">Post Title</th>
                    <th scope="col">Post Detail</th>
                    <th scope="col">Date</th>
                    <th scope="col" class="text-end"><span>Action</span></th>
                </tr>
            </thead>
            <?php
            foreach ($fetch as $key => $data) {
            ?>
                <tbody>
                    <tr>
                        <td><?= ++$key ?></td>
                        <td><?= $data['author_name'] ?></td>
                        <td>
                            <?= $data['post_title']; ?>
                        </td>
                        <td>
                            <?php
                            if (strlen($data['post_detail']) >= 35) {
                                echo substr($data['post_detail'], 0, 35);
                                echo '  <a class="btn btn-primary btn-sm" href="#" type="button">More</a>';
                            } else {
                                echo $data['post_detail'];
                            }
                            ?>
                        </td>
                        <td><?= $data['post_date'] ?></td>
                        <td class="text-end">
                            <i class="fas fa-caret-right"></i>
                            <a class=" text-primary text-uppercase" aria-current="page" href="./controller/post_view.php?id=<?= $data['id']?>" style="text-decoration: none;"><i class="far fa-eye"></i></a>
                            <i class="fas fa-angle-right"></i>
                            <a class=" text-success text-uppercase" aria-current="page" href="./post_edit.php?id=<?= $data['id']?>" style="text-decoration: none;"><i class="far fa-edit"></i></a>
                            <i class="fas fa-angle-left"></i>
                            <a class=" text-danger text-uppercase" aria-current="page" href="./controller/post_delete.php?id=<?= $data['id']?>" style="text-decoration: none;"><i class="far fa-trash-alt"></i></a>
                            <i class="fas fa-caret-left"></i>
                        </td>
                    </tr>
                <?php
            }
                ?>
                </tbody>
        </table>
    </div>
</div>

<?php
include './inc/footer.php';
session_unset();
?>