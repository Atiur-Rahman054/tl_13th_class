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
                    <h2>User input form</h2>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="my-2">
                            <input type="text" name="name" class="form-control" placeholder="User name">
                            <?php 
                                if(isset($errors['nameErr'])){
                                    echo"<p class='text-danger'>" . $errors['nameErr'] . "</P>";
                                }
                                ?>
                        </div>
                        <div class="my-2">
                            <input type="pasword" name="password" class="form-control" placeholder="User password">
                            <?php 
                                if(isset($errors['passErr'])){
                                    echo"<p class='text-danger'>" . $errors['passErr'] . "</P>";
                                }
                                ?>
                        </div>
                        <div class="my-2">
                            <input type="email" name="email" class="form-control" placeholder="User email">
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
                        </div>
                        <div class="my-2">
                            <button type="submit" name="submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</section>

<?php
    include_once "inc/footer.php";
?>
    