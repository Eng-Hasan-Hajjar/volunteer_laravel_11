<script>
let currentImageIndex = 0;
let images = [];

function openPopup(imageUrl, index) {
    images = Array.from(document.querySelectorAll('.gallery-image')).map(img => img.src);
    currentImageIndex = index;
    document.getElementById('popupImage').src = imageUrl;
    document.getElementById('imagePopup').style.display = 'flex';
}

function closePopup() {
    document.getElementById('imagePopup').style.display = 'none';
}

function nextImage() {
    currentImageIndex = (currentImageIndex + 1) % images.length;
    document.getElementById('popupImage').src = images[currentImageIndex];
}

function prevImage() {
    currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
    document.getElementById('popupImage').src = images[currentImageIndex];
}











document.addEventListener("DOMContentLoaded", function () {
    const slides = document.querySelectorAll(".slider_text");
    let currentSlide = 0;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.remove("active");
            if (i === index) {
                slide.classList.add("active");
            }
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    // Show the first slide immediately
    showSlide(currentSlide);

    // Change slide every 5 seconds
    setInterval(nextSlide, 5000);
});



</script>


<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('website/lib/wow/wow.min.js')}}"></script>
<script src="{{asset('website/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('website/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('website/lib/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- Template Javascript -->
<script src="{{ asset('website/js/main.js')}}"></script>