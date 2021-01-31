<?php
// session_start();
include_once("functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="row">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <div class="text-center"><h3>Фото</h3></div>
        <?php
        echo "<form action='gallery.php' id='photoform' enctype='multipart/form-data' method='POST'>";
        $link = connect();
        echo "<input type='file' name='pictureName[]' multiple accept='image/*'>";
        echo '<button type="submit" name="addphoto" class="btn btn-sm btn-primary">Добавить</button>';
        echo '</form>';
        if (isset($_POST['addphoto'])) {
            // $hotelid = $_POST["hotelid"];
            foreach ($_FILES["pictureName"]["name"] as $k => $v) {
                if ($_FILES["pictureName"]["error"][$k] != 0) {
                    echo "<script>";
                    echo "alert('Ошибка загрузки файла: " . $v . "')";
                    echo "</script>";
                    continue;
                }
                if (move_uploaded_file($_FILES["pictureName"]["tmp_name"][$k], "images/" . $v)) {
                    $size=$_FILES['pictureName']['size'][$k];
                    $ins4 = "INSERT INTO Pictures(pictureName, imagepath, size) VALUES ('".$v."', 'images/".$v."', ".$size.")";
                    mysqli_query($link, $ins4);
                    $err = mysqli_errno($link);
                    if ($err) {
                        echo "<script>";
                        echo "alert('Ошибка загрузки файла2: " . $err . "')";
                        echo "</script>";
                        exit();
                    }
                }
            }
            echo "<script>";
            echo "window.location = document.URL";
            echo "</script>";
        }
        ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>