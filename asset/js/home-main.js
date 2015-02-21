$(document).ready(function(){
 morning();

cloud();
cloud2();
var cloudmove = 0;
var cloudmove2 = 0;
var gerak1 = 1380;
var wengi = 'url("http://localhost/i_boy/asset/img/icon/night.jpg")';
// function plane () {
// 		$('#plane').css({'background-position':gerak1+'px 0px'});
// 	if (gerak1>=(-100)) {
// 		gerak1--;
// 	}
// 	else{
// 			gerak1 = 1380;}
// 	setTimeout(function(){
// 		plane();
// 	},5);
// }
// // plane();
//  function evening () {
//  	$('.sky').css({'background-color':'orange', 'box-shadow':'inset -25px 197px 185px rgb(62, 28, 11)'});
//  	setTimeout(function(){
//  	night();}, 15000);
//  }

function cloud (){
	cloudmove++;
	$("#cloud1").css("background-position",cloudmove+"px 100%");
	setTimeout(function(){
		cloud();
	},50);
}

function cloud2 (){
	cloudmove2+=5;
	$("#cloud2").css("background-position",cloudmove2+"px 70%");
	setTimeout(function(){
		cloud2();
	},20);
}

 function night () {
 	$('.sky').css({'background-image':wengi, 'background-size':'100% 100%', 'background-color':'black', 'box-shadow':'none', 'background-repeat':'no-repeat', 'background-position':'100% 100%' });
	setTimeout(function(){
	 morning();
	}, 15500);
 }
function morning () {
 	$('.sky').css({'background':'#45E9F2', 'background-image':wengi, 'box-shadow':'inset 1px -1090px 104px rgb(68, 183, 181)','background-size':'100% 100%', 'background-position':'100% 100%'});
	setTimeout(function(){
	night();}, 15500);
}

});