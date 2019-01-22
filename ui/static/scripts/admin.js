
function manageshops(){
	var username=$('#username').val();
	var password=$('#password').val();
	var url="http://localhost:5000/admin/"+$('#userId').val()+"/shops";
	$.ajax({
	    type: "GET",
	    url: url,
	    dataType: 'json',
	    async: false,
	    data: '{}',
	    beforeSend: function (xhr){ 
	        xhr.setRequestHeader('Authorization', 'Bearer ' + sessionStorage.getItem('token')); 
	    },
	    success: function (json){
	        console.log(json); 
	        var shops="";
        for(var i=0;i<json.length;i++){
            var footer_class='progress';
            if(json[i]['status']=='Authorized')
                footer_class='active';
            else if(json[i]['status']=='Unauthorized')
                footer_class='danger';
            else
                footer_class='info';
            shops+='<div class="flip-card"><div class="flip-card-inner"><div class="flip-card-front">';
            shops+='<h1>'+json[i]['ShopName']+'</h1><p>'+json[i]['description']+'</p><p class="userdetail"><b>Added by</b><br>&emsp;'+json[i]['name']+'<br>&emsp;<i class="far fa-envelope"></i> '+json[i]['email']+'</p></div>';
            shops+=' <div class="flip-card-back"><h2>Address</h2><p>Block #: <span>'+json[i]['block_name']+'</span><br>Street : <span>'+json[i]['street_name']+'</span><br>Area: <span>'+json[i]['area']+'</span><br>Pincode: <span>'+json[i]['pincode']+'</span></p><div class="phone-footer"><i class="fas fa-mobile-alt"></i> '+json[i]['phone']+'</div></div>';
            shops+='</div><div class="footer '+footer_class+'"><b>Status:</b>&emsp;'+json[i]['status']+'<br><div class="group"><button class="positive">Approve</button><button class="negative">Reject</button></div></div></div>'
        }
        $('#manageshops').html(shops);

	    }
	});

	/*$.(url,{},function(json){
        console.log(json);
        var shops="";
        for(var i=0;i<json.length;i++){
            var footer_class='progress';
            if(json[i]['status']=='Authorized')
                footer_class='active';
            else if(json[i]['status']=='Unauthorized')
                footer_class='danger';
            else
                footer_class='info';
            shops+='<div class="flip-card"><div class="flip-card-inner"><div class="flip-card-front">';
            shops+='<h1>'+json[i]['name']+'</h1><p>'+json[i]['description']+'</p><div class="footer '+footer_class+'"><b>Status:</b>&emsp;'+json[i]['status']+'</div></div>';
            shops+=' <div class="flip-card-back"><h2>Address</h2><p>Block #: <span>'+json[i]['block_name']+'</span><br>Street : <span>'+json[i]['street_name']+'</span><br>Area: <span>'+json[i]['area']+'</span><br>Pincode: <span>'+json[i]['pincode']+'</span></p><div class="footer"><i class="fas fa-mobile-alt"></i> '+json[i]['phone']+'</div></div>';
            shops+='</div></div></div>'
        }
        $('#shopviews').html(shops);
    });*/
}