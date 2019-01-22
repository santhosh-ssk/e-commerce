$(document).ready(function (argument) {
	let username = sessionStorage.getItem('username');
	let password = sessionStorage.getItem('password');
	let userId=sessionStorage.getItem('userId');
	let token=sessionStorage.getItem('token');
	if(username==null || password==null || token==null){
		alert('Unauthorized access');
		window.location="/ecommerce/ui/";
	}
	$("#username").val(username);
	$("#password").val(password);
	$('#userId').val(userId);
	$('#token').val(token);
});
function logout(){
	// Remove all saved data from sessionStorage
	sessionStorage.clear();
	window.location="/ecommerce/ui/";
}