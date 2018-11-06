<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Book Worm</title>
</head>
<body>
    <div class="row">
        <div class="col-lg-3 col-md-3" id="sideNav">
            <div id="sideNavIcon">
                <p>Book <span>Worm</span></p>
            </div>
            <div id="sideNavList">
                <ul class="list-group">
                    <li class="list-group-item">Home</li>
                    <li class="list-group-item">Categories</li>
                    <li class="list-group-item">Search</li>
                    <li class="list-group-item">About Us</li>
                </ul>
            </div>
            <div id="sideNavFooter">
                <button class="btn btn-lg mb-2"><i class="fa fa-plus"></i>Sell books</button>
                <button class="btn btn-lg mb-5"><i class="fa fa-android"></i>Download android app</button>
                <ul class="list-group">
                    <li><i class="fa fa-facebook"></i></li>
                    <li><i class="fa fa-google"></i></li>
                    <li><i class="fa fa-linkedin"></i></li>
                    <li><i class="fa fa-twitter"></i></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-9 col-md-9" id="mainContainer">
            <div id="mainCategory">
                <ul class=" gridViewList">

                </ul>
                <div id="mainContainerFooter">
                    <p>Copyright &copy; BookWorm 2018</p>
                </div>
            </div>
            <div id="subCategory" class="row" style="display:none">
                <div class="col-lg-3 col-md-3" id="subCategoryList">
                    <p>Choose a semester</p>
                    <ul>
                        <li class="chooseSemesterLink">Semester 1</li>
                        <li class="chooseSemesterLink">Semester 2</li>
                        <li class="chooseSemesterLink">Semester 3</li>
                        <li class="chooseSemesterLink">Semester 4</li>
                        <li class="chooseSemesterLink">Semester 5</li>
                        <li class="chooseSemesterLink">Semester 6</li>
                        <li class="chooseSemesterLink">Semester 7</li>
                        <li class="chooseSemesterLink">Semester 8</li>
                    </ul>
                </div>
                <div class="col-lg-9 col-md-9" id="subCategoryExpand">
                    <ul class="gridViewList">

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
    <script>
        var _content={
            "bcom":{
                "image":"images/civil.jpg",
                "sems":{
                    1:["financial accounting ","mercantile laws","workshop on computer applications","micro economics","funtional communication skills-1 ","principles of management and organization behavior","workshop on excel modelling"],
                    2:["financial accounting-2","workshopon computerized accounting","company law","environment and ecology","micro economics","advanced workshopon excel modelling","communication skills-2"],
                    3:["auditing theory and practice","corporate accounting","meetings incentives conventions and exhibitions","business ethics and values","essentials of marketing","analytical skills-1","quantitative techniques"],
                    4:["corporate accounting 2","cost accounting","e-commerce","research methodology","enterpreneurship development","workshop on business plan","analytical skills-2"],
                    5:["managment accounting","income tax laws","workshopon practical taxation","indian financial system","banking insurance","general bank operations","business tourism and event management"],
                    6:["indirect tax laws","legal aspects in banking and insurance","indian economics problemsand policies","basic financial management","travel agency and tour operartion","corporate strategy","marketing of financial servics","communication skills-3"],
                }
            }
        };
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
                $("#subCategoryExpand ul").append("\
                <li>\
                    <div class='back-layer' style='background-image:url(\""+_content[_selectedMainCategory].image+"\");'>\
                    </div>\
                    <div class='front-layer'>\
                        <h3>"+_content[_selectedMainCategory]['sems'][Object.keys(_content[_selectedMainCategory]['sems'])[_semester]][i]+"</h3>\
                        <a href=''><i class='fa fa-link mr-2'></i>Find More</a>\
                    </div>\
                </li>");
            }
            $("#mainCategory").hide();
            $("#subCategory").show();
        }
        $(document).ready(function() {
            $("#sideNav").height($(window).height());
            $("#mainContainer").height($(window).height());
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
                        <a rel='"+_main+"' class='chooseMainCategory'><i class='fa fa-link mr-2'></i>Find More</a>\
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
        });
    </script>
</body>
</html>
