jQuery(document).ready(function() {
	var timeout = null;
	
	jQuery('#askquestion_input').live('keyup',function() {
			clearTimeout(timeout);
			timeout = setTimeout(makesearchreq,400);
		});
		
	function makesearchreq() {
		var input = jQuery('#askquestion_input').val();
		
		jQuery.get("/midtlink_suggest_entries?keys="+input,
			function(data) {
					if(data.num > 0) {
						jQuery('#livelist').empty();
						jQuery('#liveresult').hide();
						jQuery.each(data.results, function(index,val) {
								jQuery('#livelist').append('<li><a href="'+val.link+'">'+val.title+'</a><small>'+val.snippet+'</small></li>');
						});
						jQuery('#liveresult').fadeIn('fast');
					}
					else { 
						//alert('no result');
					}
			});
		
	}
	
});
