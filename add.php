<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add!</title>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['logged'])) {
        header('Location: login.php');
        exit;
    }
    include_once 'connect.php';
    ?>
    <form action="add.php" method="post">
        <input type="text" name="user" value="<?php echo $_SESSION["email"];?>" placeholder="<?php echo $_SESSION["email"]?>"><br>
        <input type="text" name="name" placeholder="project name"><br>
        <textarea type="" name="short_description" placeholder="short project description"></textarea><br>
        <textarea type="text" name="long_description" placeholder="long project description"></textarea><br>
        <input type="text" name="timeframe" placeholder="timeframe"><br>
        <div id="language_div">
            <input type="text" class="language" name="class[]" placeholder="language">
        </div>
        <input type="text" name="type" placeholder="project type"><br>
        <input type="text" name="github" placeholder="github link"><br>
        <input type="text" name="url" placeholder="project url"><br>
        <input type="text" name="difficulty" placeholder="difficulty"><br>
        <button type="submit" name="submit">submit</button>
    </form>
    <button onclick="add_language()">+add language</button>
    
    <?php
        if (isset($_POST["submit"])){
            $project_name = $_POST["name"];
            $timeframe = $_POST["timeframe"];
            $type = $_POST["type"];
            $discription_short = $_POST["short_description"];
            $discription_long = $_POST["long_description"];
            $github_link = $_POST["github"];
            $url = $_POST["url"];
            $level = $_POST["difficulty"];
            $added_by = $_POST["user"];
            $class = json_encode($_POST["class"]);
            try {
            $sql = "INSERT INTO projects (project_name, class, timeframe, type, discription_short, discription_long, github_link, url, level, added_by) 
            VALUES ('$project_name', '$class', '$timeframe', '$type', '$discription_short', '$discription_long', '$github_link', '$url', '$level', '$added_by')";
            $conn->exec($sql);
            } catch(PDOException $e) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
        }
    ?>
</body>
<script>
    let language_count = 0;
    function add_language() {
        let language_div = document.getElementById("language_div");
        let input = document.createElement("input");
        language_count++;
        input.type = "text";
        input.name = "class[]";
        input.class = "language";
        input.placeholder = "language";
        language_div.appendChild(input);
        getElementsByClassName("language");
    }
</script>
</html>