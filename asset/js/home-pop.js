
$(document).ready(function(){

	function sembunyi(){
		$('.popup').animate({'top':'-20px', 'z-index':'0', height:'0'}, 400);
		$('.popup .front').animate({'top':'-20p', 'opacity':'0', 'z-index':'0',}, 400);
		$('.popup .back').animate({opacity:'0', 'z-index':'0', height:'0'},400); 
	}
	function tampil(){
		$('.popup').animate({'top':'0', 'z-index':'100', height:'100%'}, 400);
		$('.popup .front').animate({'top':'0', 'opacity':'103', 'z-index':'4', 'height':'100%'}, 400);
		// $('.popup .back').animate({opacity:'0.5', 'z-index':'101', height:'100%'},400);
	}

	$('.tombol').click(function(){
		tampil();
	});

	$('.popup .back').click(function(){ sembunyi();});
	$('.popupclose').click(function(){ sembunyi();});

});