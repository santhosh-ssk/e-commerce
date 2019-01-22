function registerShop(event){
	var form=document.getElementById('shop_form');
	var shopName=form.name.value;
	var shopPhoneNO=form.phone.value;
	var shopDescription=form.description.value;
	var block=form.block.value;
	var street=form.street.value;
	var area=form.area.value;
	var pincode=form.pincode.value;
	var userId=$('#userId').val();

	//console.log(form,shopName,shopPhoneNO);
	var url="http://localhost:5000/user/shop";
	$.ajax({

            url: url,
            data:JSON.stringify({
            	"userId":userId,
            	"shopName":shopName,
            	"shopPhoneNO":shopPhoneNO,
            	"shopDescription":shopDescription,
            	"block":block,
            	"area":area,
            	"street":street,
            	"pincode":pincode
            }),
            contentType: "application/json",
            headers: { 'Access-Control-Allow-Origin': '*' },
            type: 'POST',
            crossDomain: true,
            dataType: 'json',
        }) .done(function (json){
            console.log(json);
            if(json['response']==1){
                alert('Registered');
            }
            else{
                alert('error');
                
            }
            $('#shop_form').trigger('reset');
            
        }).fail(function(xhr,status,errorThrow){
          console.log('error'+errorThrow)
        });

	return false;
}

function viewShops(userId){
    console.log(userId);
    var url="http://localhost:5000/user/"+userId+"/shop";
    $.get(url,{},function(json){
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
    });


}
