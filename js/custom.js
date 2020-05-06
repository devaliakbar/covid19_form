(function ($) {

  
  $(window).scroll(function(){
    windowHeight = $(document).height();
    console.log(windowHeight);
  });
  // Navbar
  var allPanels = $(".dropdown > ul").hide();

  $(".dropdown > a").click(function () {
    $(this)
      .parents(".dropdown")
      .siblings(".dropdown")
      .removeClass("active")
      .children(".dropdown-menu")
      .slideUp();

    if ($(this).parents(".dropdown").hasClass("active")) {
      $(this)
        .parent()
        .removeClass("active")
        .children(".dropdown-menu")
        .slideUp();
    } else {
      $(this)
        .parent()
        .addClass("active")
        .children(".dropdown-menu")
        .slideDown();
    }
  });

  $(".sidenav-toggler-inner").click(function () {
    if (openedNav == 1) {
      setCookie("navigationBar", false);
      openedNav = 0;
      $("header nav").removeClass("pinned");
      $("main").removeClass("navPinned");
    } else {
      setCookie("navigationBar", true);
      openedNav = 1;
      $("header nav").addClass("pinned");
      $("main").addClass("navPinned");
    }
  });

  $("header nav").mouseenter(function () {
    $("header nav").removeClass("collapsed");
  });
  $("header nav").mouseleave(function () {
    if (!(openedNav == 1)) $("header nav").addClass("collapsed");
  });

  /*************************/

  // Resizable table width

  $("table.resizable").resizableColumns();

  /************************/

  //Table filter button
  $(".data-table th.filter").append("<button class='filter_btn'></button>");
  $(".data-table th.filter .filter_btn").click(function () {
    $(".data-table th.filter .filter_btn").removeClass("active");
    $(this).addClass("active");
    $(this).toggleClass("asc");
  });

  /************************/

  //Diffrent 'Search by date' types\\
  $(".search-by-date").addClass("single");

  $(".search-by-date select").on("change", function () {
    var val = $(this).val();
    var targetInput = $(".search-by-date #single");

    if (val == "between") {
      $(".search-by-date").addClass("between");
      $(".search-by-date").removeClass("single");
    } else {
      $(".search-by-date").removeClass("between");
      $(".search-by-date").addClass("single");
    }

    switch (val) {
      case "month":
        targetInput.prop("type", "month");
        break;

      default:
        targetInput.prop("type", "date");
    }
  });

  //DatePicker
  $(".diary-date #date").datepicker("pick", true);

  $(".diary-date #yest").click(function () {
    var date_new = $("#date").datepicker("getDate");
    date_new.setDate(date_new.getDate() - 1);
    $("#date").datepicker("setDate", date_new);
  });

  $(".diary-date #tom").click(function () {
    var date_new = $("#date").datepicker("getDate");
    date_new.setDate(date_new.getDate() + 1);
    $("#date").datepicker("setDate", date_new);
  });

  // $(".searchbox .form-additional").hide();

  // $(".searchbox .form-inline.main input").focus(function () {
  //   $(this).parent().slideUp();
  //   $(".searchbox .form-additional").slideDown();
  // });

  if ($("main").hasClass("login-page")) {
    $("header").hide();
  }

  // Add list
  $(".add-group button").click(function(){
    var content =  $(this).siblings("input").val();
    $(this).parent().siblings(".add-list").append("<div class='item'>"+content+"<span class='close'>X<span/></div>");
  })
  $(document).on('click','.close',function(){
    $(this).parent().remove();
  });

})(jQuery);

var openedNav = 0;

function showLoader() {
  $(".loader").fadeIn();
}

function hideLoader() {
  $(".loader").fadeOut();
}
