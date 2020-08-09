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
        $('[data-toggle="tooltip"]').tooltip();
    })
    // popovers
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover({
            html: true,
            content: function () {
                return $('#popover-content').removeClass('d-none');
            },

        });
    });
}
// });
jqueryPlugins();