<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Book Worm | Sell Book</title>
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
                <div id="sellBookContainer">
                    <h3 class="box-title mb-4">Sell new book</h3>
                    <form action="config/sellBook.php" method="post" autocomplete="off" style="width:700px;">
                        <div class='form-group'>
                            <label>Title</label>
                            <input class='form-control' name="bookTitle" type="text" data-toggle="popover" title="Title" data-content="Enter title of new book here" autocomplete="off" required>
                        </div>
                        <div class='form-group'>
                            <label>Description</label>
                            <textarea class='form-control' rows=4 name="bookDescription" data-toggle="popover" title="Description" data-content="Enter description of new book." autocomplete="off" required></textarea>
                        </div>
                        <div class='form-group'>
                            <label>Price</label>
                            <input class='form-control' name="bookPrice" type="number" data-toggle="popover" title="Price" data-content="Enter price of new book here" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <div class="" style="display:flex">
                                <select class="form-control mr-2" style="margin-right:20px;" name='bookMainCategory'>

                                </select>
                                <select class="form-control" style="margin-right:20px;" name='bookSubCategory'>

                                </select>
                                <select class="form-control" name='bookSub2Category'>

                                </select>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label>Front Side</label>
                            <input class='form-control' name="bookFrontSide" type="file" data-toggle="popover" title="Front Side" data-content="Select front side image to upload"  required>
                        </div>
                        <div class='form-group'>
                            <label>Back Side</label>
                            <input class='form-control' name="bookBackSide" type="file" data-toggle="popover" title="Back Side" data-content="Select back side  to upload"  required>
                        </div>
                        <div class='form-group'>
                            <input class='btn btn-lg' style="color:#fff;background-color: #f33155;" id='bookSubmitBtn' value="Sell this book" type="submit">
                            <p id="bookStatus"></p>
                        </div>
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
        <script src="https://www.gstatic.com/firebasejs/5.5.7/firebase-storage.js"></script>
    <script src="/js/main.js"></script>
    <script>
        var _firebaseStorage=firebase.storage();
        var _ref=_firebaseStorage.ref();
        $(document).ready(function() {
            var _frontSideImage=_backSideImage=null;
            $("input[name=bookFrontSide]").change(function(e) {
                _frontSideImage=e.target.files[0];
                console.log("Front side image changed");
            });
            $("input[name=bookBackSide]").change(function(e) {
                _backSideImage=e.target.files[0];
                console.log("Back side image changed");
            });
            var _uploadUrl1=_uploadUrl2="";
            $("form").submit(function(event) {
                event.preventDefault();
                var _desc=$("textarea[name=bookDescription]").val()
                var _name=$("input[name=bookTitle]").val()
                var _price=$("input[name=bookPrice]").val()
                if(_frontSideImage!==null || _backSideImage!==null) {
                    var _time=new Date().getTime()+_email
                    var _uploadTask=_ref.child(_time+"_front").put(_frontSideImage);
                    _uploadTask.on("state_changed",(_snapshot)=>{
                        var progress = (_snapshot.bytesTransferred / _snapshot.totalBytes) * 100;
                        $("#bookStatus").text("Uploading : "+progress+"% done.")
                    },(_error)=>{
                        console.log(_error);
                    },()=>{
                        $("#bookStatus").text("Front image uploaded");
                        _uploadTask.snapshot.ref.getDownloadURL().then((_url)=>{
                            console.log("Image saved "+_time)
                            _uploadUrl1=_url
                            var _uploadTask=_ref.child(_time+"_back").put(_backSideImage);
                            _uploadTask.on("state_changed",(_snapshot)=>{
                                var progress = (_snapshot.bytesTransferred / _snapshot.totalBytes) * 100;
                                $("#bookStatus").text("Uploading : "+progress+"% done.")
                            },(_error)=>{
                                console.log(_error);
                            },()=>{
                                console.log("Image uploaded")
                                $("#bookStatus").text("Back image uploaded");
                                _uploadTask.snapshot.ref.getDownloadURL().then((_url)=>{
                                    _uploadUrl2=_url
                                    console.log(_uploadUrl1)
                                    console.log(_uploadUrl2)
                                    var _data={
                                        "Description":_desc,
                                        "Phone Number":_userDetails.phone,
                                        "Seller":_userDetails.full_name,
                                        "Seller Address":_userDetails.address+", "+_userDetails.state+", "+_userDetails.pincode,
                                        "course":_mainCategory,
                                        "email":_userDetails.email,
                                        "image":_uploadUrl1,
                                        "image2":_uploadUrl2,
                                        "name":_name,
                                        "price":_price,
                                        "semester":_subCategory,
                                        "subject":_sub2Category,
                                    };
                                    var _key=firebase.database().ref("/users/"+_email+"/Myad/").push().key;
                                    console.log("New key : "+_key);
                                    firebase.database().ref().child("/users/"+_email+"/Myad/"+_key).set(_data,(_error)=>{
                                        if(_error) {
                                            alert("There was an error. Try again later.")
                                        } else {
                                            firebase.database().ref().child("/Books/"+_mainCategory+"/Semester "+_subCategory+"/"+_sub2Category+"/"+_key).set(_data,(_error)=>{
                                                if(_error) {
                                                    alert("There was an error. Try again later.")
                                                } else {
                                                    alert("Book was successfully posted.")
                                                    location.href=""
                                                }
                                            });
                                        }
                                    });
                                })
                            });
                        })
                    });
                }
            });
            var _mainCategory=_subCategory=_sub2Category="";
            var _count=0;
            for(var _cat in _content) {
                if(_count==0){
                    _mainCategory=_cat;
                }
                $("select[name=bookMainCategory]").append("<option value='"+_cat+"'>"+_cat+"</option>");
                _temp=0
                for(var _sub in _content[_cat]["sems"]) {
                    if(_count==0 && _temp==0) {
                        _subCategory=_sub;
                    }
                    if(_count==0) {
                        $("select[name=bookSubCategory]").append("<option value='"+_sub+"'>"+_sub+"</option>");
                    }
                    _temp1=0
                    for(var _sub2 in _content[_cat]["sems"][_sub]) {
                        if(_count==0 && _temp==0 && _temp1==0) {
                            _sub2Category=_content[_cat]["sems"][_sub][_sub2]
                        }

                        if(_count==0 && _temp==0) {
                            $("select[name=bookSub2Category]").append("<option value='"+_content[_cat]["sems"][_sub][_sub2]+"'>"+_content[_cat]["sems"][_sub][_sub2]+"</option>");
                        }
                        _temp1+=1
                    }

                    _temp+=1;
                }
                _count+=1;
                console.log("Selected : "+_mainCategory+" "+_subCategory+" "+_sub2Category)
            }
            $("select[name=bookMainCategory]").change((_event)=>{
                var _val=$("select[name=bookMainCategory] option:selected").val();
                _mainCategory=_val;
                _subCategory=1
                _sub2Category=_content[_mainCategory]["sems"][_subCategory][0]
                console.log("Selected : "+_mainCategory+" "+_subCategory+" "+_sub2Category)
                $("select[name=bookSubCategory]").html('');
                $("select[name=bookSub2Category]").html('');
                for(var _cat in _content[_mainCategory]["sems"]) {
                    $("select[name=bookSubCategory]").append("<option value='"+_cat+"'>"+_cat+"</option>");
                }
                for(var _cat in _content[_mainCategory]["sems"][1]) {
                    $("select[name=bookSub2Category]").append("<option value='"+_content[_mainCategory]["sems"][1][_cat]+"'>"+_content[_mainCategory]["sems"][1][_cat]+"</option>");
                }
            })
            $("select[name=bookSubCategory]").change((_event)=>{
                var _val=$("select[name=bookSubCategory] option:selected").val();
                _subCategory=_val
                _sub2Category=_content[_mainCategory]["sems"][_subCategory][0]
                console.log("Selected : "+_mainCategory+" "+_subCategory+" "+_sub2Category)
                $("select[name=bookSub2Category]").html('');
                for(var _cat in _content[_mainCategory]["sems"][_subCategory]) {
                    $("select[name=bookSub2Category]").append("<option value='"+_content[_mainCategory]["sems"][_subCategory][_cat]+"'>"+_content[_mainCategory]["sems"][_subCategory][_cat]+"</option>");
                }
            })
            $("select[name=bookSub2Category]").change((_event)=>{
                var _val=$("select[name=bookSub2Category] option:selected").val();
                _sub2Category=_val
                console.log("Selected : "+_mainCategory+" "+_subCategory+" "+_sub2Category)
            })
        });
    </script>
</body>
</html>
