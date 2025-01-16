// document.addEventListener("DOMContentLoaded", function () {
//     const toggleButton = document.querySelector(".navbar-toggle");
//     const navbarCollapse = document.querySelector("#customNavbar");

//     toggleButton.addEventListener("click", function () {
//         if (navbarCollapse.classList.contains("in")) {
//             navbarCollapse.classList.remove("in");
//         } else {
//             navbarCollapse.classList.add("in");
//         }
//     });
// });

document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.querySelector(".navbar-toggle");
    const navbarCollapse = document.querySelector("#navigation");

    // Thêm sự kiện click vào nút toggle để mở/đóng navbar
    toggleButton.addEventListener("click", function (event) {
        event.stopPropagation(); // Ngăn chặn sự kiện click lan đến body
        navbarCollapse.classList.toggle("in");
    });

    // Đóng navbar khi click ra ngoài
    document.addEventListener("click", function (event) {
        if (
            navbarCollapse.classList.contains("in") &&
            !navbarCollapse.contains(event.target) &&
            event.target !== toggleButton
        ) {
            navbarCollapse.classList.remove("in");
        }
    });
});
