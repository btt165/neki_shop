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
