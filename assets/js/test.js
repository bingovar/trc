var number = 0;
var maxNumber = $(".test-item").length;
var $element = $(".test-item").find("input, select, textarea");
var btnPrev = $(".quiz__prev");
var btnNext = $('.quiz__next');
var isValid;
var dataBlock;
var activeSlede = [];

for(var i = 0; i< maxNumber; i++){
  activeSlede[i] = false;
}


$element.on('change input', function (e) {
  var value = $(this).val().trim();

  isValid = value !== "";
  btnActive(!isValid);

});
$('.num-all').text(maxNumber);
function btnActive(isValid) {
  if(number === 0){
    btnPrev.prop('disabled', 'false');
    btnPrev.hide();
    btnNext.prop('disabled', isValid);
    $('.btn-lbs').hide();
  }else{
    btnPrev.fadeIn();
    btnPrev.prop('disabled', false);
    $('.btn-lbs').hide();
    if(activeSlede[number] === true || isValid === false){
      btnNext.prop('disabled', false);
      $('.btn-lbs').hide();
    }else{
      btnNext.prop('disabled', true);
      $('.btn-lbs').show();
    }
    
  }

}


var lbs = false;
$('.btn-lbs').on('click', function(event) {
  event.preventDefault();
  $(this).addClass('act');
  
  if(!lbs){
    setTimeout(function(){
      $('.btn-lbs').removeClass('act');
      lbs = false;
    }, 3000);
    lbs = true;
  }

});

// sidebar

var $barLevel = 100 / (maxNumber);
var $barWidth = $barLevel;
function progress(num){
  $(".progress-bar__line").css({"width": $barWidth + '%'});
//   $('.pc').text(Math.floor($barWidth) + '%');
}
progress(0);



// btn


function btnClick() {

  btnPrev.on('click', function(event) {
    event.preventDefault();
    --number;

    $('.test-item').hide();
    $('.test-item').eq(number).fadeIn(1000);
    $(".progress__item").eq(number+1).removeClass('active');
    $(".progress__item").eq(number).addClass('active');
    btnActive(!isValid);
    
    // animateTop ();
  });

  btnNext.on('click', function(event) {
    event.preventDefault();
    activeSlede[number] = true;
    ++number;
    
    btnPrev.show();
    btnActive(!isValid);
    // $(".progress__item").eq(number+1).removeClass('active');
    // $(".progress__item").eq(number).addClass('active');
    

    if(activeSlede[number] === true){
      btnNext.prop('disabled', false);
      $('.btn-lbs').hide();
    }else{
      btnNext.prop('disabled', true);
      $('.btn-lbs').show();
    }

     $(".test-item").hide();
      $(".test-item").eq(number).fadeIn(600);
      $(".test-right__item").hide();
      $(".test-right__item").eq(number).fadeIn(600);
      var flNum = 1;
      flNum += number;
      $('.fl-num-js').text(flNum);

    if(number === maxNumber - 1){

      $('#tjs-one').html($('#qw3inp10').val() + ' <span class="fw4">соток</span>');
      $('#tjs-two').html($('#qw3inp11').val() + ' <span class="fw4">л.с.</span>');
      
      var three = '';
      $('input[name="qw3[]"]').each(function(index, el) {
        if($(this).prop('checked')){
          three += $(this).val() + ' \ ';
        }
      });

      $('#tjs-three').text(three);
		console.log($('#qw3inp10').val())
		console.log(three) 

    }

    $barWidth += $barLevel;
    progress(number);

    // animateTop ();
    // $(".num-current").text(number + 1);
    

  });


}
btnClick();

function animateTop (eq){
  var elem = $('.test-scroll-js');
  var top = elem.offset().top - 15;
  $('body,html').animate({scrollTop: top}, 400);
}


$.fn.hasAttr = function(name) {  
   return this.attr(name) !== undefined;
};

