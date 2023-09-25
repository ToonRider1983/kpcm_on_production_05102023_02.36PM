document.addEventListener('DOMContentLoaded', function() {
  const clearSessionButton = document.getElementById('clear-session-button');

  if (clearSessionButton) {
    clearSessionButton.addEventListener('click', function() {
      const confirmation = confirm('Are you sure you want to clear the session?');
      
      if (confirmation) {
        // เก็บค่าการลบเซสชันในตัวแปรแทนที่จะใช้ในการอัปเดตหน้า URL
        const clearSessionValue = '1';

        // แยก URL เพื่อเตรียมใช้งาน
        const urlParts = window.location.href.split('?');
        const baseUrl = urlParts[0];
        const queryStrings = urlParts[1] ? urlParts[1].split('&') : [];

        // อัปเดตหรือเพิ่ม query string ใหม่โดยคั่นด้วย & เมื่อต้องการแทนที่หรือเพิ่ม query string
        let updatedQueryString = queryStrings.map(function(queryString) {
          const [key, value] = queryString.split('=');
          return key === 'clear_session' ? `clear_session=${clearSessionValue}` : queryString;
        }).join('&');

        // เพิ่ม query string ใหม่หากไม่พบใน URL ที่มากับเดิม
        if (!queryStrings.some(queryString => queryString.startsWith('clear_session='))) {
          updatedQueryString += (updatedQueryString.length > 0 ? '&' : '') + `clear_session=${clearSessionValue}`;
        }

        // สร้าง URL ใหม่โดยรวม baseUrl และ updatedQueryString
        const newUrl = baseUrl + (updatedQueryString ? `?${updatedQueryString}` : '');

        // นำ URL ใหม่ไปยังหน้าเว็บ
        window.location.href = newUrl;
      }
    });
  }
});