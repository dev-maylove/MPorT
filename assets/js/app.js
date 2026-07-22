'use strict';

document.addEventListener('DOMContentLoaded', () => {

    console.log('MandalaNet App Loaded');

    // Auto close alert
    document.querySelectorAll('.alert').forEach(alert => {
        setTimeout(() => {
            alert.remove();
        }, 5000);
    });

    // Konfirmasi tombol logout
    document.querySelectorAll('[data-confirm="logout"]').forEach(button => {
        button.addEventListener('click', event => {
            if (!confirm('Yakin ingin logout?')) {
                event.preventDefault();
            }
        });
    });

});
