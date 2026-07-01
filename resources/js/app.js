import './bootstrap';
// Tambahkan Alpine
import Alpine from 'alpinejs';
// Tambahkan AOS
import AOS from 'aos';
import 'aos/dist/aos.css';

// Alpine
window.Alpine = Alpine;
Alpine.start();

// AOS
AOS.init({
    once: true,
    duration: 800,
    offset: 120,
});