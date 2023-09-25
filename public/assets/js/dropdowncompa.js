var fetchIndustrialUrl = "/dropdowncompa/fetchIndustrial";

// เมื่อเลือกประเทศ
$('#country').change(function() {
    if ($(this).val() != '') {
        var country = $(this).val();
        var _token = $('input[name="_token"]').val();
        
        // ค้นหาประเทศที่เลือกและบันทึกค่า "Distributor" ที่ถูกเลือกไว้
        var selectedCountry = $('#company').val();

        // ส่ง AJAX request ไปยังเซิร์ฟเวอร์เพื่อโหลด industrial zones ของประเทศที่เลือก
        $.ajax({
            url: fetchIndustrialUrl,
            method: "POST",
            data: { country: country, company: selectedCountry, _token: _token },
            success: function(result) {
                // เปลี่ยนค่าใน dropdown ของ industrial zones
                $('#company').html(result.companies);

                // ตั้งค่าค่า "Distributor" ใหม่หลังจากโหลดข้อมูลเสร็จสมบูรณ์
                selectedCompany = selectedCountry;
            }
        });
    }
});
