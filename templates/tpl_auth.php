<?php function draw_login(){
    ?>
    <form action="../action_login.php" method="post">
        <h3>Log in</h3>
        <label>
            User Name: <input type="text" name="username">
        </label>
        <label>
            Password: <input type="password" name="password">
        </label>
        <input type="submit" value="LOG IN">
    </form>
    <div id="forgot">
        <a href="login.html">Forgot Password?</a>
    </div>
    <div id="newUser">
        New User?
        <a href="register.php"> 
            <input type="submit" value="SIGN UP">
        </a>
    </div>
<?php } ?>

<?php function draw_register() {
    ?>
    <form action="../action_register.php" method="post">
        <h3>Register</h3>
        <label>
            User Name: <input type="text" name="username">
        </label>
        <label>
            Password: <input type="password" name="password">
        </label>
        <label>
            Confirm Password: <input type="password" name="confirmpassword">
        </label>
        <input type="submit" value="SIGN UP">
    </form>
<?php } ?>