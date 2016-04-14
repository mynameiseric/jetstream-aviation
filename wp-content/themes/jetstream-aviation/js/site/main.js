// Get the hash values as an array and make it globally available
// var hashbangStr = window.location.hash.replace(/^\s*\#\!\/+/gi, '')
// ,   hashbang = (hashbangStr !== '') ? hashbang = hashbangStr.split(/\/|&/) : '';

var $window = jQuery(window)
,   windowDimensions = getWindowDimensions()
,   isIE = navigator.userAgent.indexOf('Trident', 'msie') != -1 ? true : false
,   modalOverlay = $('<div id="modal-overlay">');

window.gwrf;


$(window).load(function(){

  var setSidebarTop; // global, sigh

  var $window          = $(window)
  ,   windowDimensions = getWindowDimensions();
  
  
  //Call layoutHandler() function to handle events for altering layout on window.load and window.resize
//  layoutHandler( false );


  //------------------------------------------------------------------------------
  //
  //    Initialize jQuery colorbox for image galleries
  //
  //------------------------------------------------------------------------------

  var cboxOptions = {
    opacity   : 0.9,
    width     : '100%',
    height    : '80%',
    maxWidth  : '1180px',
    maxHeight : '700px',
    current   : 'image {current} of {total}',
    next      : '',
    previous  : '',
    close     : ''
  };
  
  //Disable background scrolling when colorbox modals are open
  $(document).bind('cbox_open', function() {
      $('html').css({ overflow: 'hidden' });
  }).bind('cbox_closed', function() {
      $('html').css({ overflow: '' });
  });
  
  $('#close-request-quote').click(function(e){
    $('#request-quote').slideUp(200).toggleClass('expand');
    $('#masthead').toggleClass('quote-panel-expanded');
    e.preventDefault();
  });
  $('.request-quote-link a').click(function(e){
    if( $('#masthead').hasClass('quote-panel-expanded') ) {
      $('#request-quote').slideUp(200).toggleClass('expand');
    }
    else {
      $('#request-quote').slideDown(200).toggleClass('expand');
      $("html, body").animate({ scrollTop: 0 }, 200);
    }
    $('#masthead').toggleClass('quote-panel-expanded');
    e.preventDefault();
  });
  
  //$('.gform_wrapper').css('display', 'block', 'important');
  

});//window.onload();


//------------------------------------------------------------------------------
//
//    Utility for creating debounced callbacks (global)
//
//------------------------------------------------------------------------------

function debounced(latency, callback) {
  return (function () {
    clearTimeout(this.debounceState);
    this.debounceState = setTimeout(callback, latency);
  });
}


//------------------------------------------------------------------------------
//
//    Get true window dimensions to use later (global)
//
//------------------------------------------------------------------------------

function getWindowDimensions() {
  var windowWidth  = 0
  ,   windowHeight = 0;
  // height
  if (typeof(window.innerHeight) === 'number') {
    windowHeight = window.innerHeight;
  } else {
    if (document.documentElement && document.documentElement.clientHeight) {
      windowHeight = document.documentElement.clientHeight;
    } else {
      if (document.body && document.body.clientHeight) {
        windowHeight = document.body.clientHeight;
      }
    }
  }

  // width
  if (typeof(window.innerWidth) === 'number') {
    windowWidth = window.innerWidth;
  } else {
    if (document.documentElement && document.documentElement.clientWidth) {
      windowWidth = document.documentElement.clientWidth;
    } else {
      if (document.body && document.body.clientWidth) {
        windowWidth = document.body.clientWidth;
      }
    }
  }

  return {
    width: windowWidth,
    height: windowHeight
  };
}

function getUrlParam(name) {
  return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null;
}




//------------------------------------------------------------------------------
//
//    Adjust positioning of DOM elements for mobile & desktop views
//
//------------------------------------------------------------------------------

function layoutHandler( onresize ) {
  
  //Move 1st related article inline to article body on page load
  if( !onresize ) {
  }
  else {
  } 
}


//------------------------------------------------------------------------------
//
//    To be used with colorbox's onComplete function in order to remove the title
//    box from empty titles.
//
//    onComplete: function() { removeEmptyColorboxTitles(); }
//
//------------------------------------------------------------------------------

function removeEmptyColorboxTitles() {
  if ($('#cboxTitle').text() === '') {
    //adjustments are made based on the margin-bottom value of #cboxLoadedContent
    var pixelAdjustment = parseInt($('#cboxLoadedContent').css('margin-bottom'));
    $('#cboxTitle').css('display', 'none');
    $('#colorbox').css('top', parseInt($('#colorbox').css('top')) + (pixelAdjustment / 2)).css('height', parseInt($('#colorbox').css('height')) - pixelAdjustment);
    $('#cboxWrapper').css('height', parseInt($('#cboxWrapper').css('height')) - pixelAdjustment);
    $('#cboxContent').css('height', parseInt($('#cboxContent').css('height')) - pixelAdjustment);
    $('#cboxLoadedContent').css('margin-bottom', '0');
  }
}



//------------------------------------------------------------------------------
//
//    window.onresize() with timeout so it's not constantly processing as
//    a user changes their browser size
//
//------------------------------------------------------------------------------

//var doit;
//window.onresize = function(){
//  clearTimeout(doit);
//  doit = setTimeout( layoutHandler( true ), 100);
//};