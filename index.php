<!DOCTYPE HTML>

<!-- 

CIS in Europe MVP 
11/20/15 HTML Deliverable

Designer / Developer: Alejandro Quesada

-->
<html class="no-js" lang="">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>CIS in Europe</title>
        <meta name="description" content="Why you should consider studying abroad with 'CIS in Europe'!">
        <meta name="author" content="Alejandro Quesada">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <!-- HTML5 Boilerplate v5.2 CSS -->
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">

        <!-- My CSS -->
        <link rel="stylesheet" type="text/css" href="css/mystyle.css" media="screen">
        <link rel="stylesheet" type="text/css" href="css/desktop.css" media="screen">
        <link rel="stylesheet" type="text/css" href="css/mobile.css" media="screen">

        <!-- HTML5 Boilerplate v5.2 JS -->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>

    </head>
    <body>
        
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

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
        <article class="about">
            <section class="landing"> </section>
            <section class="aboutText" style="background-color:#450084;">
            <div id="con" class="contrast">
                <h2>$text[10]</h2>
                <h4>$text[11]</h4>
                <p>$text[12]</p>
            </div>  
            </section>

            <section class="contrast" style="background-color:#9C51E2;">
                <div id="con">
                    $anonymousNotes
                </div>
            </section>

            <section class="reviewMe" style="background-color:#CBB677;">
                <div id="con" class="container">
                    <h2>$text[24]</h2>
                    <h4>$text[15]</h4>
                    <form action="" method="post" id="myForm"> 
                            <div class="row">    
                                <div class="six columns">
                                    <div class="legend">$text[16]</div>
                                    <input type="text" name="cityName" id="cityName" class="form-control" placeholder="City" tabindex="1" minlength="2" required>
                                </div>
                                <div class="six columns">
                                    <div class="legend">$text[17]</div>
                                        <select name="countryName" id="countryName" class="form-control" placeholder="Country" tabindex="2" required>'
                                            $countryOptions
                                        </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="six columns">
                                    <div class="legend">$text[18]</div>
                                        <select name="price" id="price" class="form-control" tabindex="3" required>
                                             <option value="1">$text[33]</option>
                                             <option value="2">$text[34]</option>
                                             <option value="3">$text[35]</option>
                                        </select>
                                </div>
                                <div class="six columns">
                                    <div class="legend">$text[19]</div>
                                        <select name="rating" id="rating" class="form-control" tabindex="4" required>
                                             <option value=3>&#9733;&#9733;&#9733;</option>
                                             <option value=3>&#9733;&#9733;&#9734;</option>
                                             <option value="1">&#9733;&#9734;&#9734;</option>
                                        </select>
                                </div>
                            </div>
                            <!-- Write a Note -->
                            <div class="row">
                                <div class="12 columns"> 
                                    <div class="legend">$text[20]</div>
                                        <textarea name="note" id="note" class="form-control" rows="2" cols="70" placeholder="Tell us about your experience in 140 characters!" maxlength="140" tabindex="5"required></textarea>
                                        <div class="help">$text[31]</div>
                                </div>
                            </div>  
                            <div class="row">
                                <div class="twelve columns">
                                    <button class="req" type="submit" name="submit" tabindex="6">$submitText</button>
                                </div>
                            </div>
                    </form>  
            </section>
        </article>
        <section class="study">
            <div id="con">
                <h2>$text[25]</h2>
                <h4>$text[26]</h4>
                <p>$text[27]</p>
            </div>
        </section>
        <footer>
            <p class="credits">By Alejandro Quesada<br>
            <a class="credits link" href="http://www.alejandroquesada.com" target="_blank" tabindex="-1">
            www.alejandroquesada.com</a></p>
        </footer>
HERE;
?>
        <!-- WARNING: Do not edit past this line -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>

        <!-- JS Callouts located here as to not disrupt above contents when failure is about -->
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
