module.exports = function() {

    if ( ! (window.backVars instanceof Object) ) return

    if ( ! (backVars.flash_message instanceof Object) ) return

    toastr.options = {
        positionClass: 'toast-bottom-right',
        timeOut: false
    }

    toastr[backVars.flash_message.type](backVars.flash_message.message)

}
