   //------------------ menu-overlay ------------------//
const menuItems = document.querySelectorAll('.menu > li');
const overlay = document.querySelector('.menu-overlay');

menuItems.forEach(item => {
    item.addEventListener('mouseenter', () => {
        overlay.style.opacity = '1';
        overlay.style.visibility = 'visible';
        overlay.style.pointerEvents = 'auto';
    });

    item.addEventListener('mouseleave', () => {
        overlay.style.opacity = '0';
        overlay.style.visibility = 'hidden';
        overlay.style.pointerEvents = 'none';
    });
});

// Nếu người dùng hover ra ngoài sub-menu thì cũng ẩn overlay
overlay.addEventListener('mouseenter', () => {
    overlay.style.opacity = '0';
    overlay.style.visibility = 'hidden';
    overlay.style.pointerEvents = 'none';
});

// scroll ngang
    const relatedTrack = document.querySelector('.related-track');
    const prevBtnRelated = document.querySelector('.related-btn.prev-btn');
    const nextBtnRelated = document.querySelector('.related-btn.next-btn');

    const scrollStepRelated = 300; // số pixel cuộn mỗi lần

    nextBtnRelated.addEventListener('click', () => {
        relatedTrack.scrollBy({ left: scrollStepRelated, behavior: 'smooth' });
    });

    prevBtnRelated.addEventListener('click', () => {
        relatedTrack.scrollBy({ left: -scrollStepRelated, behavior: 'smooth' });
    });
//------------------- Product----------------------//
// Xử lý ảnh thumb
    const bigImg = document.querySelector(".product__main-image img")
    const smallImgs = document.querySelectorAll(".product__thumbnails img")
    smallImgs.forEach(function(imgItem){
        imgItem.addEventListener("click", function(){
            bigImg.src = imgItem.src
        })
    })
    // Xử lý mở ra đóng vào
    document.querySelectorAll(".accordion__header").forEach(header => {
    header.addEventListener("click", () => {
    const item = header.closest(".accordion__item");
    item.classList.toggle("active");
    });
    });


    // Thêm highlight size đang chọn và nhận giá trị gửi vào form
    document.addEventListener("DOMContentLoaded", function(){
    const sizeOptions = document.querySelectorAll(".product__size-options span");
    const hiddenInput = document.getElementById("selectedSize");
    const sizeWarning = document.querySelector(".product__size-warning");
    const form = document.querySelector("form");

    // Xử lý chọn size
    sizeOptions.forEach(option => {
        option.addEventListener("click", function(){
            // Xóa active ở tất cả
            sizeOptions.forEach(o => o.classList.remove("active"));

            // Thêm active vào cái được click
            this.classList.add("active");

            // Gán giá trị ID size vào input hidden
            hiddenInput.value = this.dataset.id;

            // Ẩn cảnh báo
            sizeWarning.style.display = "none";
        });
    });

    // Kiểm tra trước khi submit
    form.addEventListener("submit", function(e){
        if (!hiddenInput.value) {
            e.preventDefault(); // Ngăn submit
            sizeWarning.style.display = "block";
        }
    });
});

function togglePassword(el) {
    let input = el.previousElementSibling;
    let icon = el.querySelector("i");

    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        input.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}
