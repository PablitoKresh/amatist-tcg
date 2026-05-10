// public/js/welcome.js
document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.card-interactive');

    cards.forEach(card => {
        const video = card.querySelector('.card-video');

        card.addEventListener('mouseenter', () => {
            video.play();
        });

        card.addEventListener('mouseleave', () => {
            video.pause();
            video.currentTime = 0; // Opcional: resetea el vídeo al inicio
        });
    });
});