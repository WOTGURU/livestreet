(function($){
    $.fn.extend({
      chosenClass: function() {
        return Chosen;
      }
    });
})(jQuery);

(function($,ChosenClass){
    $.extend(ChosenClass.prototype,{
        choice_destroy:(function(fnSuper){
            return function(){
                var $val = fnSuper.apply(this,arguments);
                this.form_field_jq.trigger("change");
                return $val;
            }
        })(ChosenClass.prototype.choice_destroy)
    });
})(jQuery,jQuery.fn.chosenClass());


/*(function($){
    $.fn.extend({
      chosen: function(data, options) {
        return $(this).each(function(input_field) {
          if (!($(this)).hasClass("chzn-done")) {
            return $(this).data('chosenInstance', new Chosen(this, data, options));
          }
        });
      }
    });
})(jQuery);*/