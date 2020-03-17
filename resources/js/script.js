(function($) {
  "use strict"; // Start of use strict

  // Smooth scrolling using jQuery easing
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (
      location.pathname.replace(/^\//, "") ==
        this.pathname.replace(/^\//, "") &&
      location.hostname == this.hostname
    ) {
      var target = $(this.hash);
      target = target.length ? target : $("[name=" + this.hash.slice(1) + "]");
      if (target.length) {
        $("html, body").animate(
          {
            scrollTop: target.offset().top - 48
          },
          1000,
          "easeInOutExpo"
        );
        return false;
      }
    }
  });

  // Closes responsive menu when a scroll trigger link is clicked
  $(".js-scroll-trigger").click(function() {
    $(".navbar-collapse").collapse("hide");
  });

  // Activate scrollspy to add active class to navbar items on scroll
  $("body").scrollspy({
    target: "#mainNav",
    offset: 54
  });

  $("#editOp").click(function() {
    articleFormPost("Sicuro di voler modificare l'articolo?", "edit");
  });

  $("#deleteOp").click(function() {
    articleFormPost("Sicuro di voler eliminare l'articolo?", "delete");
  });

  $("#op").ready(function() {
    var op = $("#op").val();

    if (op == "delete") {
      articleFormPost("Sicuro di voler eliminare l'articolo?", "delete");
    }
  });

  function articleFormPost(message, which) {
    var result = confirm(message);

    if (result) {
      var input = $("<input>")
        .attr("type", "hidden")
        .attr("name", "which")
        .val(which);
      $("#articleForm").append($(input));

      $("#articleForm").submit();
    }
  }

  var checkEmail = false;
  var checkName = false;
  var checkMessage = false;

  function check (){
    if(checkEmail && checkName && checkMessage){
      $("#send").prop('disabled', false);
    }
  }

  $("#inputEmail1").keyup(function(){
    var input = $("#inputEmail1").val().length;
    if(input >= 3 && input < 50){
      $("#error_email").hide();
      checkEmail = true;
    }
    else{
      $("#error_email").show();
      checkEmail = false;
    }
    check();
  });
  
  $("#inputName").keyup(function(){
    var input = $("#inputName").val().length;
    if(input >= 3 && input < 50){
      $("#error_name").hide();
      checkName = true;
    }
    else{
      $("#error_name").show();
      checkName = false;
    }
    check();
  });

  $("#inputMessage").keyup(function(){
    var text = $("#inputMessage").val().length;
    if(text >= 3 && text < 150){
      $("#error_message").hide();
      checkMessage = true;
    }
    else{
      $("#error_message").show();
      checkMessage = false;
    }
    check();
  });

  // Collapse Navbar
  var navbarCollapse = function() {
    if (!$("#mainNav").hasClass("no-scroll")) {
      if ($("#mainNav").offset().top > 100) {
        $("#mainNav").addClass("navbar-shrink");
      } else {
        $("#mainNav").removeClass("navbar-shrink");
      }
    }
  };
  // Collapse now if page is not at top
  navbarCollapse();
  // Collapse the navbar when page is scrolled
  $(window).scroll(navbarCollapse);
})(jQuery); // End of use strict
