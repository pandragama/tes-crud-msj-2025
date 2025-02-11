import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// -------------------------------

import Swal from 'sweetalert2';

window.Swal = Swal;

// Memeriksa preferensi tema pengguna
const prefersDarkScheme = window.matchMedia("(prefers-color-scheme: dark)").matches;

// Mengatur pengaturan global SweetAlert2
const SwalInstance = Swal.mixin({
    background: prefersDarkScheme ? '#161c2e' : '#ffffff',
    color: prefersDarkScheme ? '#ffffff' : '#000000',
    confirmButtonColor: prefersDarkScheme ? '#3085d6' : '#d33',
    cancelButtonColor: prefersDarkScheme ? '#d33' : '#3085d6',
});

window.SwalInstance = SwalInstance;

const ToastInstance = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    background: prefersDarkScheme ? '#161c2e' : '#ffffff',
    color: prefersDarkScheme ? '#ffffff' : '#000000',
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer);
        toast.addEventListener('mouseleave', Swal.resumeTimer);
    }
});

window.ToastInstance = ToastInstance;

// -------------------------------

import Chart from 'chart.js/auto';

window.Chart = Chart;
