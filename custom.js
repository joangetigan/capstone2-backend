$(document).ready(function(){

$('.openbtn').click( function(){
	$("#mySidenav").css("width","250px");
	$('body').css("background-color","rgba(0,0,0,0.4)");
})
$('.closebtn').click( function(){
	$("#mySidenav").css("width","0");
	$('body').css("background-color","white");
})

});


