$(document).ready(function () {
  screenChange();
  


  function screenChange() {
    window.onscroll = function () {
      var scrollHeight, totalHeight;
      scrollHeight = document.body.scrollHeight;
      totalHeight = window.scrollY + window.innerHeight;

      if (totalHeight >= scrollHeight) {
        $(".fixed-bottom").slideDown("fast", function () {
          $(".fixed-bottom").removeClass("d-none");
        });

      }
      else {
        $(".fixed-bottom").slideUp("fast", function () {
          $(".fixed-bottom").removeClass("d-none");
        });
        // $(".fixed-bottom").addClass("d-none");
      }
    }
    $(window).resize(function () {
      var scrollHeight, totalHeight;
      scrollHeight = document.body.scrollHeight;
      totalHeight = window.scrollY + window.innerHeight;

      if (totalHeight >= scrollHeight) {
        $(".fixed-bottom").slideDown("fast", function () {
          $(".fixed-bottom").removeClass("d-none");
        });

      }
      else {
        $(".fixed-bottom").slideUp("fast", function () {
          $(".fixed-bottom").removeClass("d-none");
        });
        // $(".fixed-bottom").addClass("d-none");
      }
    });
  }

});