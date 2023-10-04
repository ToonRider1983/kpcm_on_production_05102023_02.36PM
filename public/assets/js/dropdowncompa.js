$(document).ready(function() {
    var fetchUrl = "/dropdowncompa/fetch";
    var fetchIndustrialUrl = "/dropdowncompa/fetchIndustrial";

    function fetchData(select, targetElement) {
        var _token = $('input[name="_token"]').val();
    
        $.ajax({
            url: (targetElement == 'companies') ? fetchUrl : fetchIndustrialUrl,
            method: "POST",
            data: { select: select, _token: _token },
            success: function(result) {
                var dropdown = $('.' + targetElement);
                var selectedOption = dropdown.val();

                dropdown.html(result[targetElement]);

                if (selectedOption) {
                    dropdown.val(selectedOption);
                }
            }
        });
    }

    var selectedCountryId = $('.country').val();
    if (selectedCountryId != '') {
        fetchData(selectedCountryId, 'companies');
    }

    $('.country').change(function() {
        var select = $(this).val();
        if (select != '') {
            fetchData(select, 'companies');
        }
    });
});
