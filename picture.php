<?php
class Tools
{
    static function connect($host = "localhost:3306", $dbname = "userdb", $user = "root", $pasw = "root")
    {
        $cs = "mysql:host=" . $host . ";dbname=" . $dbname . ";charset=utf8";
        $option = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"
        );
        try {
            $pdo = new PDO($cs, $user, $pasw, $option);
            return $pdo;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
}
class Picture {
    protected $id;
    protected $pictureName;
    protected $size;
    protected $imagepath;
    function __construct($i, $n, $s, $p)
    {
        $this->id=$i;
        $this->pictureName=$n;
        $this->size=$s;
        $this->imagepath=$p;
    }

    function __toString()
    {
        return "Id: " . $this->id . "; pictureName: " . $this->pictureName . ", size: " . $this->size . ", Path: " . $this->imagepath;
    }

    function intoDb()
    {
        try {
            $pdo = Tools::connect();
            $arr = (array)$this;
            array_shift($arr);
            $ps = $pdo->prepare("INSERT INTO Pictures(pictureName, imagepath, size) VALUES(:pictureName, :imagepath, :size)");
            $ps->execute($arr);
            $this->id = $pdo->lastInsertId();
            return 1062;
            echo "Картинка успешно добавлена в БД! <br>";
            echo $this;
        } catch (PDOException $ex) {
            $err = $ex->getMessage();
            echo "Exception: " . $err . "<br>";
            if (substr($err, 0, strpos($err, ":")) == "SQLSTATE[23000]")
                return 1062;
            else return $err;
        }
    }

    static function FromDb($id)
    {
        $picture = null;
        try {
            $pdo = Tools::connect();
            $ps = $pdo->prepare("SELECT * FROM Pictures WHERE id=?");
            $ps->execute(array($id));
            $row = $ps->fetch();
            $picture = new Picture($row["pictureName"], $row["imagepath"], $row["imagepath"], $row["size"]);
            return $picture;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
}