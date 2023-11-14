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
    try{
    $stmt = $conn->prepare("SELECT * FROM projects WHERE id = ". $_GET['id']);
    $stmt->execute();
    $projects = $stmt->fetchAll();
    
    } catch (PDOException $e){
      echo "Error: " . $e->getMessage();
    }
  ?>
    <main>
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 g-1 projects">
          <div id="project1" class="project card shadow-sm card-body m-2">
            <div class="card-text">
              <?php 
              echo "<h2>";
              foreach ($projects as $project){
                echo $project["project_name"];
                echo "</h2><div>";
                echo $project["discription_long"];
                echo "</div><div>";
                echo "<strong>type: </strong>".$project["type"];
                echo "</div><div>";
                echo "<strong>Languages: </strong><br>";
                $arr  = json_decode($project["class"], true);
                for ($x = 0; $x < count($arr["languages"]); $x++){
                  echo "- " . ($arr["languages"][$x]) . "<br>";
                }
                echo "<strong>made in: </strong>" . $project["timeframe"];
              } 
              ?>
            </div>
          </div>
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
