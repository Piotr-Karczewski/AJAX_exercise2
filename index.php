<?php
    include 'dbh.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script>
        $(document).ready(function(){
            var commentCount = 2;
            $("button").click(function() {
                commentCount = commentCount+2;
                $("#comments").load("load-comments.php", {
                    commentNewCount: commentCount
                });
            });
        });
    </script>
</head>
<body>

<div id="comments">
    <?php
        $sql = "SELECT * FROM comments LIMIT 2";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                echo "<p>";
                echo $row['author'];
                echo "<br>";
                echo $row['message'];
                echo "</br>";
            }
        }else{
            echo "There are no comments!";
        }
    ?>
</div>

<button>Show more comments</button>
    
</body>
</html>