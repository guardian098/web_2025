document.addEventListener('DOMContentLoaded', function() {
    // Обработчик клика по изображениям в посте
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('post__photo')) {
            const postContainer = e.target.closest('[data-post-id]');
            const postId = postContainer.dataset.postId;
            const modal = document.getElementById(`modal-${postId}`);
            
            // Активируем модальное окно
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
            
            // Находим индекс текущего изображения
            const clickedIndex = parseInt(e.target.dataset.index);
            showModalSlide(modal, clickedIndex);
        }
    });
    
    // Закрытие модального окна
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('modal-close')) {
            const modal = e.target.closest('.modal-overlay');
            closeModal(modal);
        }
    });
    
    // Навигация в модальном окне
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('modal-prev') || 
            e.target.classList.contains('modal-next')) {
            
            const modal = e.target.closest('.modal-overlay');
            const images = modal.querySelectorAll('.modal-image');
            const currentIndex = getCurrentModalIndex(modal);
            let newIndex;
            
            if (e.target.classList.contains('modal-prev')) {
                newIndex = (currentIndex - 1 + images.length) % images.length;
            } else {
                newIndex = (currentIndex + 1) % images.length;
            }
            
            showModalSlide(modal, newIndex);
        }
    });
    
    // Функция показа конкретного слайда в модальном окне
    function showModalSlide(modal, index) {
        const images = modal.querySelectorAll('.modal-image');
        const counter = modal.querySelector('.modal-current');
        
        images.forEach(img => img.classList.remove('active'));
        images[index].classList.add('active');
        
        if (counter) {
            counter.textContent = index + 1;
        }
    }
    
    // Функция получения текущего индекса в модальном окне
    function getCurrentModalIndex(modal) {
        const activeImg = modal.querySelector('.modal-image.active');
        return parseInt(activeImg.dataset.index);
    }
    
    // Функция закрытия модального окна
    function closeModal(modal) {
        modal.classList.remove('active');
        document.body.style.overflow = 'auto';
    }
    
    // Закрытие по ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const activeModal = document.querySelector('.modal-overlay.active');
            if (activeModal) {
                closeModal(activeModal);
            }
        }
    });
});