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
    <div class="loader d-flex justify-content-center align-items-center flex-column">
        <img src="/images/loader.gif">
        <h1>Loading</h1>
    </div>
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
                    <select name="stateslist" id="loginState">
                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                        <option value="Daman and Diu">Daman and Diu</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Lakshadweep">Lakshadweep</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Orissa">Orissa</option>
                        <option value="Pondicherry">Pondicherry</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttaranchal">Uttaranchal</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="West Bengal">West Bengal</option>
                    </select>
                    <input type="number" placeholder="Pincode" id='loginPincode' min="0" pattern="[0-9]{6}" required>
                </div>
                <div class="col-xl-6 col-md-6">
                    <input type="number" placeholder="Phone Number" id='loginPhone' pattern="[0-9]{10}" min="0" required>
                    <input type="email" placeholder="Email ID" id='loginEmail' required>
                    <input type="password" placeholder="Password" id='loginPassword' required>
                    <input type="password" placeholder="Re-enter Password" id="loginRpassword" required>
                </div>
                <input type="submit" value="Register" class="mt-3" id='registerBtn'>
            </div>
            <a class="text-center" href="/login.php">Already a member? Login now.</a>
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
        var _email=_fullname=_address=_phone=_pincode=_state="";
        $("form").submit(function(_event) {
            _event.preventDefault();
            console.log("removing style");
            $(".loader h1").text("Registering you on BookWorm..");
            $(".loader").removeAttr("style");
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
                $(".loader").attr("style","display: none !important");
            } else if(_pincode <0 || _phone < 0) {
                alert("Invalid values");
                $(".loader").attr("style","display: none !important");
            } else if(_phone.length !== 10){
                alert("Invalid phone number");
                $(".loader").attr("style","display: none !important");
            } else if(_pincode.length!==6){
                alert("Invalid pincode");
                $(".loader").attr("style","display: none !important");
            } else if(_email.trim()!=="" && _password.trim()!="" && _fullname.trim()!="" && _phone.trim()!="" && _address.trim()!="" && _state.trim()!="" && _pincode.trim()!="") {
                firebase.auth().createUserWithEmailAndPassword(_email,_password).then(function(_user) {
                    console.log("Updating")
                    var database = firebase.database();
                    console.log(_email)
                    var _tempEmail=_email;
                    _email=_email.trim().replace(".","_");
                    var _user={
                        "fullname":_fullname,
                        "email":_tempEmail,
                        "phone":_phone,
                        "address":_address,
                        "state":_state,
                        "pincode":_pincode
                    };
                    database.ref().child("users").child(_email).child("details").set(_user);
                    $(".loader").attr("style","display: none !important");
                }).catch(function(_error1) {
                    if(_error1.message != "") {
                        console.log("Error : " + _error1.message);
                        $(".loader").attr("style","display: none !important");
                        alert("User already exists!")
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
