<?php
    if (isset($_GET['main']) && isset($_GET['sem']) && isset($_GET['sub']) && isset($_GET['node'])) {
        $_main=filter_var(trim($_GET['main']), FILTER_SANITIZE_STRING);
        $_sem=filter_var(trim($_GET['sem']), FILTER_SANITIZE_STRING);
        $_sub=filter_var(trim($_GET['sub']), FILTER_SANITIZE_STRING);
        $_node=filter_var(trim($_GET['node']), FILTER_SANITIZE_STRING);
    } else {
        die("Missing paramters.");
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Book Worm | View Book</title>
</head>
<body>
    <div class="loader d-flex justify-content-center align-items-center flex-column">
        <img src="/images/loader.gif">
        <h1>Loading</h1>
    </div>
    <div class="row">
        <?php require("sidenav.php"); ?>
        <div class="col-lg-9 col-md-9" id="mainContainer" style="background-color:#eee">
            <div id="mainCategory">
                <div id="bookDetails">
                    <div class="loader-1 d-flex justify-content-center align-items-center flex-column">
                        <img src="/images/loader.gif">
                        <h1>Fetching Books Details...</h1>
                    </div>
                    <div class="row" id="bookDetailsMain" style="display:none">
                        <div class="col-lg-3 col-md-12" id="bookDetailsImages">
                            <img src="" id="bookDetailsMainImg">
                            <div class="d-flex p-2 justify-content-center">
                                <div class="d-flex flex-column justify-content-center" style="align-items: flex-start;width:50%;">
                                    <img src="" class="mr-2" id="bookDetailsImg1" style="width:100%">
                                    <p>Front</p>
                                </div>
                                <div class="d-flex flex-column justify-content-center" style="align-items: flex-start;width:50%;">
                                    <img src="" id="bookDetailsImg2" style="width:100%">
                                    <p>Back</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12" id="bookDetailsRight">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td><h1 id="bookDetailsName"></h1></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td><h4 id="bookDetailsDesc"></h4></td>
                                    </tr>
                                    <tr>
                                        <td>Price</td>
                                        <td><h4 id="bookDetailsPrice"></h4></td>
                                    </tr>
                                    <tr>
                                        <td>Category</td>
                                        <td><h5 id="bookDetailsSubject"></h5></td>
                                    </tr>
                                    <tr>
                                        <td>Seller</td>
                                        <td><h5 id="bookDetailsSeller"></h5></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
    <script src="/js/main.js"></script>
    <script>
        $(document).ready(function() {
            var _books=firebase.database().ref("Books/<?php echo $_main.'/Semester '.($_sem+1).'/'.$_sub.'/'.$_node; ?>");
            _books.on("value",function(_snapshot) {
                _array=_snapshot.val();
                console.log(_array);
                $("#bookDetailsMainImg").attr("src",_array.image)
                $("#bookDetailsImg1").attr("src",_array.image)
                $("#bookDetailsImg2").attr("src",_array.image2)
                $("#bookDetailsName").text(_array.name)
                $("#bookDetailsDesc").text(_array.Description)
                $("#bookDetailsPrice").html("<i class='fa fa-inr'></i>"+_array.price)
                $("#bookDetailsSubject").text(_array.course+" / "+_array.semester+" / "+_array.subject)
                $("#bookDetailsSeller").html("<b>"+_array.Seller+"</b><br>"+_array["Seller Address"]+"<br><span style='font-size:16px;color:#777'>Phone: "+_array["Phone Number"]+"</span><br><span style='font-size:16px;color:#777'>Email: "+_array["email"]+"</span>")
                $(".loader-1").attr("style","display:none !important");
                $("#bookDetailsMain").show()
            });
            $("#bookDetailsImg1,#bookDetailsImg2").click(function() {
                $("#bookDetailsMainImg").attr("src",$(this).attr("src"))
            });
        });
    </script>
</body>
</html>
