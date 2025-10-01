document.getElementById('openDualModal').addEventListener('click', function() {
    const modalKiri = new bootstrap.Modal(document.getElementById('modalKiri'));
    const modalKanan = new bootstrap.Modal(document.getElementById('modalKanan'));

    // Buka keduanya
    modalKiri.show();
    modalKanan.show();
});