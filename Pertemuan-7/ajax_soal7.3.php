<!DOCTYPE html>
<html>
<head>
    <title>Form Input dengan Validasi</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Form Input dengan Validasi</h1>
    <form id="myForm" method="post">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama">
        <span id="nama-error" style="color: red"></span>
        <br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email">
        <span id="email-error" style="color: red"></span>
        <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <span id="password-error" style="color: red"></span>
        <br>


        <input type="submit" value="Submit">
    </form>
    <div id="response"></div>

    <script>
        $(document).ready(function() {
            $("#myForm").on('submit', function(event) {
                event.preventDefault(); // Mencegah form dari submit biasa

                var nama = $("#nama").val();
                var email = $("#email").val();
                var valid = true;

                // Validasi sisi klien
                if (nama === "") {
                    $("#nama-error").text("Nama harus diisi.");
                    valid = false;
                } else {
                    $("#nama-error").text("");
                }

                if (email === "") {
                    $("#email-error").text("Email harus diisi.");
                    valid = false;
                } else {
                    $("#email-error").text("");
                }

                if ($("#password").val().length < 8) {
                    $("#password-error").text("Password harus minimal 8 karakter.");
                    valid = false;
                } else {
                    $("#password-error").text("");
                }


                // Jika validasi sukses, kirim data dengan AJAX
                if (valid) {
                    $.ajax({
                        url: 'proses_validasi.php', // Ganti dengan URL tujuan
                        type: 'POST',
                        data: {
                            nama: nama,
                            email: email
                        },
                        success: function(response) {
                            // Tampilkan respons dari server
                            $("#response").html(response);
                            // Bersihkan form
                            $("#myForm")[0].reset();
                        },
                        error: function(xhr, status, error) {
                            // Tampilkan error jika ada
                            $("#response").html("Terjadi kesalahan: " + error);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
