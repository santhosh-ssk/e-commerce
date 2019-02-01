
function manageshops(){
	var url = "http://localhost/ecommerce/Server/public/admin/" + sessionStorage.getItem('userId') + "/shop";
    var token = 'Bearer ' + sessionStorage.getItem('token');
    $.ajax({
            url: url,
            data:JSON.stringify({}),
            contentType: "application/json",
            headers: { 'Authorization': token},
            type: 'GET',
            crossDomain: true,
            dataType: 'json',
                     }) .done(function (json){
                    console.log(json); 
                    json = json['data'];
                    var shopcardsTemplates = $('#shopcards').html();
                    json = {"shops":json};
                    var results = Mustache.render(shopcardsTemplates, json); 
                    $('.manageshops').html(results);
                    
        }).fail(function(xhr, status, errorThrow){
          console.log('error' + errorThrow)
        });

}

function authorizeShop(value){
    console.log(value, typeof(value));
    url = "http://localhost/ecommerce/Server/public/admin/" + $('#userId').val() + "/shops";
    $.ajax({
            url: url,
            data:JSON.stringify({}),
            contentType: "application/json",
            headers: { 'Authorization': token },
            type: 'PUT',
            crossDomain: true,
            dataType: 'json',
        }) .done(function (json){
            console.log(json); 
                    
        }).fail(function(xhr, status, errorThrow){
          console.log('error'+ errorThrow)
        });

    /*$.ajax({
            url: url,
            data:JSON.stringify({}),
            contentType: "application/json",
            headers: { 'Authorization': token },
            type: 'PUT',
            crossDomain: true,
            dataType: 'json',
        }) .done(function (json){
            console.log(json); 
                    
        }).fail(function(xhr, status, errorThrow){
          console.log('error'+ errorThrow)
        });*/


}