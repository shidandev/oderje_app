$(document).ready(function () {
  screenChange();
  var paging = 1;
  var row_count = 0;
  var prod_count = 0;

  //testing unit logic ^_^
  var setView = 0;
  prod_count = 5;
  for (var i = 0; i < prod_count; i++) {
    if (i % 4 == 0) //create div row that hold 4 view of product card
    {
      setView = row_count;
      var html = '<div class="row ' + row_count + '"></div>';
      $(".parent").append(html);
      row_count++;
    }

    var temp = new Product(1);
    $(".row." + setView).append(temp.productView());

  }
  //end unit logic

  $.post("https://app.oderje.com/api/product", { function: get_list }, function (data) {

    prod_count = data.list.length;

    // var setView = 0;
    // prod_count =20;
    // for(var i = 0 ; i < prod_count; i++)
    // {
    //   if(i%4 == 0) //create div row that hold 4 view of product card
    //   {
    //     setView = row_count;
    //     var html = '<div class="row '+row_count+'"></div>';
    //     $(".parent").append(html);
    //     row_count++;
    //   }

    //   var temp = new Product(1);
    //   $(".row."+setView).append(temp.productView());

    // }

  }, "json");


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