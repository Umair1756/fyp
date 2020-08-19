// $(document).ready(function () {
function jqueryPlugins() {
    // selectize initialise
    $('#select-beast-empty').selectize({
        allowEmptyOption: true,
        create: true
    });
    $('.input-sortable').selectize({
        plugins: ['drag_drop'],
        persist: false,
        create: true
    });
    // datetimepicker
    $(function () {
        $('#txtDateStart').datetimepicker();
        $('#txtDueDate').datetimepicker();
    });
    // tooltip
    $(function () {
        $("body").tooltip({ selector: '[data-toggle=tooltip]', placement: 'bottom' });
    })
}
// });
jqueryPlugins();