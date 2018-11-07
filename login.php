<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Book Worm | Login</title>
</head>
<body style="background-color:#eee">
    <div class="loader d-flex justify-content-center align-items-center flex-column">
        <img src="/images/loader.gif">
        <h1>Loading</h1>
    </div>
    <div class="container">
        <div id="sideNavIcon">
            <p>Book <span>Worm</span></p>
        </div>
        <form id="loginForm">
            <h3>Member Area</h3>
            <input type="email" placeholder="Email ID" id='loginEmail'>
            <input type="password" placeholder="Password" id='loginPassword'>
            <input type="submit" value="Login" id='loginBtn'>
            <a class="text-center" href="/register.php">Not a member yet? Register now.</a>
        </form>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Mali|Roboto|Rokkitt:700" rel="stylesheet">
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.3/firebase.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.3/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.3/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.3/firebase-auth.js"></script>
    <script src="/js/auth.js"></script>
    <script>
    $(document).ready(function() {
        $("form").submit(function(_event) {
            $(".loader h1").text("Logging you in...");
            $(".loader").removeAttr("style");
            _event.preventDefault();
            var _email = $("#loginEmail").val();
            var _password =$("#loginPassword").val();
            if(_email.trim()!=="" && _password.trim()!="") {
                firebase.auth().signInWithEmailAndPassword(_email, _password).catch(function(_error) {
                    var _errorCode = _error.code;
                    var _errorMessage = _error.message;
                    if (_error.message != "") {
                        $(".loader").attr("style","display: none !important");
                        alert("Invalid Username/Password combination.")
                    }
                });
            } else {
                $(".loader").attr("style","display: none !important");
                alert("Empty fields");
            }
        });
    });
    </script>
</body>
</html>