$('.test-btn-final').on('click', function(event) {
//   event.preventDefault();
  $('.test-btn-final').removeClass('active');
  $(this).addClass('active');
  $('.btn-gift').val($(this).find('.tsm13').text());
  // $('.test-btn-final').attr('disabled', 'true');
});
var nForm = false;
  $(function(){
    'use strict';
    var action = $('.ajax-url').val();
    $('form').not('.nav-search').on('submit', function(e){
      e.preventDefault();
      var formThis = $(this);
      var fd = new FormData( this );
	formThis.find('.tsm12.gray').removeClass('tgc2');
      $('.test-btn-final').each(function(index, el) {
        if($(this).hasClass('active')){
          $('.btn-gift').val($(this).find('.tsm13').text());
        }
      });
      
      formThis.find('.btn').attr({
        'disabled': 'true'
      });
      if(formThis.find('input[name="formname"]').val() === "catalog" ){
        var link = document.createElement('a');
        link.setAttribute('href', $('.pdf-pdf').val());
        link.setAttribute('target', "_blank");
        link.setAttribute('download','');

        if(navigator.userAgent.indexOf('Mac') > 0){
          window.location = $('.pdf-pdf').val();
        }else{
          simulate( link, "click");
        }
        // $('html').addClass('stop');
        // $(".overlay").fadeOut();
        // $("#modal-thank2").fadeIn();
        // formThis.find('.btn').removeAttr('disabled');
      }else if(formThis.find('input[name="formname"]').val() === "test" ){            
        
        
        
      }else{
        // $(".overlay").fadeOut();
        // $('html').addClass('stop');
        // $("#modal-thank").fadeIn();

      }
      $.ajax({
        url: action,
        type: 'POST',
        contentType: false, 
        processData: false, 
        data: fd,
        success: function(msg){
        
			window.location.href = $('.thank-url').val();
          formThis.find('.btn').removeAttr('disabled');
          $('form').trigger('reset');

        }

      });
    });
 });


 function simulate(element, eventName)
  {
    var options = extend(defaultOptions, arguments[2] || {});
    var oEvent, eventType = null;

    for (var name in eventMatchers)
    {
      if (eventMatchers[name].test(eventName)) { eventType = name; break; }
    }

    if (!eventType)
      throw new SyntaxError('Only HTMLEvents and MouseEvents interfaces are supported');

    if (document.createEvent)
    {
      oEvent = document.createEvent(eventType);
      if (eventType == 'HTMLEvents')
      {
        oEvent.initEvent(eventName, options.bubbles, options.cancelable);
      }
      else
      {
        oEvent.initMouseEvent(eventName, options.bubbles, options.cancelable, document.defaultView,
          options.button, options.pointerX, options.pointerY, options.pointerX, options.pointerY,
          options.ctrlKey, options.altKey, options.shiftKey, options.metaKey, options.button, element);
      }
      element.dispatchEvent(oEvent);
    }
    else
    {
      options.clientX = options.pointerX;
      options.clientY = options.pointerY;
      var evt = document.createEventObject();
      oEvent = extend(evt, options);
      element.fireEvent('on' + eventName, oEvent);
    }
    return element;
  }

  function extend(destination, source) {
    for (var property in source)
      destination[property] = source[property];
    return destination;
  }

  var eventMatchers = {
    'HTMLEvents': /^(?:load|unload|abort|error|select|change|submit|reset|focus|blur|resize|scroll)$/,
    'MouseEvents': /^(?:click|dblclick|mouse(?:down|up|over|move|out))$/
  }
  var defaultOptions = {
    pointerX: 0,
    pointerY: 0,
    button: 0,
    ctrlKey: false,
    altKey: false,
    shiftKey: false,
    metaKey: false,
    bubbles: true,
    cancelable: true
  }





$("input[name='qw7']").on('change, input', function() {

  if($(this).hasClass('ws')){
    $('.inp-enp-ph').attr('placeholder', 'Ваш телефон в WhatsApp');
    $('.eml').hide();
  }else if($(this).hasClass('vb')){
    $('.inp-enp-ph').attr('placeholder', 'Ваш телефон в Viber');
    $('.eml').hide();
  }else if($(this).hasClass('tg')){
    $('.inp-enp-ph').attr('placeholder', 'Ваш телефон в Telegram');
    $('.eml').hide();
  }else if($(this).hasClass('mas')){
    $('.inp-enp-ph').attr('placeholder', 'Ваш телефон ');
    $('.eml').fadeIn();
  }

});