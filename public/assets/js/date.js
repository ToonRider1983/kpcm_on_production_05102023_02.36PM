// document.addEventListener('DOMContentLoaded', function () {
//     const clearButtonStyle = `
//         .clear-button {
//             margin-left: 10px;
//             background-color: #ffffff;
//             border: none;
//             cursor: pointer;
//             color: #007bff;
//         }
//     `;

//     const styleSheet = document.createElement("style");
//     styleSheet.type = "text/css";
//     styleSheet.innerText = clearButtonStyle;
//     document.head.appendChild(styleSheet);

//     function addHiddenInput(instance, name, value) {
//         const hiddenInput = document.createElement("input");
//         hiddenInput.type = "hidden";
//         hiddenInput.name = name;
//         hiddenInput.value = value;
//         instance.input.parentNode.insertBefore(hiddenInput, instance.input.nextSibling);
//     }

//     function addClearButton(instance) {
//         const clearButton = document.createElement("button");
//         clearButton.type = "button";
//         clearButton.classList.add("clear-button"); // เพิ่มคลาส "clear-button"
//         clearButton.innerText = "Clear";
//         clearButton.addEventListener("click", function() {
//             instance.clear(); // ลบวันที่ที่เลือก
//             instance.close(); // ปิดหน้าต่าง Flatpickr (ถ้าเปิดอยู่)
//             const hiddenInput = instance.input.parentNode.querySelector('input[type="hidden"]');
//             if (hiddenInput) {
//                 hiddenInput.remove(); // ลบ hidden input (ถ้ามี)
//             }
//             clearButton.remove(); // ลบปุ่ม "Clear"
//         });

//         instance.calendarContainer.appendChild(clearButton);
//     }

//     function initializeFlatpickr(inputSelector, name) {
//         flatpickr(inputSelector, {
//             dateFormat: "d/m/Y",
//             enableTime: false,
//             onChange: function(selectedDates, dateStr, instance) {
//                 addHiddenInput(instance, name, instance.formatDate(selectedDates[0], "Y-m-d"));
//                 if (!instance.calendarContainer.querySelector(".clear-button")) {
//                     addClearButton(instance);
//                 }
//             }
//         });
//     }
//     //project add
//     initializeFlatpickr("#expected_order_dt", "expected_order_dt");
//     initializeFlatpickr("#delivery_due_dt", "delivery_due_dt");
//     //project index
//     initializeFlatpickr("#from_datec", "from_datec");
//     initializeFlatpickr("#to_datec", "to_datec");
//     initializeFlatpickr("#from_dateu", "from_dateu");
//     initializeFlatpickr("#to_dateu", "to_dateu");
//     //machine add
//     initializeFlatpickr("#testrun_dt", "testrun_dt");
//     initializeFlatpickr("#dispatch_dt", "dispatch_dt");
//     // machine index
//     initializeFlatpickr("#start_date", "start_date");
//     initializeFlatpickr("#end_date", "end_date");
// });

document.addEventListener('DOMContentLoaded', function () {
    const clearButtonStyle = `
        .clear-button {
            margin-left: 10px;
            background-color: #ffffff;
            border: none;
            cursor: pointer;
            color: #007bff;
        }
    `;

    const styleSheet = document.createElement("style");
    styleSheet.type = "text/css";
    styleSheet.innerText = clearButtonStyle;
    document.head.appendChild(styleSheet);

    function addHiddenInput(instance, name, value) {
        const hiddenInput = document.createElement("input");
        hiddenInput.type = "hidden";
        hiddenInput.name = name;
        hiddenInput.value = value;
        instance.input.parentNode.insertBefore(hiddenInput, instance.input.nextSibling);
    }

    function addClearButton(instance) {
        const clearButton = document.createElement("button");
        clearButton.type = "button";
        clearButton.classList.add("clear-button");
        clearButton.innerText = "Clear";
        clearButton.addEventListener("click", function() {
            instance.clear();
            instance.close();
            const hiddenInput = instance.input.parentNode.querySelector('input[type="hidden"]');
            if (hiddenInput) {
                hiddenInput.remove();
            }
            clearButton.remove();
        });

        instance.calendarContainer.appendChild(clearButton);
    }

    function initializeFlatpickr(inputSelector, name) {
        flatpickr(inputSelector, {
            dateFormat: "d/m/Y",
            enableTime: false,
            altFormat: "d/m/Y",
            altInput: true,
            onChange: function(selectedDates, dateStr, instance) {
                addHiddenInput(instance, name, instance.formatDate(selectedDates[0], "d/m/Y"));
                if (!instance.calendarContainer.querySelector(".clear-button")) {
                    addClearButton(instance);
                }
            }
        });
    }

    initializeFlatpickr("#expected_order_dt", "expected_order_dt");
    initializeFlatpickr("#delivery_due_dt", "delivery_due_dt");
    initializeFlatpickr("#from_datec", "from_datec");
    initializeFlatpickr("#to_datec", "to_datec");
    initializeFlatpickr("#from_dateu", "from_dateu");
    initializeFlatpickr("#to_dateu", "to_dateu");
    initializeFlatpickr("#testrun_dt", "testrun_dt");
    initializeFlatpickr("#dispatch_dt", "dispatch_dt");
    initializeFlatpickr("#start_date", "start_date");
    initializeFlatpickr("#end_date", "end_date");
});
