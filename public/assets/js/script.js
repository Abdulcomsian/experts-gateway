let count=2;
$(".nav-pills li").click(function(){
  $('.nav-pills li').removeClass("active");
  $(this).addClass("active")
})
$(".tabNextBtn").click(function(){
  var currentActive = $('.nav-pills li.active'); // get current active
  var currentTabContent = $(".tab-content .tab-pane.show.active.in");
  currentTabContent.removeClass("show")
  currentTabContent.removeClass("active")
  currentTabContent.removeClass("in")
  currentActive.removeClass('active'); // remove class active
  currentTabContent.next('.tab-content .tab-pane').addClass('active')
  currentTabContent.next('.tab-content .tab-pane').addClass('show')
  currentTabContent.next('.tab-content .tab-pane').addClass('in')
  currentActive.next('.nav-pills li').addClass('active'); // otherwise add active to next li
})
$(".userProfile").click(function(){
  if($(".dropDownMenu").css("opacity")==0){
    $(".dropDownMenu").css("opacity","1");
    $(".dropDownMenu").css("z-index","99")
  } else{
    $(".dropDownMenu").css("opacity","0");
    $(".dropDownMenu").css("z-index","0")
  }
})
$(".nextBtn").click(function(){
  count=count+1;
  console.log(count)
  if(count==3){
    $(".firstStep").css("display","none")
    $(".secondStep").css("display","block")
  }
  else if(count==4){
    $(".secondStep").css("display","none")
    $(".thirdStep").css("display","block")
    $(".paymentBtn").css("display","block")
    $("button.nextBtn").css("display","none")
  }
  window.scrollTo({top: 0, behavior: 'smooth'});
  var current= $('.serviceBuy .staper .listDiv li.active');
  current.addClass("complete")
  setInterval(() => {
    current.removeClass("complete")
    current.addClass("afterComplete")
  }, 2000);
  var next = $('.serviceBuy .staper .listDiv li.active').removeClass('active').next('li');
  if (!next.length) next = next.prevObject.siblings(':first');
  next.addClass('active');
})
$('.creditCardText').keyup(function() {
  var foo = $(this).val().split("-").join(""); // remove hyphens
  
  if($(this).val()<=16){
    if (foo.length > 0) {
      foo = foo.match(new RegExp('.{1,4}', 'g')).join("-");
      
    }
    $(this).val(foo);
  } else{
    
  }
  
});
$(".serviceSlider").slick({
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 1,
  arrows: true,
  autoplay:true,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
      },
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ],
});
$(".expertSlider").slick({
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  arrows: true,
  autoplay:true,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
      },
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ],
});
$(".priceService").slick({
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  arrows: true,
  autoplay:true,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
      },
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ],
});
$(".newsSlider").slick({
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  arrows: true,
  autoplay:true,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
      },
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ],
});
$(".recentBlogSlider").slick({
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  arrows: true,
  autoplay:true,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
      },
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
  ],
});
$(".fixedServiceSliderDiv").slick({
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  arrows: true,
  autoplay:true,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
      },
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
  ],
});
$(".orderSection .tabDiv ul li").click(function () {
  $(".orderSection .tabDiv ul li").removeClass("active");
  $(this).addClass("active");
});
var input = document.querySelector("#phone");
window.intlTelInput(input, {
  separateDialCode: true,
});
$(document).ready(function () {
  $(".js-example-basic-multiple").select2();
 
});
