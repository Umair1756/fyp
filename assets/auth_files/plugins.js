$(document).ready(function () {
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
        $('#txtDateEnd').datetimepicker();
    });
    // tooltip
    // $(function () {
    //     $('#demotooltip').tooltip()
    // })
    // popovers
    $(function () {
        $('#demotooltip').popover()
    })
});