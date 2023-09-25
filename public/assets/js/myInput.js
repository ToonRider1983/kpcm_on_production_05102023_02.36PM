var mydatainput = "/myinput/mydatainput";

// เมื่อมีการเปลี่ยนแปลงใน input field
$('#myInput').on('input', function() {
    // อัปเดตค่าใน Session ผ่าน Ajax request
    $.ajax({
        url: updateSession,
        method: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            myInputValue: $(this).val()
        },
        success: function(response) {
            console.log(response); // ตอบกลับจากเซิร์ฟเวอร์
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});
