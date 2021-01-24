<h3>Registration</h3>
<?
include_once("functions.php");
if(!isset($_POST["regbtn"])){
    ?>
    <form action="registration.php" method="POST">
        <div class="form-group">
            <label for="login">Login:</label>
            <input type="text" name="login" class="form-control">
        </div>
        <div class="form-group">
            <label for='passw1'>Password:</label>
            <input type='password' name='passw1' class="form-control">
        </div>
        <div class="form-group">
            <label for='passw2'>Confirm password:</label>
            <input type='password' name='passw2' class="form-control">
        </div>
        <div class="form-group">
            <label for='email'>Email:</label>
            <input type='email' name='email' class="form-control">
        </div>
        <button type='submit' name='regbtn' class="btn btn-primary">Register</button>
    </form>
    <?
} else {
    if(register($_POST["login"], $_POST["passw1"], $_POST["email"])){
        echo "<h3><span style='color:green'>Пользователь ".$_POST["login"]." добавлен!</span></h3>";
        echo '<a class="nav-link" href="user.php">Show</a>';
    }
}
?>