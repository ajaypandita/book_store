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
            background-image: url('/images/slider2.jpg');
            background-size: cover;
            background-position: 0 -100px;
            height: 400px !important;
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
            <div id="mainCategory">
                <div class="multiple-items">
                    <div class="items"></div>
                    <div class="items"></div>
                    <div class="items"></div>
                    <div class="items"></div>
                </div>
                <ul class=" gridViewList">

                </ul>
            </div>
            <div id="subCategory" class="row" style="display:none">
                <div class="col-lg-3 col-md-3" id="subCategoryList">
                    <p>Choose a semester</p>
                    <ul>

                    </ul>
                </div>
                <div class="col-lg-9 col-md-9" id="subCategoryExpand">
                    <ul class="gridViewList gridViewList2 d-flex" style="list-style:none">

                    </ul>
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
    var _mainCategory=[];
    var _selectedMainCategory="";
    function showSemester() {
        $("#subCategoryList ul").html('');
        for(var i=0;i<Object.keys(_content[_selectedMainCategory]['sems']).length;i++) {
            console.log("semester" + i)
            $("#subCategoryList ul").append("<li rel='"+(i)+"' class='chooseSemesterLink'>Semester "+(i+1)+"</li>");
        }
    }
    function showSubCategory(_semester) {
        $("#subCategoryExpand ul").html('');
        for(var i=0;i<_content[_selectedMainCategory]['sems'][Object.keys(_content[_selectedMainCategory]['sems'])[_semester]].length;i++) {
            $("#subCategoryExpand .gridViewList").append("<li onclick='location.href=\"/books.php?main="+_selectedMainCategory+"&sem="+_semester+"&sub="+encodeURIComponent(_content[_selectedMainCategory]['sems'][Object.keys(_content[_selectedMainCategory]['sems'])[_semester]][i])+"\"' style='background-color:#0077b5;cursor:pointer' class='text-white'><div >"+_content[_selectedMainCategory]['sems'][Object.keys(_content[_selectedMainCategory]['sems'])[_semester]][i]+"</div></li>");
        }
        $("#mainCategory").hide();
        $("#subCategory").show();
    }
    $(document).ready(function() {
        $("#subCategoryList").height($(window).height());
        $("#subCategoryExpand").height($(window).height());
        $("#mainContainer ul li").click(function() {
            $("#mainContainer").css("overflow","hidden");
            $("#mainContainer").scrollTop(0);
            $("#mainCategory").fadeOut();
            $("#subCategory").fadeIn();
        });
        for(var _main in _content) {
            _mainCategory.push(_main);
            $("#mainCategory ul").append("<li>\
            <div class='back-layer' style=\"background-image:url('"+_content[_main].image+"');\">\
            </div>\
            <div class='front-layer'>\
            <h3>"+_main+"</h3>\
            <a rel='"+_main+"'  class='text-primary chooseMainCategory'><i class='fa fa-link mr-2'></i>Show more</a>\
            </div>\
            </li>");
        }
        $(document).on("click",".chooseMainCategory",function() {
            console.log("Clicked");
            _selectedMainCategory=$(this).attr("rel");
            showSubCategory(0);
            showSemester();
        }).on("click",".chooseSemesterLink",function() {
            console.log("Clicked 2");
            _semesterTemp=$(this).attr("rel");
            showSubCategory(_semesterTemp);
        });
        $('.multiple-items').slick({
            infinite: true,
            autoplay:true,
            dots:true,
            autoplaySpeed:2000,
            slidesToShow: 1,
            slidesToScroll: 1
        });
    });
    </script>
</body>
</html>
