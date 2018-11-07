<?php
    if (isset($_GET['main']) && isset($_GET['sem']) && isset($_GET['sub'])) {
        $_main=filter_var(trim($_GET['main']), FILTER_SANITIZE_STRING);
        $_sem=filter_var(trim($_GET['sem']), FILTER_SANITIZE_STRING);
        $_sub=filter_var(trim($_GET['sub']), FILTER_SANITIZE_STRING);
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
    <title>Book Worm | Books</title>
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
                <ul class=" gridViewList gridViewList1">
                    <h4 class="bg-white p-3 rounded mb-3">Books (<?php echo $_main.' / Semester '.($_sem+1).' / '.$_sub; ?>)</h4>
                    <div class="loader-1 d-flex justify-content-center align-items-center flex-column">
                        <img src="/images/loader.gif">
                        <h1>Fetching Books...</h1>
                    </div>
                </ul>
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
            var _books=firebase.database().ref("Books/<?php echo trim($_main).'/Semester '.($_sem+1).'/'.trim($_sub); ?>");
            _books.on("value",function(_snapshot) {
                console.log(_snapshot.val());
                _array=_snapshot.val();
                if(_array==null) {
                    $("#mainCategory ul").append("<div class='d-flex justify-content-center align-items-center flex-column'><i class='mt-5 mb-2 fa fa-info-circle' style='font-size:60px'></i>No books found</div>");
                }
                for(var _node in _array) {
                    $("#mainCategory ul").append("<li>\
                    <div class='back-layer' style=\"background-image:url('"+_array[_node].image+"');\">\
                    </div>\
                    <div class='front-layer'>\
                    <h3>"+_array[_node].name+"</h3>\
                    <a href='/viewBook.php?<?php echo 'main='.$_main.'&sem='.$_sem.'&sub='.$_sub.'&node='; ?>"+_node+"' class='chooseMainCategory'><i class='fa fa-link mr-2'></i>Show Details</a>\
                    </div>\
                    </li>");
                }
                $(".loader-1").attr("style","display:none !important");
            });
        });
    </script>
</body>
</html>
