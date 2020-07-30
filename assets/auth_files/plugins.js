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
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
      })
    // popovers
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover({
            placement : 'right',
            html : true,
            //content: function() {
              //  return $('.popoverTest').html();
              //}
              content: function() {
                var content = $(this).attr("data-popover-content");
                return $(content).children(".popover-body").html();
              },
              title: function() {
                var title = $(this).attr("data-popover-content");
                return $(title).children(".popover-heading").html();
              }
        });
    });
});