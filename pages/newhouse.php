<?php 
     include_once('../templates/tpl_common.php');
     include_once('../includes/sessions.php');
     include_once('../database/connection.php');
     include_once('../database/users.php');

    draw_header('newhouse');

?> <section id="content">
        <section id="House-section">
            <form action="../actions/action_newhouse.php" enctype="multipart/form-data" method="post">
            <section id="place">
                <header>
                    <h3>What kind of place are you listing?</h3>
                        House<input type="radio" name="place" value="Entire house" checked> 
                        Flat<input type="radio" name="place" value="Appartment"> 
                </header>
            </section>
            <section id="beds">
                <header>
                    <h3>How many beds can guests use?</h3>
                    Single-Beds: 
                        <select name="n_Singlebeds" id="Nbed">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    Double-Beds: 
                        <select name="n_Doublebeds" id="Nbed">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                </header>
            </section>
            <section id="bathrooms">
                <header>
                    <h3>How many bathrooms can guests use?</h3>
                Bathrooms: 
                    <select name="n_bathrooms" id="Nbathroom">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>        
                    </select>
                </header>
            </section>
        <section id="location">
                <header>
                    <h3>Where is your place located?</h3>
                </header>
                        Country:<input type="text" name="country" placeholder=" "> <br>
                        Street Address:<input type="text" name="street" placeholder=" "> <br>
                        City:<input type="text" name="city" placeholder=" "><br>
                        Post Code:<input type="text" name="pc" placeholder=" ">
        </section>
        <section id="info-house">
                <header>
                        <h3>Upload photos, write a short description and choose a title for your place!</h3>
                            Upload Photos: 
                            <input type="file" name="pic1"  accept="image/*">
                            <br> Title: 
                                <input type="text" name="title" placeholder=" ">
                            <br> Description:
                                <textarea name="description" cols="70" rows="10"></textarea>
                </header>
        </section>
        <section id="done">
        <input type="submit" value="Become a Host!">
        </section>
        </form>
    </section>
    </section>
<?php 
    draw_footer();
?>