function toggle_menu() {
	// body...
	$('._menu').toggle("slide");
}
function hidden(){
	$(".login_form").hide();
	$(".signup_form").hide();
	$(".login_btn").removeClass('active');
	$(".signup_btn").removeClass('active');
}
function show_form(form_name,btn_name){
	hidden();
	$(form_name).show();
	$(btn_name).addClass('active');
}
function login(){
	var login_form=document.getElementById('login_form');
	var username=login_form.email.value;
	var password=login_form.password.value;
	console.log(username,password);
      $.ajax({

            url: "http://localhost:5000/login",
            data:JSON.stringify({"username":username,'password':password}),
            contentType: "application/json",
            
            headers: { 'Access-Control-Allow-Origin': '*' },
            type: 'POST',
            crossDomain: true,
            dataType: 'json',
                     }) .done(function (json){
                        console.log(json['response']);
                        if(json['response']){
                            sessionStorage.setItem('username', username);
                            sessionStorage.setItem('password', password);
                            sessionStorage.setItem('userId',json['userId']);
                            sessionStorage.setItem('token',json['token']);
                            window.location="/ecommerce/ui/"+json['url'];
                        }
                        else alert(json['message']);
            
        }).fail(function(xhr,status,errorThrow){
          console.log('error'+errorThrow)
        });
}
function signup(){
	var signup_form=document.getElementById('signup_form');
	var name=signup_form.name.value;
	var email=signup_form.email.value;
	var password=signup_form.password.value;
	$.ajax({

            url: "http://localhost:5000/signup",
            data:JSON.stringify({"name":name,"email":email,"password":password}),
            contentType: "application/json",
            headers: { 'Access-Control-Allow-Origin': '*' },
            type: 'POST',
            crossDomain: true,
            dataType: 'json',
        }) .done(function (json){
            console.log(json,json['response'],json['message'],typeof(json));
            if(json['response']==1){
                alert('success');
                show_form('.login_form','.login_btn');
            }
            else{
                alert('error');
                console.log(json['message']);
            }
            
        }).fail(function(xhr,status,errorThrow){
          console.log('error'+errorThrow)
        });
	 
  }