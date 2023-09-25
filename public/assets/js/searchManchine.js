var autocompleteSuggestions = $('#autocomplete-suggestions'); // เลือกองค์ประกอบสำหรับแสดงข้อเสนอ
var results = []

$('#customer-search').on('input', function () {
    var searchTerm = $(this).val();

    // เพิ่มเงื่อนไข: ถ้า searchTerm ว่างเปล่าให้เซตข้อมูลในส่วนต่าง ๆ เป็นสตริงว่าง
    if (searchTerm === '') {
        $('#customer_cd').text('');
        $('#country').text('');
        $('#industrialzone').text('');
        $('#address1').text('');
        $('#address2').text('');
        autocompleteSuggestions.empty();
        return;
    }

    $.ajax({
        url: '/searchcustomer',
        method: 'GET',
        data: {
            searchTerm: searchTerm
        },
        success: function (response) {
            // Clear all fields
            $('#customer_cd').text('');
            $('#country').text('');
            $('#industrialzone').text('');
            $('#address1').text('');
            $('#address2').text('');

            // Get the search term from the input field
            var searchTerm = $('#customer-search').val().toLowerCase();

            // เพิ่มการแสดงผลลัพธ์จากค้นหา
            results = response.search_results;
            autocompleteSuggestions.empty();

            if (results.length > 0) {
                results.forEach(function (result) {
                    var customerName = result.customer_name1;
                    if (result.customer_name2 !== null) {
                        customerName += ' / ' + result.customer_name2;
                    }
                    customerName += ' (' + result.country + ')';

                    var suggestion = $('<div>')
                        .html('<span> ' + result.customer_cd + '</span> : ' + customerName + ' ')
                        .addClass('autocomplete-suggestion');

                    // Check if the suggestion matches the search term
                    if (customerName.toLowerCase().includes(searchTerm)) {
                        var highlightedText = customerName.replace(new RegExp(searchTerm, "gi"), '<span class="highlighted-text">$&</span>');
                        suggestion.html('<span> ' + result.customer_cd + '</span> : ' + highlightedText + ' ');
                        suggestion.addClass('highlighted');
                    } else {
                        suggestion.removeClass('highlighted');
                    }


                    suggestion.click(function () {
                        // เมื่อคลิกที่ข้อเสนอ นำข้อมูลไปแสดงในฟิลด์ที่เกี่ยวข้อง
                        $('#customer-search').val(result.customer_cd + ' - ' + customerName);
                        $('#customer-id').val(result.id);
                        $('#customer_cd').text(result.customer_cd);
                        $('#country').text(result.country);
                        $('#industrialzone').text(result.industrialzone);
                        $('#address1').text(result.address1);
                        $('#address2').text(result.address2);
                        autocompleteSuggestions.empty();
                    });

                    autocompleteSuggestions.append(suggestion);
                });
            }

        },

        error: function () {
            // Handle error, e.g., display "Customer not found"
            $('#customer_cd').text('');
            $('#country').text('');
            $('#industrialzone').text('');
            $('#address1').text('');
            $('#address2').text('');
            autocompleteSuggestions.empty();
        }
    });


});
var currentSuggestionIndex = -1; // To keep track of the currently selected suggestion

$('#customer-search').on('input', function (event) {
    var searchTerm = $(this).val();

    currentSuggestionIndex = -1;
});

var autocompleteSuggestions = $('#autocomplete-suggestions');

$('#customer-search').on('input', function () {
    var searchTerm = $(this).val();

    if (searchTerm === '') {
        // Clear fields and suggestions
        $('#customer_cd').text('');
        $('#country').text('');
        $('#industrialzone').text('');
        $('#address1').text('');
        $('#address2').text('');
        autocompleteSuggestions.empty();
        return;
    }


});

var currentSuggestionIndex = -1;

$('#customer-search').on('keydown', function (event) {
    if (event.key === 'ArrowUp' || event.key === 'ArrowDown') {
        event.preventDefault();

        var suggestions = $('.autocomplete-suggestion');

        if (event.key === 'ArrowUp') {
            currentSuggestionIndex = Math.max(currentSuggestionIndex - 1, -1);
        } else if (event.key === 'ArrowDown') {
            currentSuggestionIndex = Math.min(currentSuggestionIndex + 1, suggestions.length - 1);
        }

        suggestions.removeClass('highlightedselect');

        if (currentSuggestionIndex !== -1) {
            var selectedSuggestion = suggestions.eq(currentSuggestionIndex);
            selectedSuggestion.addClass('highlightedselect');
            $(this).val(selectedSuggestion.text().trim()); // Update the input field with the suggestion
        } else {
            $(this).val(searchTerm); // Restore the original search term
        }
    } else if (event.key === 'Enter') {
        event.preventDefault();
        var selectedSuggestion = $('.autocomplete-suggestion');
        if (selectedSuggestion.length > 0) {
            var v = event.target.value.split(' :')

            const result = results.find((e) => e.customer_cd === v[0])
            console.log('result', v, result);

            $('#customer-search').val(event.target.value);
            $('#customer-id').val(result.id);
            $('#customer_cd').text(result.customer_cd);
            $('#country').text(result.country);
            $('#industrialzone').text(result.industrialzone);
            $('#address1').text(result.address1);
            $('#address2').text(result.address2);
            autocompleteSuggestions.empty();
        } else {
            // Handle case where no suggestion is highlighted and Enter is pressed
            // For example, you might want to submit the form or perform another action.
        }
    } else if (event.key === 'Escape') {
        // Clear the suggestions and reset the suggestion index
        autocompleteSuggestions.empty();
        currentSuggestionIndex = -1;
    }
    autocompleteSuggestions.append(suggestion);
});

