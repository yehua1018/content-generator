$(document).ready(function(){

	// Print list of Optimized URLs
	$('input[name="template_url"]').each(function(){
		var optimized_urls = $(this).val();
		$('#optimized_urls').append(optimized_urls + '\n')

	});


	$('#hideInput').click(function(){
		$('#input').fadeToggle('fast');
	});





	$('.release-update h4').click(function(){
	    $(this).siblings().slideToggle();
	});

	$('select.client-hubs').change(function () {
		$('.client').hide();

		$('select.client-hubs option:selected').each(function () {
			//get the class name as thisClass
			thisClass = $(this).attr('value');

		});
			$("." + thisClass).show();
		})
	.change();


	// $('.service-area').click(function(){
	// 		$(this).siblings().attr('checked', 'checked');
	// });


    $('.service-area:button').toggle(function(){
        $(this).siblings('input').attr('checked','checked');
        $(this).val('Uncheck all');
    },function(){
        $(this).siblings('input').removeAttr('checked');
        $(this).val('Check all');        
    });


		$('#output input, #output textarea').click(function(){
		    $(this).select();
		});

});