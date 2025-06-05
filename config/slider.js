document.addEventListener('DOMContentLoaded', function() {
    const sliders = document.querySelectorAll('[data-slider]');
    
    sliders.forEach(slider => {
        const images = slider.querySelectorAll('.post__photo');
        const prevBtn = slider.querySelector('.prev');
        const nextBtn = slider.querySelector('.next');
        const currentSlide = slider.querySelector('.current-slide');
        const totalSlides = slider.querySelector('.total-slides');
        
        let currentIndex = 0;
        const total = images.length;
        
        function updateSlider() {
            images.forEach(img => img.classList.remove('active'));
            images[currentIndex].classList.add('active');          
            if (currentSlide) {
                currentSlide.textContent = currentIndex + 1;
            }
        }
        
        function nextSlide() {
            currentIndex = (currentIndex + 1) % total;
            updateSlider();
        }
        
        function prevSlide() {
            currentIndex = (currentIndex - 1 + total) % total;
            updateSlider();
        }
        
        if (nextBtn) nextBtn.addEventListener('click', nextSlide);
        if (prevBtn) prevBtn.addEventListener('click', prevSlide);
    
        updateSlider();
    });
});