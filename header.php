<!DOCTYPE HTML> 

<html class="no-js" lang="">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>CIS in Europe</title>
        <meta name="description" content="A CIS Student's Guide to Studying in Europe">
        <meta name="author" content="Alejandro Quesada">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/main.css">

        <!-- HTML5 Boilerplate v5.2 JS -->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>

    </head>
    <body>
        
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <?php

echo <<<HERE
        <header>
        <a name="top"></a>
        <div id="stackMenu"></div>
        <div id="logo">
            <h1>$text[1]</h1>
            <p>A Student's Guide</p>
        </div>
        <nav>
            <div id="langSelect">
                <p class="langTxt">$text[5]</p>
                <select class="form-control" tabindex="-1" style="margin-top:0px;" onchange="this.options[this.selectedIndex].value && 
                (window.location = this.options[this.selectedIndex].value);">>
                    <option value="">$text[32]</option>
                    <option value="index.php?english=true" >$text[6]</option>
                    <option value="index.php?spanish=true">$text[7]</option>
                </select>
            </div> 
            <div class="onMobile"><p>Navigation</p></div> 
            <div class="navBtn navAbout"><h3>$text[2]</h3></div>
            <div class="navBtn navStudy"><h3>$text[3]</h3></div>
            <div class="navBtn navAbroad"><h3>$text[4]</h3></div>
            <div class="onMobile"><p>Select Language</p></div>
            <a href="index.php?english=true"><div class="navBtn navEnglish"><h3>$text[8]</h3></div></a>
            <a href="index.php?spanish=true"><div class="navBtn navSpanish"><h3>$text[9]</h3></div></a> 
            <div class="onMobile"><p>Study Categories</p></div>
HERE;
            printNavCategories();
echo '
        </nav>  
        </header> ';
    ?>
