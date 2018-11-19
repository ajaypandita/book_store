<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Book Worm | Search Books</title>
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
                    <h4 class="bg-white p-3 rounded mb-3">Search for books<input id="searchBooks" type="text" placeholder="Enter book name here..." class="mt-3 form-control"></h4>
                    <div class="loader-1 d-flex justify-content-center align-items-center flex-column" style="display:none !important">
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
        var _data={};
        firebase.database().ref("/Books").on("value",function(_snapshot){
            _data=_snapshot.val();
            console.log(_data);
        });
        $(document).ready(function() {
            $(document).on('change','#searchBooks', function(){
                $(".loader1").removeAttr("style");
                var _val=$(this).val().toLowerCase();
                console.log("Searching for "+_val);
                var _count=0;
                $("#mainContainer ul").html('<h4 class="bg-white p-3 rounded mb-3">Search for books<input id="searchBooks" type="text" placeholder="Enter book name here..." value="'+_val+'" class="mt-3 form-control"></h4>\
                <div class="loader-1 d-flex justify-content-center align-items-center flex-column" style="display:none !important">\
                    <img src="/images/loader.gif">\
                    <h1>Fetching Books...</h1>\
                </div>');
                for(var _main in _data) {
                    for(var _sem in _data[_main]) {
                        for(var _sub in _data[_main][_sem]) {
                            for(var _node in _data[_main][_sem][_sub]) {
                                var _array=_data[_main][_sem][_sub]
                                console.log(_array[_node].name+" | "+_val+" | "+(_array[_node].name.indexOf(_val)));
                                if(_array[_node].name.toLowerCase().indexOf(_val.toLowerCase()) > -1 || _array[_node].course.toLowerCase().indexOf(_val) > -1 || _array[_node].subject.toLowerCase().indexOf(_val) > -1) {
                                    console.log("Book found");
                                    console.log(_node);
                                    $("#mainCategory ul").append("<li>\
                                    <div class='back-layer' style=\"background-image:url('"+_array[_node].image+"');\">\
                                    </div>\
                                    <div class='front-layer'>\
                                    <h3>"+_array[_node].name+"</h3>\
                                    <a href='viewBook.php?main="+_array[_node].course+"&sem="+(_array[_node].semester-1)+"&sub="+_array[_node].subject+"&node="+_node+"'  class='text-primary chooseMainCategory'><i class='fa fa-link mr-2'></i>Show Details</a>\
                                    </div>\
                                    </li>");
                                    _count+=1;
                                }
                            }
                        }
                    }
                }
                if(!_count) {
                    $("#mainCategory ul").append("<div class='d-flex justify-content-center align-items-center flex-column'><i class='mt-5 mb-2 fa fa-info-circle' style='font-size:60px'></i>No books found</div>");
                }
                $(".loader1").attr('style',"display:none !important");
            });
        });
    </script>
</body>
</html>
