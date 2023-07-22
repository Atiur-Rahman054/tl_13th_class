<?php
    require_once "inc/db.php";
    include_once "inc/header.php";
?>


<section class="mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
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
                    <h2>User login</h2>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                    <div class="my-2">
                            <input type="email" name="email" class="form-control" placeholder="User email">
                            <?php 
                                if(isset($errors['emailErr'])){
                                    echo"<p class='text-danger'>" . $errors['emailErr'] . "</P>";
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
                            <button type="submit" name="submit" value="Login" class="btn form-control btn-sm btn-primary">Login</button>
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
    