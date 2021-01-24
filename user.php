<?php
include_once("functions.php");
class User{
    protected $login, $pass, $email;
    function Show(){
        echo "<br/>Логин: ". $this->login;
        echo "<br/>Email: ". $this->email;
    }

    function __construct($login, $pass, $email)
    {
        $this->login=$login;
        $this->pass=$pass;
        $this->email=$email;
    }
}
$p1= new User("volidenko", "25665", "volidenko@i.ua");


$link = connect();
$sel1 = "SELECT * FROM Users";
$res = mysqli_query($link, $sel1);

while ($row=mysqli_fetch_array($res, MYSQLI_NUM))
{
    $p1= new User($row[1], $row[2], $row[3]);
}
$p1->Show();