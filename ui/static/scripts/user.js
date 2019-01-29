function registerShop(event){
	var form  = document.getElementById('shop_form');
	var shopName   = form.name.value;
	var shopPhoneNO = form.phone.value;
	var shopDescription = form.description.value;
	var block = form.block.value;
	var street = form.street.value;
	var area = form.area.value;
	var pincode = form.pincode.value;
	var userId = sessionStorage.getItem('userId');

	//console.log(form,shopName,shopPhoneNO);
	var url="http://localhost/ecommerce/Server/public/user/shop";
	$.ajax({

            url: url,
            data:JSON.stringify({
            	"userId": userId,
            	"shopName": shopName,
            	"shopPhoneNO": shopPhoneNO,
            	"shopDescription": shopDescription,
            	"block": block,
            	"area": area,
            	"street": street,
            	"pincode": pincode
            }),
            contentType: "application/json",
            headers: { 'Access-Control-Allow-Origin': '*' },
            type: 'POST',
            crossDomain: true,
            dataType: 'json',
        }) .done(function (json){
            console.log(json);
            if(json['response'] == 1){
                alert('Registered');
                viewShops();
            }
            else{
                alert('error');
                
            }
            //$('#shop_form').trigger('reset');
            
        }).fail(function(xhr, status, errorThrow){
          console.log('error' + errorThrow)
        });

	return false;
}

function viewShops(){
    var url = "http://localhost:5000/user/"+sessionStorage.getItem('userId')+"/shop";
    var url = "http://localhost/ecommerce/Server/public/user/"+sessionStorage.getItem('userId')+"/shop";

    $.get(url, {}, function(json){
        console.log(json);
        if(json['response']==1){
            var shopcardsTemplates = $('#shopcards').html();
            var shops={
                "shops": json['data']
            };
            var result=Mustache.render(shopcardsTemplates, shops);
            //console.log("result",result);
            $('.shopviews').html(result);
        }
    });

}

function deleteShop(object){
    var shopid = $(object).parent().parent().attr('id');
    shopid     = shopid.slice(4);
    var choice = window.confirm("Do you want to delete this shop");
    var url    = "http://localhost:5001/user/"+sessionStorage.getItem('userId')+"/shop/"+shopid;
    var token  = sessionStorage.getItem('token');

    if(choice){
        $.ajax({

            url: url,
            data:JSON.stringify({}),
            contentType: "application/json",
            
            headers: { 'Authorization': token },
            type: 'DELETE',
            crossDomain: true,
            dataType: 'json',
                     }) .done(function (json){
                        console.log(json);
                        if(json['response']==1){
                            $(object).parent().parent().remove();
                            viewShops();
                        }
        }).fail(function(xhr, status, errorThrow){
          console.log('error' + errorThrow)
        });
    }
}
