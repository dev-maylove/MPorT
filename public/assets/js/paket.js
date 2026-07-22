'use strict';

document.addEventListener('DOMContentLoaded', () => {

    // Tampilkan / sembunyikan form
    document.querySelectorAll('[data-reg-toggle]').forEach(button => {

        button.addEventListener('click', () => {

            const card = button.closest('.package-card');
            const form = card.querySelector('.registrasi-form');

            if (!form) return;

            form.classList.toggle('active');

        });

    });

    // Kirim ke WhatsApp
    document.querySelectorAll('[data-reg-submit]').forEach(button => {

        button.addEventListener('click', event => {

            event.preventDefault();

            const form = button.closest('.registrasi-form');

            const nama = form.querySelector('.reg-name').value.trim();
            const hp = form.querySelector('.reg-hp').value.trim();
            const alamat = form.querySelector('.reg-alamat').value.trim();

            if (!nama || !hp || !alamat) {
                alert('Semua data harus diisi.');
                return;
            }

            const paket = form.closest('.package-card')
                .querySelector('.package-name')
                .textContent
                .trim();

            const pesan =
`Halo MandalaNet.

Saya ingin mendaftar internet.

Nama : ${nama}
No HP : ${hp}
Alamat : ${alamat}
Paket : ${paket}`;

            const nomorWA = '628567900018'; // Ganti dengan nomor WhatsApp admin

            window.open(
                `https://wa.me/${nomorWA}?text=${encodeURIComponent(pesan)}`,
                '_blank'
            );

        });

    });

});
