$(document).ready(function(){
  
  $(function () {
    $(".from-date").datepicker({
      changeDay: true,
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'yyyy-mm-dd',
        yearRange: "-100:+0",
        onClose: function(dateText, inst) { 
            $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, inst.selectedDay, 1));
        }
    });
    $(".to-date").datepicker({
      dateFormat: "yyyy-mm-dd",
      duration: "slow",
    });
  });
});