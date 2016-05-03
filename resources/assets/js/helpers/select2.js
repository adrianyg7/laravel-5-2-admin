module.exports = function() {

    $('.select2:not([multiple])').select2({
        placeholder: "-- Seleccione --",
        allowClear: true
    })

    $('.select2[multiple]').select2({
        placeholder: "-- Seleccione --"
    })

    $('.select2').on('focus', function() {
        $(this).select2('open')
    })

}
