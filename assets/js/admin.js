(function($){
	$(document).ready(function(){

		$("#post-formats-select .post-format").on("click", function(){

			if($(this).attr("id") == "post-format-image"){
				$("#_mamurjor_device_info").show();
			}
			
			else{
				$("#_mamurjor_device_info").hide();
			}

		});

		if(admin_pf.format != "image"){
			$("#_mamurjor_device_info").hide();
		}

	});

})(jQuery);