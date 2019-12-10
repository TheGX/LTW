<?php 
    include_once('../templates/tpl_common.php');
    include_once('../database/users.php');
    include_once('../includes/sessions.php');
    include_once('../database/connection.php');

    draw_header('edit');

    $User = getInfoFromUsername($_SESSION['username']);
      
?>
    <section id="content">
        <section id="sideInfo">
            <img src="pictures/bigprofilepic.png" alt="Profile Picture">
            <form action="upload.php" method="post" enctype="multipart/form-data">
            Upload new photo:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
            </form>
        </section>
        <section id="EditInfo">
            <header>
                <h3>Edit Profile</h3>
            </header>
            <h4>Password:</h4>
            <label for="pass">Old Password:</label>
            <input type="password" id="pass" name="password">
                
            <label for="newpass">New Password:</label>
            <input type="password" id="newpass" name="newpassword">
            <input type="submit" value="Change Password">

            <h4>Your Name:</h4>
            <label for="newuser">Username:</label>
            <input type="text" id="newuser" name="username">
            <input type="submit" value="Change Username">
            <h4></h4>
            <label for="newname">Legal Name:</label>
            <input type="text" id="newname" name="legalname">
            <input type="submit" value="Change Legal Name">

            <h4>Biography:</h4>
            <textarea name="text" rows="5" cols="100">...</textarea>
            <br>
            <input type="submit" value="Change Biography">

            <h4>Phone Number</h4>
            <input type="number" id="phone" name="phonenumber">
            <input type="submit" value="Change Phone Number">

            <h4>Save Profile</h4>
            <form action="../actions/action_editProfile.php">
            <input type="submit" value="Submit">
            </form>
    </section>
    
    </section>

