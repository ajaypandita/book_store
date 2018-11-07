<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Book Worm | My Books</title>
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
                    <h4 class="bg-white p-3 rounded mb-3">My Books</h4>
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
            setTimeout(function() {
                console.log("Email:"+_email)
                var _books=firebase.database().ref("users/"+_email+"/Myad/");
                _books.on("value",function(_snapshot) {
                    console.log(_snapshot.val());
                    _array=_snapshot.val();
                    if(_array==null) {
                        $("#mainCategory ul").append("<div class='d-flex justify-content-center align-items-center flex-column'><i class='mt-5 mb-2 fa fa-info-circle' style='font-size:60px'></i>No books found</div>");
                    } else {
                        $("#mainCategory ul").find("li").remove();
                        for(var _node in _array) {
                            $("#mainCategory ul").append("<li>\
                            <div class='back-layer' style=\"background-image:url('"+_array[_node].image+"');\">\
                            </div>\
                            <div class='front-layer'>\
                            <h3>"+_array[_node].name+"</h3>\
                            <a href='viewBook.php?main="+_array[_node].course+"&sem="+(_array[_node].semester-1)+"&sub="+_array[_node].subject+"&node="+_node+"'  class='text-primary chooseMainCategory'><i class='fa fa-link mr-2'></i>Show Details</a>\
                            <a main='"+_array[_node].course+"' sem='"+_array[_node].semester+"' sub='"+_array[_node].subject+"' node='"+_node+"' class='text-danger deleteThisBook' style='display:block;cursor:pointer;'><i class='fa fa-trash mr-2'></i>Delete this book</a>\
                            </div>\
                            </li>");
                        }
                    }
                    $(".loader-1").attr("style","display:none !important");
                });
            },3000);
            $(document).on("click",".deleteThisBook",(_e)=>{
                var _tempMain=$(_e.target).attr("main") || "";
                var _tempSem=$(_e.target).attr("sem") || "";
                var _tempSub=$(_e.target).attr("sub") || "";
                var _tempNode=$(_e.target).attr("node") || "";
                if(_tempMain!=="" || _tempSem!=="" || _tempSub!=="" || _tempNode!=="") {
                    console.log(_tempMain);
                    firebase.database().ref("/users/"+_email+"/Myad/"+_tempNode).remove();
                    firebase.database().ref("/Books/"+_tempMain+"/Semester "+_tempSem+"/"+_tempSub+"/"+_tempNode).remove();
                } else {
                    alert("There was some error.")
                }
            });
        });
    </script>
</body>
</html>
