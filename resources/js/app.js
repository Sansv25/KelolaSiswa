import './bootstrap';
import 'flowbite';
import AOS from 'aos';
import 'aos/dist/aos.css';


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Inisialisasi AOS setelah DOM siap
document.addEventListener('DOMContentLoaded', () => {
  AOS.init({
    // Opsi konfigurasi dapat ditambahkan di sini
    duration: 700,
    once: true,
    // disable: 'mobile', // contoh: disable di mobile
  });
});
