// document.addEventListener('DOMContentLoaded', function () {
//     console.log("🔥 app.js loaded");

//     // 🔁 SESSION KEEP-ALIVE every 45 sec
//     setInterval(() => {
//         fetch('/keep-alive').then(response => {
//             if (!response.ok) {
//                 console.warn("⚠️ Keep-alive failed");
//             }
//         }).catch(err => console.log("Keep-alive error", err));
//     }, 15000);

//     // ✅ Optional: Auto-hide alerts after 5 seconds
//     setTimeout(() => {
//         let alerts = document.querySelectorAll('.alert');
//         alerts.forEach(el => el.style.display = 'none');
//     }, 3000);

//     // ✨ Optional: Add global modal handling, form validation, etc.
// });
