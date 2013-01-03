<script type="text/javascript">
$(document).ready(function() {
	$('#main_slider').anythingSlider({
		delay : 5000,
		changeBy : 1,
		buildArrows : true,
		toggleArrows : false,
		enableNavigation : false,
		buildStartStop : false,
		pauseOnHover : true,
		stopAtEnd : false,
		hashTags : false,
		infiniteSlides : true,
		toggleControls : false,
		autoPlay : false 
	});

$.fn.ToggleInputValue = function(){
    return $(this).each(function(){
        var Input = $(this);
        var default_value = Input.val();

        Input.focus(function() {
           if(Input.val() == default_value) Input.val("");
        }).blur(function(){
            if(Input.val().length == 0) Input.val(default_value);
        });
    });
};
$(document).ready(function(){
    $('input.form-text').ToggleInputValue();
	$('textarea.form-textarea ').ToggleInputValue();
});	
	
	
	
});

</script>
<div id="page-wrapper">
	<div id="page">

		<?php include('header.php');?>

		<?php if ($messages): ?>
			<div id="messages"><div class="section clearfix">
			  <?php print $messages; ?>
			</div></div> <!-- /.section, /#messages -->
		<?php endif; ?>

		<?php include('main.php');?>

		

		<?php include('footer.php');?>

	</div>
</div> <!-- /#page, /#page-wrapper -->
