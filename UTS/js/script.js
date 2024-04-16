$(document).ready(function() {
    $('#loginForm').submit(function() {
        var username = $('#username').val();
        var password = $('#password').val();
        if (username === "" || password === "") {
            alert("Both fields are required!");
            return false;
        }
        return true;
    });
});


