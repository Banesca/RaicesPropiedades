function starLoad(btn) {
    $(btn).hide(1000);
    $("#idForm").append('<div style="text-align: center;display: block;font-size: 25px;font-style: oblique;font-weight: 600;" id="newDIV">Por favor espere</div>');
    $("#newDIV").hide().show(1000);

}

function endLoad(btn) {
    $(btn).show(1000);
    $('#newDIV').hide();
}

function cancelar(token) {
    var btn = $("#bcancelar");
    starLoad(btn);
    var data = new $("#idForm").serializeArray();
};


function cancelar(token) {
    var btn = $("#bcancelar");
    starLoad(btn);
    var data = new $("#idForm").serializeArray();
    $.ajax({
        url: ruta + "/api/v1/cancelarSuscripcionTocken/" + token,
        headers: {
            'X-CSRF-TOKEN': $('#_token').val()
        },
        type: 'POST',
        dataType: 'json',
        data: data,
        success: function (res) {
            endLoad(btn);
            swal({
                title: 'Confirmado',
                text: "Se ha cancelado la suscripcion de manera correcta",
                type: 'success',
                //showCancelButton: true,
                confirmButtonColor: '#463ddd',
                confirmButtonText: 'Ok, Ir a la tienda',
                //cancelButtonText: 'No, cancalar',
                showLoaderOnConfirm: true,
                preConfirm: function () {
                    return new Promise(function (resolve, reject) {
                        resolve()
                    });
                },
                allowOutsideClick: false
            }).then(function () {
                window.location.href = ruta + '/irtienda';
            });
        }, error: function (res) {
            sweetAlert('Error!', res.responseJSON.msj, 'error');
        }
    });
};
