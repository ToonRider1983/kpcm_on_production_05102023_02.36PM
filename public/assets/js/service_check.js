class Form{
  Comment_List= ['comment_compressor_normal','comment_compressor_abnormal','setting_operation_local','setting_operation_run_on','setting_operation_run_load','setting_group_link',
  'setting_group_panel','detail_motor','detail_cooler','detail_topup','detail_replace','detail_overhaul_air','detail_overhaul_motor','detail_rewind','detail_3000','detail_6000','detail_12000']
  Mainte_nance_List = ['maint_suction','maint_oilfiter','maint_oilseparator','maint_oil',
  'maint_drainseparator','maint_motorgrease','maint_solenoid','maint_shuttle','maint_capacityvav','maint_discharge_silenser',
  'maint_oillevel','maint_intercooler','maint_aftercooler','maint_oilcooler','maint_mainmotor','maint_oilseal',
  'maint_fanmotor','maint_oilpump','maint_1st_air','maint_2nd_air','maint_bearindmotor','maint_gauge','maint_bearingmotor',
  'maint_magnetic','maint_sensor','maint_maininv','maint_faninv','maint_leakage'
  ,'chk_filter_replacment','chk_filter_replacment2','chk_filter_replacment3']
  checkId=['servicContent_portal','servicContent_annual','servicContent_repair',
                    'servicContent_overhaul','servicContent_commissioning','servicContent_warranty',
                    'servicContent_emergency','serviceContent_portal']
}
$(document).ready(function() {
  let obj = new Form()
  obj.Comment_List.forEach((item)=>{
    $(`input[name="${item}"]`).change(function () {
      if ($(this).is(':checked')) {
        $(this).val(1);
        // alert($(this).val())
    } else {
        $(this).val(0);
        // alert($(this).val())
    }
    })
  })
  obj.Mainte_nance_List.forEach((item)=>{
    $(`input[name="${item}"]`).each(function (index) {
      var value = Math.pow(2, index);
      $(this).val(value);
    });
    $(`input[name="${item}"]`).click(function () {
        var selectedCheckboxes = $(`input[name="${item}"]:checked`);
        var totalValue = 0;
        selectedCheckboxes.each(function () {
            totalValue += parseInt($(this).val());
        });
       
        // Display an alert with the sum value
        $('#'+`${item}`).val(`${totalValue}`);

        
    });
  })

    $('input[name="unitofpressure"]').on('change', function() {
      var $textElement = $('.unit_of_pressure');
      
      if ($('#MPa\\,kPa').prop('checked')) {
        $textElement.text('Mpa');
      } else {
        $textElement.text('bar');
      }
    });
    
    //#region checkbox select
    $('#service-content-dropdown').change(function() {
      // Get the selected option value from the dropdown
      const selectedOptionValue = $(this).val();
      obj.checkId.forEach((item)=>{
        // Set the selected radio button to match the dropdown selection
        $(`#${item}[value="${selectedOptionValue}"]`).prop('checked', true);
      })
    });

    // Add an event handler to the radio buttons
    obj.checkId.forEach((item)=>{
      $(`#${item}`).change(function() {
        // Get the value of the radio button that was checked
        const radioValue = $(this).val();
        
        // Set the selected option in the dropdown to match the checked radio button
        
        $('#service-content-dropdown').val(radioValue);
      });
    })
    
    
    //#endregion
    $('.servicePerformer').on('input', function() {
        $('#servicePerformer').val($(this).val());
    });
    $('.customerPIC').on('input', function() {
        $('#customerPIC').val($(this).val());
    });
    $('.serviceDate').on('input', function() {
        $('.serviceDate').val($(this).val());
    });
    $('.Remarks').on('input', function() {
      $('.Remarks').val($(this).val());
  });

   
  
  
});