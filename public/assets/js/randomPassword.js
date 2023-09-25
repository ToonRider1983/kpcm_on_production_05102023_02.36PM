//หน้าPage User  ในส่วนของ add/input มีหน้าที่ในการ ทำการสุ่ม password ทั้ง2ช่อง input
function generatePassword() {
    var length = 8; //กำหนดจำนวนที่สุ่ม
    var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()";
    var password = "";
    for (var i = 0; i < length; i++) {
        var randomIndex = Math.floor(Math.random() * charset.length);
        password += charset.charAt(randomIndex);
    }

    document.getElementById("password").value = password;
    document.getElementById("password_confirmation").value = password;
}
//ไม่เกี่ยวข้องกับ Controller