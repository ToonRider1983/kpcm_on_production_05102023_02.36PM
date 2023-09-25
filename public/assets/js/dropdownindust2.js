var fetchIndust = "/indust/fetchIndust";

// เมื่อเลือกประเทศ
$('#country').change(function() {
    if ($(this).val() != '') {
        var country = $(this).val();
        var _token = $('input[name="_token"]').val();
        
        // ส่ง AJAX request ไปยังเซิร์ฟเวอร์เพื่อโหลด industrial zones ของประเทศที่เลือก
        $.ajax({
            url: fetchIndust,
            method: "POST",
            data: { country: country, _token: _token },
            success: function(result) {
                // เปลี่ยนค่าใน dropdown ของ industrial zones
                $('#industrialZone').html(result.industrialzones);
            }
        });
    }
});
