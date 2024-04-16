$(document).ready(function() {
    // Animasi fadeIn saat halaman dimuat
    $('body').hide().fadeIn(1000);

    // Animasi fadeOut saat link Logout diklik
    $('.button').click(function(event) {
        event.preventDefault(); // Menghentikan aksi default dari link
        var href = $(this).attr('href'); // Mengambil URL dari link
        // Animasi fadeOut sebelum menuju halaman Logout
        $('body').fadeOut(1000, function() {
            window.location.href = href; // Menuju halaman Logout setelah animasi fadeOut selesai
        });
    });
});
