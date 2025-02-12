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

// -------------------------------

// import * as particlesJS from 'particles.js';

// import 'particles.js/particles';
// const particlesJS = window.particlesJS;

// console.log(particlesJS);

// particlesJS.load('particles-js', '/js/particles.json', function() {
//     console.log('callback - particles.js config loaded');
// }, function(error) {
//     console.error('Error loading particles.js config:', error);
// });

// node_modules\particles.js\demo\particles.json
// // JSON file is located in the directory of 'public/js/particlejs-config.json'
// particlesJS.load('particles-js', 'js/particlesjs-config.json', function() {
//     console.log('callback - particles.js config loaded');
// });

// import 'particles.js/particles';

// window.particlesJS = window.particlesJS || particlesJS;


// import 'particles.js/particles';

// import * as particlesJS from 'particles.js';

// import 'particles.js';

// window.particlesJS = particlesJS.load('particles-js', {
//   particles: {
//     number: {
//       value: 80,
//       density: {
//         enable: true,
//         value_area: 800
//       }
//     },
//     color: {
//       value: '#ffffff'
//     },
//     shape: {
//       type: 'circle',
//       stroke: {
//         width: 0,
//         color: '#000000'
//       },
//       fill: {
//         color: '#000000'
//       }
//     },
//     opacity: {
//       value: 0.5,
//       random: false,
//       anim: {
//         enable: false,
//         speed: 1,
//         opacity_min: 0.1,
//         sync: false
//       }
//     },
//     size: {
//       value: 3,
//       random: true,
//       anim: {
//         enable: false,
//         speed: 40,
//         size_min: 0.1,
//         sync: false
//       }
//     },
//     line_linked: {
//       enable: true,
//       distance: 150,
//       color: '#ffffff',
//       opacity: 0.4,
//       width: 1
//     },
//     move: {
//       enable: true,
//       speed: 2,
//       direction: 'none',
//       random: true,
//       straight: false,
//       out_mode: 'out',
//       bounce: false,
//       attract: {
//         enable: false,
//         rotateX: 600,
//         rotateY: 1200
//       }
//     }
//   },
//   interactivity: {
//     detect_on: 'canvas',
//     events: {
//       onhover: {
//         enable: true,
//         mode: 'repulse'
//       },
//       onclick: {
//         enable: true,
//         mode: 'push'
//       },
//       resize: true
//     },
//     modes: {
//       repulse: {
//         distance: 200,
//         duration: 0.4
//       },
//       push: {
//         particles_nb: 4
//       }
//     }
//   },
//   retina_detect: true
// }, function() {
//   console.log('particles.js config loaded');
// });
