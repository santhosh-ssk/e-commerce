
function manageshops(){
	var username = $('#username').val();
	var password = $('#password').val();
	var url = "http://localhost:5000/admin/" + $('#userId').val() + "/shops";
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
                    var shops="";
                    for(var i=0; i<json.length; i++){

                        var footer_class = 'progress';
                        
                        if( json[i]['status'] == 'Authorized' ){
                            footer_class = 'active';
                        }

                        else if( json[i]['status'] == 'Unauthorized' ){
                            footer_class = 'danger';
                        }

                        else{
                            footer_class = 'info';
                        }

                        shops += '<div class="flip-card"><div class="flip-card-inner"><div class="flip-card-front">';
                        shops += '<h1>'+ json[i]['ShopName'] + '</h1><p>' + json[i]['description'] + '</p><p class="userdetail"><b>Added by</b><br>&emsp;' + json[i]['name'] + '<br>&emsp;<i class="far fa-envelope"></i> ' + json[i]['email'] + '</p></div>';
                        shops += ' <div class="flip-card-back"><h2>Address</h2><p>Block #: <span>' + json[i]['block_name' ] + '</span><br>Street : <span>' + json[i]['street_name'] + '</span><br>Area: <span>' + json[i]['area'] + '</span><br>Pincode: <span>' + json[i]['pincode'] + '</span></p><div class="phone-footer"><i class="fas fa-mobile-alt"></i> ' + json[i]['phone'] + '</div></div>';
                        shops += '</div><div class="footer ' + footer_class + '"><b>Status:</b>&emsp;' + json[i]['status'] + '<br><div class="group"><button class="positive" onclick ="authorizeShop(1)">Approve</button><button class="negative" onclick ="authorizeShop(0)">Reject</button></div></div></div>'
                    }
                    $('#manageshops').html(shops);
                    
        }).fail(function(xhr, status, errorThrow){
          console.log('error' + errorThrow)
        });

}

function authorizeShop(value){
    console.log(value, typeof(value));
    url = "http://localhost:5000/admin/" + $('#userId').val() + "/shops";
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