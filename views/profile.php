<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    
  <?php

    session_start();
    include "nav.php";

    include "../classes/User.php";
    $u = new User;
    $user = $u->getUser($_SESSION['user_id']);
  ?>

    <div class="container">
        <form action="../actions/upload-photo.php" method="post" enctype="multipart/form-data">
            <div class="card w-50 mx-auto">
                <div class="card-header">
                    <div class="row">
                        <div class="col-auto">
                            <!--photo-->
                            <?php if($user['photo']){ ?>
                                <img src="../assets/images/<?= $user['photo'] ?>" alt="" class="avatar-img">
                                
                            <?php }else{ ?>
                                <i class="fa-solid fa-user text-secondary avatar-icon"></i>
                           <?php } ?>
                        </div>
                        <div class="col align-self-center">
                            <input type="file" name="photo" class="form-control form-control-sm w-auto" required>
                            <button type="submit" class="btn btn-sm mt-2 btn-outline-secondary">Upload Photo</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h2 class="h3"><?= $_SESSION['full_name'] ?></h2>
                    <h3 class="h5"><?= $_SESSION['username'] ?></h3>
                </div>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>