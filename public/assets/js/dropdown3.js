// ของPage Project หน้า add/input ข้อมูล 
var fetchIndustrialUrl2 = "/dropdown/fetchIndustrial2";
var fetchUsers2 = "/dropdown/fetchUsers2";
//สคิปในการเลือกid company id และฟังก์ชั่นจะทำการแสดง user name
$('.country_id').change(function() {
    if ($(this).val() != '') {
        var select = $(this).val();
        var _token = $('input[name="_token"]').val();
        //user
        $.ajax({
            url: fetchIndustrialUrl2,
            method: "POST",
            data: { select: select, _token: _token },
            success: function(result) {
                $('.industrialzones').html(result.industrialzones);
            }
        });
    }
});


$('.companies').change(function() {
    if ($(this).val() != '') {
        var selectedCompany = $(this).val();
        var _token = $('input[name="_token"]').val();
        // ผู้ใช้
        $.ajax({
            url: fetchUsers2,
            method: "POST",
            data: { select: selectedCompany, _token: _token },
            success: function(result) {
                $('.users').html(result.users);
            }
        });
    }
});

//มีการดึงข้อมูลจาก Function fetch ใน Controller ProjectController
