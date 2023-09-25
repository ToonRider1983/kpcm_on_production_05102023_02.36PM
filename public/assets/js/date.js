document.addEventListener('DOMContentLoaded', function () {
    function addHiddenInput(instance, name, value) {
        const hiddenInput = document.createElement("input");
        hiddenInput.type = "hidden";
        hiddenInput.name = name;
        hiddenInput.value = value;
        instance.input.parentNode.insertBefore(hiddenInput, instance.input.nextSibling);
    }

    function initializeFlatpickr(inputSelector, name) {
        flatpickr(inputSelector, {
            dateFormat: "d/m/Y",
            enableTime: false,
            onChange: function(selectedDates, dateStr, instance) {
                addHiddenInput(instance, name, instance.formatDate(selectedDates[0], "Y-m-d"));
            }
        });
    }

    //Project
    initializeFlatpickr("#expected_order_dt", "expected_order_dt");
    initializeFlatpickr("#delivery_due_dt", "delivery_due_dt");
//  -------------------------------------------------------
    // Machine Master
    initializeFlatpickr("#testrun_dt", "testrun_dt");
    initializeFlatpickr("#dispatch_dt", "dispatch_dt");
    // -------------------------------------------------------
    // User master
});
