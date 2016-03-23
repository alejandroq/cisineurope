<!-- 

CIS in Europe MVP 
11/20/15 HTML Deliverable

Designer / Developer: Alejandro Quesada

-->

<?php 
/*  require 'connection.php' calls and inserts the php code to connect your webpage 
    to your WIMP stack. */
require 'connection.php';

/*  require 'logic.php', like connection.php, inserts the php code comprising here. 
    Cleaner than muddling all the code in this one file. */
require 'functions.php';

/*  require 'nav.php' calls and inserts the HTML from the file 'nav.php' within the 
    CISinEurope Directory here. This technique is useful for maintaining consistent 
    navigation interfaces. */
require 'header.php';

echo <<< HERE
        <section class="abroad contrast">  
            <div id="con">
                <h2>$text[28]</h2>
            </div>
            <div class="slide-size">
                <ul class="slide-overflow" style="list-style-type: none; margin-left: -2.5em;">
                    $slideImgs
                </ul>
                <!-- Controls for Slideshow calling JS function toggleSlide() -->
                <div class="control-set">
                    <button class="slide-controller prev" onclick="toggleSlide(false)" role="slideshow">$text[30]</button>
                    <button class="slide-controller next" onclick="toggleSlide(true)" role="slideshow">$text[29]</button>
                </div>
            </div>
        </section>
HERE;

// Page: ABOUT 
echo <<< HERE
	<!-- LANDING -->
        <article class="about">
            <section class="landing"> </section>
            <section class="aboutText" style="background-color:#450084;">
            <div id="con" class="contrast">
                <h2>$text[10]</h2>
                <h4>$text[11]</h4>
                <p>$text[12]</p>
            </div>  
            </section>

    <!-- ANON. NOTES SECTION -->
            <section class="contrast" style="background-color:#9C51E2;">
                <div id="con">
                    $anonymousNotes
                </div>
            </section>

    <!-- ANON. REVIEW SECTION -->
            <section class="reviewMe" style="background-color:#CBB677;">
                <div id="con" class="container">
                    <h2>$text[24]</h2>
                    <h4>$text[15]</h4>

                   	<!-- FORM -->
                    <form method="post" id="myForm"> 
                            <div class="row">   

                            <!-- CITY NAME INPUT -->  
                                <div class="six columns">
                                    <div class="legend">$text[16]</div>
                                    <input type="text" name="cityName" id="cityName" class="form-control" placeholder="City" tabindex="1" minlength="2" required>
                                    </div>
                                    <!-- END CITY NAME INPUT --> 

                            <!-- COUNTRY NAME INPUT --> 
                                <div class="six columns">
                                    <div class="legend">$text[17]</div>
                                        <select name="countryName" id="countryName" class="form-control" placeholder="Country" tabindex="2" required>'
HERE;

                                            countryOptionsPrinting();

echo <<< HERE
                                        </select>
                                </div>
                            <!-- END COUNTRY NAME INPUT --> 

                            </div>
                            <div class="row">

                            <!-- PRICE INPUT --> 
                                <div class="six columns">
                                    <div class="legend">$text[18]</div>
                                        <select name="price" id="price" class="form-control" tabindex="3" required>
                                             <option value="1">$text[33]</option>
                                             <option value="2">$text[34]</option>
                                             <option value="3">$text[35]</option>
                                        </select>
                                </div>
                            <!-- END PRICE INPUT --> 

                            <!-- RATING INPUT --> 
                                <div class="six columns">
                                    <div class="legend">$text[19]</div>
                                        <select name="rating" id="rating" class="form-control" tabindex="4" required>
                                             <option value=3>&#9733;&#9733;&#9733;</option>
                                             <option value=3>&#9733;&#9733;&#9734;</option>
                                             <option value="1">&#9733;&#9734;&#9734;</option>
                                        </select>
                                </div>
                            <!-- END RATING INPUT --> 

                            </div>

                            <!-- NOTE TEXTAREA -->
                            <div class="row">
                                <div class="12 columns"> 
                                    <div class="legend">$text[20]</div>
                                        <textarea name="note" id="note" class="form-control" rows="2" cols="70" placeholder="Tell us about your experience in 140 characters!" maxlength="140" tabindex="5"required></textarea>
                                        <div class="help">$text[31]</div>
                                </div>
                            <!-- END NOTE TEXTAREA --> 

                            </div> 

                            <!-- SUBMIT BUTTON -->  
                            <div class="row">
                                <div class="twelve columns">
                                    <button class="req" type="submit" name="submit" tabindex="6">$submitText</button>
                                </div>
                            </div>
                            <!-- END SUBMIT BUTTON -->  

                    </form> 
                    <!-- END FORM -->  
            </section>
        </article>
HERE;

echo <<< HERE
        <section class="study">
            <aside>
            <div>
                <h2>$text[25]</h2>
                <h4>$text[26]</h4>
                <p>$text[27]</p>
            </div>
HERE;

			printStudyContent();

echo '
            </aside>
                    <aside id="categories">
                <div>
                    <h4>Categories</h4>
                    <ul>'; 
                    
						printStudyCategories();

echo'               </ul>
                </div>
            </aside>
        </section>'; 

require 'footer.php'; ?>
        <!-- WARNING: Do not edit past this line -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>

        <!-- JS Callouts located here as to not disrupt above contents when failure is about -->
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
