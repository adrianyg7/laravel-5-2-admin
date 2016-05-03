module.exports = function() {

    $(':input[required]')
        .closest('.form-group')
        .children('label')
        .append(' <span class="required">*</span>')

}
