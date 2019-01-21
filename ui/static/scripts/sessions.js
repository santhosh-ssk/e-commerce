$(document).ready(function (argument) {
	let username = sessionStorage.getItem('username');
	let password = sessionStorage.getItem('password');
	let userId=sessionStorage.getItem('userId');
	if(username==null || password==null){
		alert('Unauthorized access');
		window.location="/ecommerce/ui/";
	}
	$("#username").val(username);
	$("#password").val(password);
	$('#userId').val(userId);
});
function logout(){
	// Remove all saved data from sessionStorage
	sessionStorage.clear();
	window.location="/ecommerce/ui/";
}