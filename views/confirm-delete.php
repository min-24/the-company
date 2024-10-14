<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Confirm Delete</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>

    <?php

    include "../classes/User.php";

    $u = new User;
    $user = $u->getUser($_GET['id']);

    ?>

    <div class="container text-center mt-5">
        <i class="fa-solid fa-triangle-exclamation text-warning"></i>
        <h1 class="h4 text-danger mt-3 mb-4">DELETE USER</h1>

        <p>Are you sure you want to delete user <strong><?= $user['username'] ?></strong></p>

        <a href="dashboard.php" class="btn btn-secondary me-3">Cancel</a>

        <form action="../actions/delete-user.php?id=<?= $user['id'] ?>" method="post" class="d-inline">
            <button type="submit" class="btn btn-outline-danger">Delete</button>
        </form>
    </div>


   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>