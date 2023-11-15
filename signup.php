<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portfolio Website - Login</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
  </head>
  <body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-25 m-auto">
    <a href="home.php?page=0&search=">Home</a>  
    <form action="" method="post">
        <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
        <div class="form-floating">
          <input
            type="email"
            class="form-control"
            id="floatingInput"
            placeholder="name@example.com"
            maxlength="255"
            name="email"
            required
          />
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
          <input
            
            class="form-control"
            id="floatingPassword"
            placeholder="Password"
            maxlength="32"
            name="password"
            required
          />
          <label for="floatingPassword">Password</label>
        </div>
        <button class="btn btn-primary w-100 py-2" name="submit" type="submit">
          Sign Up
        </button>
      </form>
    <?php
        include_once "connect.php";
        $email = $_POST["email"];
        $password = password_hash($_POST["password"],PASSWORD_DEFAULT);
        if (isset($_POST["submit"])){
            $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
            $conn->exec($sql);
        }
    ?>
    </main>
    <script
      src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>



