<?php 
    include_once('../templates/tpl_common.php');
    include_once('../database/users.php');
    include_once('../includes/sessions.php');
    include_once('../database/connection.php');

    draw_header('edit');
      
?>
    <section id="content">
        <section id="sideInfo">
        <?php $photoPath = "../database/images/users/thumbs_medium/".$_SESSION['username'].".jpg" ;
            if(!file_exists($photoPath)) {?>
                <a href="touristprofile.php"><img src="pictures/userpic.png" width = "186" height="181" alt="User Profile Pic"></a>
            <?php } else{ 
                $original = "../database/images/users/originals/".$_SESSION['username'].".jpg" ; ?>
                <a href=<?=$original?>> <img src=<?=$photoPath?> width = "186" height="181" alt="User Profile Pic"></a>
            <?php } ?>
            <form action="../actions/action_uploadImage.php" method="post" enctype="multipart/form-data">
                Upload new photo:
                <input type="text" name="title" placeholder="Photo Title">
                <input type="file" name="image" id="fileToUpload">
                <input type="submit" value="Upload">
            </form>
        </section>
        <section id="EditInfo">
            <header>
                <h3>Edit Profile</h3>
            </header>
            <h4>Password:</h4>
            <form action="../actions/action_editPassword.php" method='post'>
                <label for="pass">Old Password:</label>
                <input type="password" id="pass" name="password">    
                <label for="newpass">New Password:</label>
                <input type="password" id="newpass" name="newpassword">
                <input type="submit" value="Change Password">
            </form>

            <h4>Your Name:</h4>
            <form action="../actions/action_editUsername.php" method='post'>
                <label for="newuser">Username:</label>
                <input type="text" id="newuser" name="username">
                <input type="submit" value="Change Username">
            </form>
            <form action="../actions/action_editName.php">
                <label for="newname">Name:</label>
                <input type="text" id="newname" name="name">
                <input type="submit" value="Change Legal Name">
            </form>

            <h4>Your Email:</h4>
            <form action="../actions/action_editEmail.php" method='post'>
                <label for="newEmail">Email:</label>
                <input type="text" id="newEmail" name="email">
                <input type="submit" value="Change Email">
            </form>
            
            <h4>Your Address:</h4>
            <form action="../actions/action_editAddress.php" method='post'>
                <label for="newAddress">Address:</label>
                <input type="text" id="newAddress" name="address">
                <input type="submit" value="Change Address">
            </form>

            <h4>Your Languages:</h4>
            <form action="../actions/action_editLanguages.php" method='post'>
                <label for="newLang">Languages Spoken:</label>
                <input type="text" id="newLang" name="language">
                <input type="submit" value="Change Languages">
            </form>

            <h4>Your Profession:</h4>
            <form action="../actions/action_editProfession.php" method='post'>
                <label for="newProfession">Profession:</label>
                <input type="text" id="newProfession" name="address">
                <input type="submit" value="Change Profession">
            </form>
            
            <h4>Biography:</h4>
            <form action="../actions/action_editBio.php" method='post'>
                <textarea name="text" rows="5" cols="100">...</textarea><br>
                <input type="submit" value="Change Biography">
            </form>

            <h4>Phone Number</h4>
            <form action="../actions/action_editPhoneNumber.php" method='post'>
                <input type="number" id="phone" name="phonenumber">
                <input type="submit" value="Change Phone Number">
            </form>
        </section>
    </section>

