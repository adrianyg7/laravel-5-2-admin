module.exports = function(){
    return {

        iCheck: require('./helpers/i-check'),
        dataTables: require('./helpers/data-tables'),
        requiredFields: require('./helpers/required-fields'),
        select2: require('./helpers/select2'),
        deleteSwal: require('./helpers/delete-swal'),
        flashMessaging: require('./helpers/flash-messaging')
        
    }
}()
