<?
include_once("functions.php");
$link = connect();

$qu = "CREATE TABLE Users (
    id int not null primary KEY AUTO_INCREMENT, 
    login varchar(30) UNIQUE, 
    pass varchar(128), 
    email varchar(64)
) default charset='utf8'";



$qu1 = "CREATE TABLE Pictures (
    id int not null primary KEY AUTO_INCREMENT, 
    pictureName varchar(255),
    size int, 
    imagepath varchar(255)
) default charset='utf8'";

mysqli_query($link, $qu);
$err = mysqli_errno($link);
if($err){
    echo "<h3/><span style='color: red'>Query: ".$err."</span><h3/>";
    exit();
}

mysqli_query($link, $qu1);
$err = mysqli_errno($link);
if($err){
    echo "<h3/><span style='color: red'>Query: ".$err."</span><h3/>";
    exit();
}
echo "<h3/><span style='color: green'>База создана успешно!</span><h3/>";