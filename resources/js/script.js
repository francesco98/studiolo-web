$(function($) {
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

  // Closes responsive menu when a scroll trigger link is clicked
  $(".js-scroll-trigger").click(function() {
    $(".navbar-collapse").collapse("hide");
  });

  //gestione click per modificare articolo
  $("#editOp").click(function() {
    articleFormPost("Sicuro di voler modificare l'articolo?", "edit");
  });

  //gestione click per eliminare articolo
  $("#deleteOp").click(function() {
    articleFormPost("Sicuro di voler eliminare l'articolo?", "delete");
  });

  $("#op").ready(function() {
    //get del tipo di op 
    var op = $("#op").val();
    //controllo il tipo di op
    if (op == "delete") {
      articleFormPost("Sicuro di voler eliminare l'articolo?", "delete");
    }
  });

  //gestione del form post riguardo l articolo
  function articleFormPost(message, which) {
    var result = confirm(message);
    //controllo sul result
    if (result) {
      var input = $("<input>")
        .attr("type", "hidden")
        .attr("name", "which")
        .val(which);
      $("#articleForm").append($(input));
      $("#articleForm").submit();
    }
  }

  //var utili per il cechk dei campi
  var checkEmail = false;
  var checkName = false;
  var checkMessage = false;

  //function per disbilitare o abilitare il button di invio
  function check() {
    if (checkEmail && checkName && checkMessage) {
      //abilito il button
      $("#send").prop("disabled", false);
    } else {
      //disabilito il button
      $("#send").prop("disabled", true);
    }
  }

  //controllo sul messagge dell email form
  $("#inputEmail1").keyup(function() {
    //get del lenght della email
    var input = $("#inputEmail1").val();
    //regex per controllo valida email
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (regex.test(input)) {
      //nascondo errore
      $("#error_email").hide();
      checkEmail = true;
    } else {
      //mostro errore
      $("#error_email").show();
      checkEmail = false;
    }
    //disabilito o abilito il button
    check();
  });

  //controllo sul name del contact form
  $("#inputName").keyup(function() {
    //get del lenght del nome
    var input = $("#inputName").val().length;
    //contorllo lunghezza campo
    if (input >= 3 && input < 50) {
      //nascondo errore
      $("#error_name").hide();
      checkName = true;
    } else {
      //mostro errore
      $("#error_name").show();
      checkName = false;
    }
    //disabilito o abilito il button
    check();
  });

  //controllo sul messagge del contact form
  $("#inputMessage").keyup(function() {
     //get del lenght del text
    var text = $("#inputMessage").val().length;
    //contorllo lunghezza campo
    if (text >= 3 && text < 500) {
      //nascondo errore
      $("#error_message").hide();
      checkMessage = true;
    } else {
      //mostro errore
      $("#error_message").show();
      checkMessage = false;
    }
    //disabilito o abilito il button
    check();
  });
});
