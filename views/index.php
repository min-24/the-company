<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>

    <div class="container p-5">
        <form action="../actions/login.php" method="post" class="w-50 mx-auto border rounded-3 p-4">
            <h1 class="display-6 text-center text-uppercase mb-3">Login</h1>

            <input type="text" name="username" placeholder="USERNAME" class="form-control mb-3">

            <input type="password" name="password" placeholder="PASSWORD" class="form-control mb-3">

            <button type="submit" class="btn btn-primary w-100 mb-3">Log in</button>

            <div class="text-center">
                <a href="register.php" class="text-decoration-none">Create account</a>
            </div>
        </form>
    </div>

 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>