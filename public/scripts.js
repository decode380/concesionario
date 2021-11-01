const action = $('#base-url').val();

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
                Swal.fire('Login correcto');
            } else {
                Swal.fire('Login incorrecto');
            }
        },

    });
});