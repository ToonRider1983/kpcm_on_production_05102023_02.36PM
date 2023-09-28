// //มีการดึงข้อมูลจาก Function fetch ใน Controller CustomerMasterController


// $(document).ready(function() {
//     // ของหน้า Page endUser add/input ข้อมูล
//     var fetchUrl = "/dropdown/fetch";
//     var fetchIndustrialUrl = "/dropdown/fetchIndustrial";

//     // ฟังก์ชันสำหรับดึงข้อมูลจังหวัดและเขตอุตสาหกรรม
//     function fetchData(select) {
//         var _token = $('input[name="_token"]').val();
//         // จังหวัด
//         $.ajax({
//             url: fetchUrl,
//             method: "POST",
//             data: { select: select, _token: _token },
//             success: function(result) {
//                 var provincesDropdown = $('.provinces');
//                 var selectedProvinceId = provincesDropdown.val();
    
//                 // เพิ่ม option ใน provinces dropdown
//                 provincesDropdown.html(result.provinces);
    
//                 // ตั้งค่า selected option ใหม่
//                 if (selectedProvinceId) {
//                     provincesDropdown.val(selectedProvinceId);
//                 }
//          }
//      });
//         // เขตอุตสาหกรรม
//         $.ajax({
//             url: fetchIndustrialUrl,
//             method: "POST",
//             data: { select: select, _token: _token },
//             success: function(result) {
//                 var industrialZonesDropdown = $('.industrialzones');
//             var selectedIndustrialZoneId = industrialZonesDropdown.val();

//             industrialZonesDropdown.html(result.industrialzones);

//             if (selectedIndustrialZoneId) {
//                 industrialZonesDropdown.val(selectedIndustrialZoneId);
//             }
//             }
//         });
//     }

//     // ตรวจสอบว่ามี ID อยู่หรือไม่
//     var selectedCountryId = $('.country_id').val();
//     if (selectedCountryId != '') {
//         fetchData(selectedCountryId);
//     }

//     // เมื่อมีการเปลี่ยนแปลงในการเลือก ID ประเทศ
//     $('.country_id').change(function() {
//         var select = $(this).val();
//         if (select != '') {
//             fetchData(select);
//         }
//     });
// });



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

