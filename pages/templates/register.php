<?php
    include_once('../utils/utils.php');
?>
 <div class="register">
    <div id="signup">
        <div id="signup-form">
            <h1>Sign Up</h1>
            <form id="signup-form" action="signup.php">
                <input type="hidden" id="signup-token" value="<?= $_SESSION['random-token'] ?>">
                <label id="username-label" for="username">Username</label>
                <input id="username" type="text" name="username" placeholder="Username" required/>
                
                <label for="password">Password</label>
                <input id="password" type="password" name="password" placeholder="Password" required/>

                <label for="password2">Repeat password</label>
                <input id="password2" type="password" name="password2" placeholder="Repeat your Password" required/>

                <label for="email">Email</label>
                <input id="email" type="email" name="email" placeholder="Email" required/>

                <label for="name">Name</label>
                <input id="name" type="text" name="name" placeholder="Name" required/>
                <button id="signup-button" class="form-button" type="submit">Sign Up!</button>
            </form>
        </div>
    </div>
</div>