<script>
document.addEventListener('DOMContentLoaded', () => {

    const btn = document.getElementById('menuToggle');
    const menu = document.getElementById('navMenu');

    if (btn && menu) {
        btn.addEventListener('click', () => {
            menu.classList.toggle('show');
        });
    }

});
</script>

<script src="/assets/js/app.js" defer></script>

<?php if (file_exists(ROOT_PATH . '/public/assets/js/paket.js')): ?>
<script src="/assets/js/paket.js" defer></script>
<?php endif; ?>

</body>
</html>
