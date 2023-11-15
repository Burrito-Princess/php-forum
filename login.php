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
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
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
          Sign in
        </button>
      </form>
      <?php
      include_once "connect.php";
      if (isset($_POST["submit"])) {
        $email = $_POST["email"];
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = '$email'");
        $stmt->execute();
        $user = $stmt->fetch();
        $password = password_verify($_POST["password"], $user["password"]);
        if ($user["password"] == $password) {
          session_start();
          echo "success!";
          $_SESSION["logged"] = true;
          $_SESSION["email"] = $user["email"];
          header("Location:home.php?page=0&search=");
        } else {
          echo "wrong password";
        }
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



