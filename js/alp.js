//ALT LAB STUFF


/*
// When the user scrolls the page, execute myFunction 
window.onscroll = function() {myFunction()};

// Get the navbar
var navbar = document.getElementById("wrapper-navbar");

// Get the offset position of the navbar
var sticky = navbar.offsetTop+60;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

*/

// jQuery('.trio-stat').each(function () {
//         jQuery(this).prop('Counter',0).animate({
//             Counter: jQuery(this).text()
//         }, {
//             duration: 5000,
//             easing: 'swing',
//             step: function (now) {
//                 jQuery(this).text(Math.ceil(now));
//             }
//         });
//     });

//attempt to stop stupid padding addition on modal show but probably failing
jQuery( "#btn-contact" ).click(function() {
            jQuery('body').css('padding-right','0');
            jQuery('.navbar-toggler').css('padding-right','0');
            jQuery('#contactModal').css('padding-right','0');
        }); 


// The function actually applying the offset
function offsetAnchor() {
  if (location.hash.length !== 0) {
    window.scrollTo(window.scrollX, window.scrollY - 200);
  }
}

// Captures click events of all <a> elements with href starting with #
jQuery(document).on('click', 'a[href^="#"]', function(event) {
  // Click events are captured before hashchanges. Timeout
  // causes offsetAnchor to be called after the page jump.
  window.setTimeout(function() {
    offsetAnchor();
  }, 0);
});

// Set the offset when entering page with hash present in the url
window.setTimeout(offsetAnchor, 0);


//shuffle all services https://stackoverflow.com/questions/13427287/shuffle-all-divs-with-the-same-class
(function () {
    "use strict";
    // Cycle over each .shuffledv HTMLElement
    jQuery("#all-services-holder").each(function () {
        // Remove all divs within, store in $d
        var $d = jQuery(this).find(".services-grid").remove();
        // Sort $d randomnly
        $d.sort(function () { return Math.floor(Math.random() * $d.length); });
        // Append divs within $d to .shuffledv again
        $d.appendTo(this);
    });
}());

//turn on tooltips
jQuery(function () {
  jQuery('[data-toggle="tooltip"]').tooltip();
})


//trio svg animations
document.addEventListener("load", findSvg);

function addStart () {   
    if(document.getElementById('commitment')){
       document.getElementById('commitment').classList.add('start'); 
    }
    if(document.getElementById('experience')){
      document.getElementById('experience').classList.add('start'); 
    }
    if(document.getElementById('success')){
      document.getElementById('success').classList.add('start'); 
    }
    if(document.getElementById('team-collaborate')){
      document.getElementById('team-collaborate').classList.add('start'); 
    }
    if(document.getElementById('team-care')){
      document.getElementById('team-care').classList.add('start'); 
    }
    if(document.getElementById('team-innovative')){
      document.getElementById('team-innovative').classList.add('start'); 
    }
  }

function findSvg(){
  if(document.getElementById('svgRow')){
    var row = document.getElementById('svgRow');
    var y = row.getBoundingClientRect().top;
    return y;
  } else {
    return 10000000000;
  }
}

jQuery(window).scroll(function (event) {
    var scroll = jQuery(window).scrollTop();
    if (scroll > findSvg()){
      addStart();
    }
});

//menu tweaks for mobile 

// document.addEventListener("load", mobileMenuMod());

// function mobileMenuMod(){
//   var screenSize = window.screen.width;
//   var menu = document.getElementById('main-menu');
//   var items = menu.getElementsByTagName('li');  
//   var corner = document.getElementById('btn-contact');
//   for (i = 0; i < items.length; i++ ){
//     var words = items[i].childNodes[0].innerHTML;
//     if (screenSize < 1200){
//       var broken = words.replace(' ', '<br>');
//       console.log(items[i].childNodes[0].innerHTML);
//       items[i].childNodes[0].innerHTML = broken;
//       corner.innerHTML = 'Work<br> with us';
//     } else if (screenSize > 1200){
//       var unbroken = words.replace('<br>', ' ');
//       items[i].childNodes[0].innerHTML = unbroken;
//       corner.innerHTML = 'Work with us<i class="arrow-right"></i>';
//     }
//   }
// }

// if(window.attachEvent) {
//     window.attachEvent('onresize', function() {
//         mobileMenuMod();
//     });
// }
// else if(window.addEventListener) {
//     window.addEventListener('resize', function() {
//        mobileMenuMod();
//     }, true);
// }
// else {
//     //The browser does not support Javascript event binding
// }

document.addEventListener("load", addContactMobile());

if(window.attachEvent) {
    window.attachEvent('onresize', function() {
        addContactMobile()();
    });
}
else if(window.addEventListener) {
    window.addEventListener('resize', function() {
       addContactMobile();
    }, true);
}
else {
    //The browser does not support Javascript event binding
}

function addContactMobile(){
  var screenSize = window.screen.width;
  var ul = document.getElementById('main-menu');
  if (screenSize > 414 && document.getElementById('contact-us-mobile')){
    var mobileContact = document.getElementById('contact-us-mobile');
    removeElement(mobileContact);
  } else if (screenSize < 415 && !document.getElementById('contact-us-mobile')){
      var li = document.createElement('li');
      li.appendChild(document.createTextNode('Contact Us'));
      ul.appendChild(li);  
      li.setAttribute('id', 'contact-us-mobile');
      li.setAttribute('class', 'menu-item');
      li.innerHTML = '<a href="#contactModal" data-toggle="modal" data-target="#contactModal">Work with us<i class="arrow-right"></i></a>';
    }

}


//smooth scroll to top

(function($) {
if (!document.getElementById('full-width-partner-wrapper')){//prevent running on training page
// Select all links with hashes
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });
}
 })( jQuery );

 //SMOOTH SCROLL ALL HASH from https://css-tricks.com/snippets/jquery/smooth-scrolling/
(function($) {
  if (!document.getElementById('full-width-partner-wrapper')){//prevent running on training page

 // Select all links with hashes
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });
}
   })( jQuery );

//filter for alliance page 
(function($){
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#alliance-events .row").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
//buttons
buttons = document.querySelectorAll('.btn-search')

buttons.forEach((button) => {
  button.addEventListener('click', () => {
    let buttonText = button.innerHTML;
    let search = document.querySelector('#myInput');
    search.value = buttonText;
    $('.selected').removeClass('selected');
    button.classList.add('selected');
     $('#myInput').keyup();//trigger jquery function
  });
});

    })( jQuery );

var videos = document.querySelectorAll('iframe[src^="https://www.youtube.com/"], iframe[src^="https://player.vimeo.com"], iframe[src^="https://www.youtube-nocookie.com/"], iframe[src^="https://www.nytimes.com/"]'); //get video iframes for regular youtube, privacy+ youtube, and vimeo


videos.forEach(function(video) {
   let wrapper = document.createElement('div'); //create wrapper 
      wrapper.classList.add("video-responsive"); //give wrapper the class      
      video.parentNode.insertBefore(wrapper, video); //insert wrapper      
      wrapper.appendChild(video); // move video into wrapper
});