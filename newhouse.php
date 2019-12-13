<?php 
    include_once('../templates/tpl_common.php');

    draw_header('newhouse');

?> <section id="content">
        <section id="House-section">
            <section id="place">
                <header>
                    <h3>What kind of place are you listing?</h3>
                        <form>
                            <input type="radio" name="place" value="Entire house" checked> House<br>
                            <input type="radio" name="place" value="Appartment"> Flat<br>
                        </form>
                </header>
            </section>
            <section id="beds">
                <header>
                    <h3>How many beds and bedrooms can guests use?</h3>
                    Beds: <form action="Bed" id="N_beds">
                            <select name="n_beds" id="Nbed">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                        </form>
                    Bedrooms: <form action="Bedroom" id="N_bedrooms">
                            <select name="n_beds" id="Nbedrooms">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                        </form>
                </header>
            </section>
            <section id="bathrooms">
                    <header>
                        <h3>How many bathrooms can guests use?</h3>
                    Bathrooms: <form action="Bathroom" id="N_bathrooms">
                            <select name="n_bathrooms" id="Nbathroom">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>        
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                        </form>
                </header>
            </section>
            <section id="amenities">
                    <header>
                        <h3>Which amenities does your place provide?</h3>
                        <div>
                        <input type="checkbox" id="Wifi" name="Wifi">
                        <label for="Wifi">Wifi</label>
                        </div>

                        <div>
                        <input type="checkbox" id="FreeParking" name="FreeParking">
                        <label for="FreeParking">Free Parking</label>
                        </div>

                        <div>
                        <input type="checkbox" id="kitchen" name="kitchen">
                        <label for="kitchen">Kitchen</label>
                        </div>

                        <div>
                        <input type="checkbox" id="heating" name="heating">
                        <label for="heating">Heating</label>
                        </div>

                        <div>
                        <input type="checkbox" id="tv" name="tv">
                        <label for="tv">Cable TV</label>
                        </div>

                        <div>
                        <input type="checkbox" id="bathessencials" name="bathessencials">
                        <label for="bathessencials">Bath Essencials</label>
                        </div>

                        <div>
                        <input type="checkbox" id="smoke" name="smoke">
                        <label for="smoke">Smoke Detector</label>
                        </div>
                    </header>
            </section>
        <section id="location">
                <header>
                        <h3>Where is your place located?</h3>
                            Country: <form action="text">
                               <input type="text" name="country" placeholder=" ">
                           </form>
                            Street Address: <form action="text">
                                <input type="text" name="street" placeholder=" ">
                            </form>
                            City: <form action="text">
                                    <input type="text" name="city" placeholder=" ">
                            </form>
                            Post Code: <form action="text">
                                        <input type="text" name="pc" placeholder=" ">
                            </form>
                </header>
        </section>
        <section id="info-house">
                <header>
                        <h3>Upload photos, write a short description and choose a title for your place!</h3>
                            Upload Photos: <form action="/action_page.php">
                                <input type="file" name="pic1" accept="image/*">
                                <input type="submit">
                              </form>
                              <form action="/action_page.php">
                                <input type="file" name="pic2" accept="image/*">
                                <input type="submit">
                              </form>
                              <form action="/action_page.php">
                                <input type="file" name="pic3" accept="image/*">
                                <input type="submit">
                              </form>
                            Description: <form action="text">
                                <input type="text" name="descrip" placeholder=" ">
                            </form>
                            Title: <form action="text">
                                    <input type="text" name="title" placeholder=" ">
                                </form>
                </header>
        </section>
        <section id="done">
        <input type="submit" value="Become a Host!">
        </section>
    </section>
    </section>
<?php 
    draw_footer();
?>