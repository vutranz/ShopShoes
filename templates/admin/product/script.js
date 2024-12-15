// JavaScript for Slideshow functionality

let slideIndex = 0; // Chỉ số slide hiện tại

// Hiển thị slideshow
function showSlides() {
    let slides = document.getElementsByClassName("slides");
    
    // Ẩn tất cả các slide
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    // Tăng chỉ số slide và reset về 1 nếu lớn hơn tổng số slide
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    
    // Hiển thị slide hiện tại
    slides[slideIndex - 1].style.display = "block";  
    
    // Thiết lập slide tự động chuyển mỗi 3 giây
    setTimeout(showSlides, 3000); 
}

// Chuyển tới slide trước hoặc sau
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Khởi động slideshow khi trang tải
showSlides();
