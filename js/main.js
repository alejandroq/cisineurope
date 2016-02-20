/* 

CIS in Europe MVP 
11/20/15 JS / JQuery Deliverable

Designer / Developer: Alejandro Quesada

*/

$(function() {
    
/*************************************************************************************************************/
/* Automatic Event rendering "About" link 'color:Black': Accordion-style                                     */
/*************************************************************************************************************/
    
    var x=0;
    
    if (x==0) {
        $('.navAbout').css({color:'black'});
        $('.navEnglish').css({color:'black'});
        x=1;  
        }

/*************************************************************************************************************/
/* Default Language Highlight (in Mobile)                                                                    */
/*************************************************************************************************************/

    // var language grabs the text from .mobileTxtHeader. If it's in English it highlights the proper 
    // content in Mobile. 
    var language = $( ".mobileTxtHeader" ).text();

    if ( language == 'CIS in Europe') {

        $('.navEnglish').css({color:'black'}); 
        $('.navSpanish').css({color:'gray'}); 

    } else {

        $('.navEnglish').css({color:'gray'}); 
        $('.navSpanish').css({color:'black'}); 

    }


/*************************************************************************************************************/
/* Hover Events                                                                                              */
/*************************************************************************************************************/
     
      $('.navAbout').on('mouseover', function() {
        $('.navAbout').css({backgroundColor:'yellow'});
      });
      $('.navStudy').on('mouseover', function() {
        $('.navStudy').css({backgroundColor:'yellow'});
      });
      $('.navAbroad').on('mouseover', function() {
        $('.navAbroad').css({backgroundColor:'yellow'});
      });

/*************************************************************************************************************/
/* Mouse Out Events                                                                                          */
/*************************************************************************************************************/
      
      $('.navAbout').on('mouseout', function() {
        $('.navAbout').css({backgroundColor:'white'});
      });
      $('.navStudy').on('mouseout', function() {
        $('.navStudy').css({backgroundColor:'white'});
      });
      $('.navAbroad').on('mouseout', function() {
        $('.navAbroad').css({backgroundColor:'white'});
      });
      
/*************************************************************************************************************/
/* Click Events                                                                                              */
/*************************************************************************************************************/
      
      $('.navAbout').on('click', function() {
        $('.about').css({opacity:'1'});
        $('.abroad').hide(200);
        $('.about').show(200);
        $('.study').hide(200);
        $('#stackMenu').css('background-image','url(images/menu.png)');
        $('header').css({backgroundColor:'white'});
        $('.navAbout').css({color:'black'});
        $('.navStudy').css({color:'gray'});
        $('.navAbroad').css({color:'gray'});
        $('.mobileTxtHeader').css({color:'black'});
        if ($(window).width() < 630) { $('nav').hide(200);} 
      });
      $('.navStudy').on('click', function() {
        $('.abroad').hide(200);
        $('.about').hide(200);
        $('.study').show(200);
        $('#stackMenu').css('background-image','url(images/menuContrast.png)');
        $('header').css({backgroundColor:'black'});
        $('.navStudy').css({color:'black'});
        $('.navAbout').css({color:'gray'});
        $('.navAbroad').css({color:'gray'});
        $('.mobileTxtHeader').css({color:'white'});
        if ($(window).width() < 630) { $('nav').hide(200);}  
      });
      $('.navAbroad').on('click', function() {
        $('.about').css({opacity:'.4'});
        $('.abroad').show(200);
        $('.about').show(200);
        $('.study').hide(200);
        $('#stackMenu').css('background-image','url(images/menu.png)');
        $('header').css({backgroundColor:'white'});
        $('.navAbroad').css({color:'black'});
        $('.navAbout').css({color:'gray'});
        $('.navStudy').css({color:'gray'});
        $('.mobileTxtHeader').css({color:'black'});
        if ($(window).width() < 630) { $('nav').hide(200);} 
      });
      $('.about').on('click', function() {
        $('.about').css({opacity:'1'});
        $('.abroad').hide(200);
        $('.navAbout').css({color:'black'});
        $('.navStudy').css({color:'gray'});
        $('.navAbroad').css({color:'gray'});
        });
      
/*************************************************************************************************************/
/* Mobile / Window < 630px Controls                                                                          */
/*************************************************************************************************************/
      
      $('#stackMenu').on('click', function() {
        $('nav').slideToggle(200);
      });
    });

/*************************************************************************************************************/
/* Carousel: Source: http://g-liu.com/blog/2013/08/tutorial-basic-carouselslideshow-with-javascript/         */
/*************************************************************************************************************/
      
      // direction = boolean value: true or false. If true, go to NEXT slide; otherwise go to PREV slide
      function toggleSlide(direction) {
          var elements = document.getElementsByClassName("hideable"); // gets all the "slides" in our slideshow
          // Find the LI that's currently displayed
          var visibleID = getVisible(elements);
          elements[visibleID].style.display = "none"; // hide the currently visible LI
          if(!direction) {
              var makeVisible = prev(visibleID, elements.length); // get the previous slide
          } else {
              var makeVisible = next(visibleID, elements.length); // get the next slide
          }
          elements[makeVisible].style.display = "block"; // show the previous or next slide
      }
      function getVisible(elements) {
          var visibleID = -1;
          for(var i = 0; i < elements.length; i++) {
              if(elements[i].style.display == "block") {
                  visibleID = i;
              }
          }
          return visibleID;
      }
      function prev(num, arrayLength) {
          if(num == 0) return arrayLength-1;
          else return num-1;
      }
      function next(num, arrayLength) {
          if(num == arrayLength-1) return 0;
          else return num+1;
      }

/*************************************************************************************************************/
/* Twitter Character Count A-like                                                                            */
/*************************************************************************************************************/
      
      var maxLength = 140;

      $('textarea').keyup(function() {
        var length = $(this).val().length;
        var length = maxLength-length;
      $('.help').text(length + ' characters remaining');
  
      if (length <20) {
          $('.help').css({color:'red'});
          }
      else {
          $('.help').css({color:'#575353'});
          } 
      });