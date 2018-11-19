<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Book Worm</title>
    <style>
        .multiple-items {

        }
        .items {
            position: relative;
            background-image: url('/images/slider2.jpg');
            background-size: cover;
            background-position: 0 -100px;
            height: 400px !important;
        }
        .items::before {
            background-color: #0007;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            display: block;
            content: '';
            z-index: 1;
        }
        .items h1 {
            z-index: 100;
        }
    </style>
</head>
<body>
    <div class="loader d-flex justify-content-center align-items-center flex-column">
        <img src="/images/loader.gif">
        <h1>Loading</h1>
    </div>
    <div class="row">
        <?php require("sidenav.php"); ?>
        <div class="col-lg-9 col-md-9" id="mainContainer">
            <div class="container">
                <div class="bg-white m-4 p-4">
                    <h2 class="pb-2 mb-4" style="border-bottom:1px solid #aaa">My Profile</h2>
                    <form class="form">
                        <table class="table table-bordered">
                            <tr>
                                <td>Full Name</td>
                                <td><input type="text" id="profileName" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><input type="text" id="profileAddress" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>State</td>
                                <td>
                                    <select name="stateslist" id="profileState" class="form-control">
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
                                </td>
                            </tr>
                            <tr>
                                <td>Pincode</td>
                                <td><input type="number" min="0" pattern="[0-9]{6}" id="profilePincode" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td><input type="number" min="0" pattern="[0-9]{10}" id="profilePhone" class="form-control"></td>
                            </tr>
                        </table>
                        <button class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Mali|Roboto|Rokkitt:700" rel="stylesheet">
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="https://www.gstatic.com/firebasejs/5.5.7/firebase.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.7/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.7/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.7/firebase-database.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="/js/main.js"></script>
    <script>
    var _email=_fullname=_address=_phone=_pincode=_state="";
    $("form").submit(function(_event) {
        _event.preventDefault();
        console.log("removing style");
        $(".loader h1").text("Updating your profile on BookWorm..");
        $(".loader").removeAttr("style");
        var _fullname =$("#profileName").val();
        var _address =$("#profileAddress").val();
        var _pincode =$("#profilePincode").val();
        var _state =$("#profileState").val();
        var _phone =$("#profilePhone").val();
        if(_pincode <0 || _phone < 0) {
            alert("Invalid values");
            $(".loader").attr("style","display: none !important");
        } else if(_phone.length !== 10){
            alert("Invalid phone number");
            $(".loader").attr("style","display: none !important");
        } else if(_pincode.length!==6){
            alert("Invalid pincode");
            $(".loader").attr("style","display: none !important");
        } else if(_email.trim()!=="" && _fullname.trim()!="" && _phone.trim()!="" && _address.trim()!="" && _state.trim()!="" && _pincode.trim()!="") {
            var database = firebase.database();
            console.log(_email)
            var _tempEmail=_email;
            _email=_email.trim().replace(".","_");
            var _user={
                "fullname":_fullname,
                "phone":_phone,
                "address":_address,
                "state":_state,
                "pincode":_pincode
            };
            database.ref().child("users").child(_email).child("details").update(_user);
            $(".loader").attr("style","display: none !important");
        } else {
            $(".loader").attr("style","display: none !important");
            alert("Empty fields");
        }
    });
    </script>
</body>
</html>
