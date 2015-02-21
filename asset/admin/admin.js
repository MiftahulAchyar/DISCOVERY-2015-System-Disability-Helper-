$(document).ready(function() {
var page = $('#page-wrapper');

	$('#pelatihan').click(function(){
		$.ajax({
			url:<?= base_url()."i_boy/boy/show_pelatihan"?>,
			beforeSend:,
			success:function(html){
				page.html(html);
			}
		});
	});
});