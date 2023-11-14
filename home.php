<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portfolio Website - Overzichtspagina</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <?php 
    include_once "connect.php";
    if (isset($_POST["search"])){
    $stmt = $conn->prepare("SELECT * FROM projects WHERE project_name LIKE '%" .
    $_POST["search"]."%'" . 
    " OR discription_short LIKE '%".$_POST["search"]."%'" . 
    " OR discription_long LIKE '%".$_POST["search"]."%'" . 
    " OR timeframe LIKE '%".$_POST["search"]."%'". 
    " OR class LIKE '%".$_POST["search"]."%'" . 
    " ORDER BY timeframe DESC " .
    " LIMIT 2 OFFSET ". $_GET["page"]);
    } else {
    $stmt = $conn->prepare("SELECT * FROM projects LIMIT 2 OFFSET ". $_GET["page"]);
    }
    $stmt->execute();
    $projects = $stmt->fetchAll();
   
    ?>
    <main>
      <a href="login.php">login</a>
      <br>
      <a href="signup.php">sign up</a>
      <?php
      session_start();
      if (isset($_SESSION["logged"])){
        echo "logged in as: " . $_SESSION["email"] . "<br>";
      }
      ?>
      <div class="container">
        <div class="d-flex justify-content-center align-items-center m-4">
          <nav aria-label="search and filter">
            <form action="" method="post">
              <input type="search" name="search" class="form-control ds-input" id="search-input" placeholder="Search..." aria-label="Search for..." autocomplete="off" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0" dir="auto" style="position: relative; vertical-align: top;">
            </form>
          </nav>
        </div>
              <?php 
              foreach ($projects as $project){
                echo "<div class='row row-cols-1 row-cols-sm-1 row-cols-md-1 g-1 projects'>";
                echo "<div id='project1' class='project card shadow-sm card-body m-2'>";
                echo "<div class='card-text'>";
                echo "<h2>";
                echo $project["project_name"];
                echo "</h2><h4>";
                echo $project["discription_short"];
                echo "<br></h4>";
                echo "</div>";
              ?>
            <div class="d-flex justify-content-between align-items-center mt-3">
              <div class="btn-group">
                <?php 
                echo "<button type='button' onclick=\"location.href='detail.php?id=" . $project["id"] . "'\" class='btn btn-sm btn-outline-secondary'>";
                ?>
                  View
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary">
                  Edit
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary">
                  Deletes
                </button>
              </div>
            </div>
          </div>
          <?php 
            echo "</div>";
              }
          ?>
          
        

        <div class="d-flex justify-content-center align-items-center m-4">
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item"><a class="page-link" href="home.php?page=0">1</a></li>
              <li class="page-item"><a class="page-link" href="home.php?page=2">2</a></li>
              <li class="page-item"><a class="page-link" href="home.php?page=4">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav>
        </div>

      </div>
    </main>
    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"
  ></script>
  </body>
</html>
