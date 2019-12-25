<style>
  .back-to-top {
    cursor: pointer;
    position: fixed;
    bottom: 100px;
    right: 20px;
    display: none;
  }
</style>
<a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"
  title="Click to return on the top page" data-toggle="tooltip" data-placement="left">
  <span class="fas fa-chevron-up"></span>
</a>
<script>
	
	$(document).ready(function () {
	    $(window).scroll(function () {
	        if ($(this).scrollTop() > 50) {
	            $('#back-to-top').fadeIn();
	        } else {
	            $('#back-to-top').fadeOut();
	        }
	    });
	    // scroll body to 0px on click
	    $('#back-to-top').click(function () {
	        $('#back-to-top').tooltip('hide');
	        $('body,html').animate({
	            scrollTop: 0
	        }, 800);
	        return false;
	    });

	    $('#back-to-top').tooltip('show');

	});
</script>