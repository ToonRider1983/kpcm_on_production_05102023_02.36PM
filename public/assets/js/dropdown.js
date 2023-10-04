$(document).ready(function() {
    var fetchUrl = "/dropdown/fetch";
    var fetchIndustrialUrl = "/dropdown/fetchIndustrial";

    function fetchData(select, targetElement) {
        var _token = $('input[name="_token"]').val();

        $.ajax({
            url: (targetElement == 'provinces') ? fetchUrl : fetchIndustrialUrl,
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

    var selectedCountryId = $('.country_id').val();
    if (selectedCountryId != '') {
        fetchData(selectedCountryId, 'provinces');
        fetchData(selectedCountryId, 'industrialzones');
    }

    $('.country_id').change(function() {
        var select = $(this).val();
        if (select != '') {
            fetchData(select, 'provinces');
            fetchData(select, 'industrialzones');
        }
    });
});

