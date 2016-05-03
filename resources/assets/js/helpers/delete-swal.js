module.exports = function() {

    $('a[data-swal]').on('click', function(e) {
        e.preventDefault()

        var url = $(this).attr('href')
        var _token = $(this).data('swal-token')
        var body = '<strong class="text-red">' + $(this).data('swal-record') + '</strong>'

        swal({
            cancelButtonText: 'Cancelar',
            closeOnConfirm: false,
            confirmButtonColor: '#DD4B39',
            confirmButtonText: 'Eliminar',
            html: true,
            showCancelButton: true,
            text: 'Está a punto de eliminar el siguiente registro: ' + body,
            title: '¡Atención!',
            type: 'warning'
        }, function(){
            var $form = $('<form>', {
                action: url,
                method: 'POST'
            })

            var $token = $('<input>', {
                type: 'hidden',
                name: '_token',
                value: _token
            }).appendTo($form)

            $form.appendTo('body').submit()
        })
    })

}
