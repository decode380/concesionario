const action = $('#base-url').val();

$('#btn-close-alert-login').click(function(){
    document.getElementById("alert-dialog-login").style.display= "none";
});
$('.btn-close-alert-carrepat').click(function(){
    document.getElementById("alert-dialog-carrepeat").style.display= "none";
});

$('.form-login').submit(function(e){
    e.preventDefault();
    
    var usr = $('#login-usr').val();
    var pass = $('#login-pass').val();

    $.ajax({
        url:action+'/val_login',
        type:'POST',
        dataType:'json',
        data:{usr:usr,pass:pass},
        success: function(data){
            if(data == true){
                $(location).attr('href',action+'/index');
            } else {
                document.getElementById("alert-dialog-login").style.display= "flex";
            }
        },
    });
});

$('.btn-logout').click(function(e){
    e.preventDefault();
    $.ajax({
        url:action+'/logout',
        type:'POST',
        dataType:'json',
        success: function(){
            $(location).attr('href',action);
        },

    });
});

$('.form-insert-car-seller').submit(function(e){
    var id = $('#id-car').val();
    var model = $('#model-car').val();
    var category = $('#category-car').val();
    var make = $('#make-car').val();
    var color = $('#color-car').val();
    var price = $('#price-car').val();
    var type = $('#type-car').val();

    e.preventDefault();
    $.ajax({
        url:action+'/val_car_repeat',
        type:'POST',
        dataType:'json',
        data:{id:id},
        success: function(data){
            if(data){
                document.getElementById("alert-dialog-carrepeat").style.display= "flex";
            } else {
                $.ajax({
                    url:action+'/insert-car',
                    type:'POST',
                    dataType:'json',
                    data:{id:id, model:model,category:category,make:make,color:color,price:price, type:type},
                    success: function(data){
                        if(data){
                            location.reload();
                        } else {
                        }
                    },
                });
            }
        },
    });
});

$('.form-update-user').submit(function(e){
    e.preventDefault();
    var firstname = $('#update-user-firstname').val();
    var lastname = $('#update-user-lastname').val();
    var phone = $('#update-user-phone').val();
    var email = $('#update-user-email').val();

    $.ajax({
        url:action+'/update-user',
        type:'POST',
        dataType:'json',
        data:{firstname:firstname, lastname:lastname, phone:phone,email:email, },
        success: function(data){
                $(location).attr('href',action+'/index');
        },

    });
});

$('#btn-search-bycategory').click(function(e){
    e.preventDefault();
    var categoryid = $('#category-search-bycategory').val();

    $.ajax({
        url:action+'/read-cars-bycategory',
        type:'POST',
        dataType:'json',
        data:{categoryid:categoryid},
        success: function(data){
            $('#table-cars-by-category').html(data);
        },
    });
});

function view_seller_data(firstname, lastname, phone){
    alert(firstname + ' ' + lastname + ' - ' + phone);
}

$('.form-search-byprice').submit(function(e){
    e.preventDefault();
    var pricefrom = $('#price-from-search-byprice').val();
    var priceuntil = $('#price-until-search-byprice').val();

    $.ajax({
        url:action+'/read-cars-byprice',
        type:'POST',
        dataType:'json',
        data:{pricefrom:pricefrom, priceuntil:priceuntil},
        success: function(data){
            $('#table-cars-by-price').html(data);
        },
    });
});



