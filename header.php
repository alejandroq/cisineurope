<?php

/* 

CIS in Europe MVP 
11/20/15 nav.php Deliverable

Designer / Developer: Alejandro Quesada

*/

echo <<<HERE
    <header>
    <div id="stackMenu"></div>
    <h1 class="mobileTxtHeader">$text[1]</h1>
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
        <div class="navBtn navAbout"><h3>$text[2]</h3></div>
        <div class="navBtn navStudy"><h3>$text[3]</h3></div>
        <div class="navBtn navAbroad"><h3>$text[4]</h3></div>
        <a href="index.php?english=true"><div class="navBtn navEnglish"><h3>$text[8]</h3></div></a>
        <a href="index.php?spanish=true"><div class="navBtn navSpanish"><h3>$text[9]</h3></div></a> 
    </nav>  
    </header>
HERE;
?>