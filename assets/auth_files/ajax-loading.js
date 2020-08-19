$(document).ready(function() {
    var AjaxLoadingBar = {
      init: function () {
        this.bindUI();
      }, 
      bindUI: function () {
        var that = this;
        $.ajaxSetup({
          beforeSend: function() {
            $(".overlay").fadeIn('slow');
            $(".pageLoader").removeClass('d-none');
          },
          complete : function() {
            setTimeout(function() {
              $(".overlay").fadeOut('slow');
              $(".pageLoader").addClass('d-none');
            }, 400);
          }
        });         
      }
    };
    
    AjaxLoadingBar.init();
});