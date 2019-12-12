<?php function draw_login(){
    ?>
    <form action="../actions/action_login.php" method="post">
        <h3>Log in</h3>
        <label>
            User Name: <input type="text" name="username">
        </label>
        <label>
            Password: <input type="password" name="password">
        </label>
        <input type="submit" value="LOG IN">
    </form>

    <div id="newUser">
        New User?
        <form action="register.php">
            <input type="submit" value="SIGN UP">
        </form>
    </div>
<?php } ?>

<?php function draw_register() {
    ?>
    <form action="../actions/action_register.php" method="post">
        <h3>Register</h3>
        <label>
            User Name: <input type="text" name="username" required>
        </label>
        <label>
            Name: <input type="text" name="name" required>
        </label>
        <label>
            Email: <input type="text" name="email" required>
        </label>
        <label>
            Password: <input type="password" name="password" required>
        </label>
        <label>
            Confirm Password: <input type="password" name="confirmpassword" required>
        </label>
        <input type="submit" value="SIGN UP">
    </form>
<?php } ?>