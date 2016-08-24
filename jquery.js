	
	$(document).ready(function(){
		
	$('select.div-toggler').change(function(){
    var target = $(this).data('target');
    $(target).children().addClass('hide');
    var show = $("option:selected", this).data('show');
    $(show).removeClass('hide');
});
});