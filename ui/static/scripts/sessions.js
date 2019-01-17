$(document).ready(function (argument) {
	let username = sessionStorage.getItem('username');
	let password = sessionStorage.getItem('password');
	if(username==null || password==null){
		alert('Unauthorized access');
		window.location="/ecommerce/ui/";
	}
	$("#username").val(username);
	$("#password").val(password);
});
function logout(){
	// Remove all saved data from sessionStorage
	sessionStorage.clear();
	window.location="/ecommerce/ui/";
}