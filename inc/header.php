<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <title>User Management</title>
  </head>
  <body>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                            <?php
                                if(isset($_SESSION['auth'])):
                            ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="all_user.php">All User</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php 
                                        if($_SESSION['auth']['image']){
                                    ?>
                                        <img class="rounded-circle" src="profile/<?=$_SESSION['auth']['image']?>"alt="<?=$_SESSION['auth']['name']?>" width="40">
                                    <?php
                                        }else{
                                            echo $_SESSION['auth']['name'];
                                        }
                                    ?>
                                </a>
                                <ul class="dropdown-menu" style="left:auto;right:0">
                                    <a class="dropdown-item" aria-current="page"><?=$_SESSION['auth']['name']?></a>
                                    <a class="dropdown-item" aria-current="page"><?=$_SESSION['auth']['email']?></a>
                                    <a class="dropdown-item" aria-current="page" href="logout.php">Logout</a>
                                </ul>
                            </li>
                            <?php
                                endif;
                                if(!isset($_SESSION['auth'])):
                            ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="signup.php">Signup</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="login.php">Login</a>
                            </li>
                            <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>


    <body>
</html>