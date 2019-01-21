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
    });

}