<?php
    include_once "inc/db.php";
    include_once "inc/header.php";
?>


<section class="mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
        <?php 
            if(isset($successmsg)){
        ?>
        <div class="alert alert-success">
            <p><?= $successmsg ?></p>
        </div>
        <?php
            }
            if(isset($errormsg)){
        ?>
        <div class="alert alert-danger">
            <p><?= $errormsg ?></p>
        </div>
        <?php
            }
        ?>
            <div class="card mb-3">
                <div class="card-header">
                    <h2>User Update Form</h2>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="my-2">
                            <input type="text" value="<?=$data['name']?>" name="name" class="form-control" placeholder="User name">
                            <?php 
                                if(isset($errors['nameErr'])){
                                    echo"<p class='text-danger'>" . $errors['nameErr'] . "</P>";
                                }
                                ?>
                        </div>
                        <div class="my-2">
                            <input type="email" value="<?=$data['email']?>" name="email" class="form-control" placeholder="User email">
                            <?php 
                                if(isset($errors['emailErr'])){
                                    echo"<p class='text-danger'>" . $errors['emailErr'] . "</P>";
                                }
                                ?>
                        </div>
                        <div class="my-2">
                            <input type="file" name="photo">
                            <?php 
                                if(isset($errors['imageErr'])){
                                    echo"<p class='text-danger'>" . $errors['imageErr'] . "</P>";
                                }
                                ?>
                                <div class="mt-2">
                                <img src="profile/<?= $data['image'] ?>" alt="" width="60">
                                </div>
                        </div>
                        <div class="my-2">
                            <button type="submit" name="submit" value="Update" class="form-control btn btn-sm btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>


<!-- 
            <h2>User Name: <?php echo $_POST['name']?></h2>
            <h2>User email: <?= $_POST['email'] ?></h2> -->

        </div>
    </div>
</section>

<?php
    include_once "inc/footer.php";
?>
    