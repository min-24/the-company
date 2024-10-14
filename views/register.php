<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
        <form action="../actions/register.php" method="post" class="my-5 w-50 mx-auto border reounded-3 p-4">
            <h1 class="display-6 text-uppercase text-center mb-3">Register</h1>

            <label for="first-name" class="form-label">First Name</label>
            <input type="text" name="first_name" id="first-name" class="form-control mb-2">

            <label for="last-name" class="form-label">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control mb-2">

            <label for="username" class="form-label fw-bold">Username</label>
            <input type="text" name="username" id="username" class="form-control mb-2">

            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control mb-4">

            <button type="submit" class="btn btn-success w-100">Register</button>
            <p class="text-center">Registered already?<a href="index.php">Log in</a>.</p>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>