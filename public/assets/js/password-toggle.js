//หน้าPage User  ในส่วนของ add/input มีหน้าที่ในการ ทำการเปิด/ปิด password ทั้ง2ช่อง input
function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    var confirmPasswordInput = document.getElementById("password_confirmation");
    var toggleButton = document.querySelector("button[onclick='togglePasswordVisibility()']");
    var passwordType = passwordInput.getAttribute("type");

    if (passwordType === "password") {
        passwordInput.setAttribute("type", "text");
        confirmPasswordInput.setAttribute("type", "text");
        toggleButton.innerHTML = "<i class='bi bi-eye-slash-fill'></i>";
    } else {
        passwordInput.setAttribute("type", "password");
        confirmPasswordInput.setAttribute("type", "password");
        toggleButton.innerHTML = "<i class='bi bi-eye-fill'></i>";
    }
}
//ไม่เกี่ยวข้องกับ Controller
