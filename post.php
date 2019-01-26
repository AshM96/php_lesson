<?php
include('layout/header.php');
include('config/config.php');
session_start();
$us_id = $_SESSION['user_id'];
$select = "SELECT * FROM `post` WHERE `user_id`='$us_id'";
$query = mysqli_query($connect,$select);

?>

    <form  method="post" action="postProcess.php" id="postUpload" enctype="multipart/form-data" >
        <div class="form-group">
            <label for="usr">Title:</label>
            <input type="text" class="form-control" id="usr" name="post_title">
            <div class="form-group">
                <label for="comment">Content:</label>
                <textarea class="form-control" rows="5" id="comment" name="post_text"></textarea>
            </div>
            <input type="file" name="image_file" id="post_file" multiple>
            <input type="submit" value="POST" id="subPost" class="btn btn-primary" name="submit">
    </form>


    <!--<div id="postText"></div>
    <div id="postImg"></div>-->
<div id="div">

        <?php while ($r=mysqli_fetch_assoc($query)){?>
    <div class="row information">
        <div class="col-sm-3 ">
            <div class="post-img text-center">
                <img src="postImg/<?php echo $r['post_img']; ?>" alt="">
            </div>
        </div>
        <div class="col-sm-9" style="margin-bottom: 15px">
                <div class="title">
                    <?php echo $r['post_title']; ?>
                </div>
                <div class="posttext">
                    <?php echo $r['post_text']; ?>
                </div>

            </div>
        <form class="deletepost" action="deletePost.php" method="post" id="a<?php echo $r['id']; ?>">
            <input type="hidden" name="post_id" value="<?php echo $r['id']; ?>">
            <input type="submit" name="submit" class="btn btn-danger" value="Delete">
        </form>
    </div>
        <?php } ?>

</div>




<?php
include('layout/footer.php');