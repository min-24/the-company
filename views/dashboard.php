<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>

    <!--menu-->

    <?php 
    
    session_start();
    include "nav.php";
    
    include "../classes/User.php";

    $u = new User;
    $all_users = $u->readAll();

    ?>

  <div class="container px-5">

      <h2 class="h4 mb-2">User List</h2>

      <table class="table table-hover align-middle">
        <thead class="table-secondary">
          <tr>
            <th>#</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Username</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            <?php while($user = $all_users->fetch_assoc()){ ?>
                <tr>
                  <td><?= $user['id'] ?></td>
                  <td><?= $user['first_name'] ?></td>
                  <td><?= $user['last_name'] ?></td>
                  <td><?= $user['username'] ?></td>
                  <td>
                    <!--buttons-->
                    <!--edit-->
                    <a href="edit.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-outline-warning">
                      <i class="fa-solid fa-pen"></i>
                    </a>

                    <!--delete-->
                    <?php if($user['id'] !=$_SESSION['user_id']){ ?>
                        <form action="" method="post" class="d-inline">
                          <a href="confirm-delete.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-outline-danger ms-1">
                            <i class="fa-solid fa-trash"></i>
                          </a>
                    <?php } ?>
                  </td>
                </tr>
            <?php } ?>

        </tbody>
      </table>
  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>