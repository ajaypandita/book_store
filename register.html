<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Book Worm | Register</title>
</head>
<body style="background-color:#eee">
    <div class="container">
        <div id="sideNavIcon">
            <p>Book <span>Worm</span></p>
        </div>
        <form id="registerForm">
            <h3>Registration Form</h3>
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <input type="text" placeholder="Full Name" id='loginFullName' required>
                    <input type="text" placeholder="Address" id='loginAddress' required>
                    <input type="text" placeholder="State" id='loginState' required>
                    <input type="number" placeholder="Pincode" id='loginPincode' min="0" required>
                </div>
                <div class="col-xl-6 col-md-6">
                    <input type="number" placeholder="Phone Number" id='loginPhone' pattern="[0-9]{10,}" min="0" required>
                    <input type="email" placeholder="Email ID" id='loginEmail' required>
                    <input type="password" placeholder="Password" id='loginPassword' required>
                    <input type="password" placeholder="Re-enter Password" id="loginRpassword" required>
                </div>
                <input type="submit" value="Register" class="mt-3" id='registerBtn'>
            </div>
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
    <script>
    $(document).ready(function() {
        var _email=_fullname=_address=_phone=_pincode=_state="";
        $("form").submit(function(_event) {
            _event.preventDefault();
            var _email = $("#loginEmail").val();
            var _password =$("#loginPassword").val();
            var _rpassword =$("#loginRpassword").val();
            var _fullname =$("#loginFullName").val();
            var _address =$("#loginAddress").val();
            var _pincode =$("#loginPincode").val();
            var _state =$("#loginState").val();
            var _phone =$("#loginPhone").val();
            if(_password.trim()!==_rpassword.trim()) {
                alert("Password don't match!");
            } else if(_pincode <0 || _phone < 0) {
                alert("Invalid values");
            } else if(_email.trim()!=="" && _password.trim()!="" && _fullname.trim()!="" && _phone.trim()!="" && _address.trim()!="" && _state.trim()!="" && _pincode.trim()!="") {
                firebase.auth().createUserWithEmailAndPassword(_email,_password).then(function(_user) {
                    console.log("Updating")
                    var database = firebase.database();
                    console.log(_email)
                    var _tempEmail=_email;
                    _email=_email.trim().replace(".","_");
                    var _user={
                            "full_name":_fullname,
                            "email":_tempEmail,
                            "phone":_phone,
                            "address":_address,
                            "state":_state,
                            "pincode":_pincode
                    };
                    database.ref().child("Users").child(_email).child("details").set(_user);
                }).catch(function(_error1) {
                    if(_error1.message != "") {
                        console.log("Error : " + _error1.message);
                        alert("Server error! Try again later.")
                    }
                });
            } else {
                alert("Empty fields");
            }
        });
        var config = {
            apiKey: "AIzaSyDxvjhbCr8rYVWa_XkZiW4ifc-TNEsYnkE",
            authDomain: "book-worm-5404b.firebaseapp.com",
            databaseURL: "https://book-worm-5404b.firebaseio.com",
            projectId: "book-worm-5404b",
            storageBucket: "book-worm-5404b.appspot.com",
            messagingSenderId: "274246668092"
        };
        firebase.initializeApp(config);
        var database = firebase.database();
        firebase.auth().onAuthStateChanged(function(user) {
            if (user) {
                console.log("User is logged in | " + user);
                location.href = "/";
            } else {
                console.log("User is logged out")
            }
        });
    });
    </script>
</body>
</html>
