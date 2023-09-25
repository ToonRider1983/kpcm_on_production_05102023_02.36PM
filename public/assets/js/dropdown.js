// ของหน้า Page endUser add/input ข้อมูล
var fetchUrl = "/dropdown/fetch";
var fetchIndustrialUrl = "/dropdown/fetchIndustrial";
//สคิปในการเลือกid ประเทศ และฟังก์ชั่นจะทำการแสดง จังหวัด,เขตอุตสาหกรรม
$('.country_id').change(function() {
    if ($(this).val() != '') {
        var select = $(this).val();
        var _token = $('input[name="_token"]').val();
            //จังหวัด
        $.ajax({
            url: fetchUrl,
            method: "POST",
            data: { select: select, _token: _token },
            success: function(result) {
                $('.provinces').html(result.provinces);
            }
        });
        //เขตอุตสาหกรรม
        $.ajax({
            url: fetchIndustrialUrl,
            method: "POST",
            data: { select: select, _token: _token },
            success: function(result) {
                $('.industrialzones').html(result.industrialzones);
            }
        });
    }
});
//มีการดึงข้อมูลจาก Function fetch ใน Controller CustomerMasterController
