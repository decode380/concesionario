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
                $(location).attr('href',action+'/index');
            } else {
                Swal.fire('Usuario o contraseña incorrecto');
            }
        },

    });
});

$('.btn-logout').click(function(e){
    e.preventDefault();

    Swal.fire({
        title: '¿Cerrar sesión?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:action+'/logout',
                type:'POST',
                dataType:'json',
                success: function(){
                    $(location).attr('href',action);
                },
        
            });
        }
      })
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
                Swal.fire('La placa ya se encuentra registrada');
            } else {
                $.ajax({
                    url:action+'/insert-car',
                    type:'POST',
                    dataType:'json',
                    data:{id:id, model:model,category:category,make:make,color:color,price:price, type:type},
                    success: function(data){
                        if(data){
                            Swal.fire('Registrado correctamente');
                            location.reload();
                        } else {
                            Swal.fire('Ocurrió un error');
                        }
                    },
                });
            }
        },

    });


});