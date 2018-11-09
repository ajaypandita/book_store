<div class="col-lg-3 col-md-3" id="sideNav">
    <div id="sideNavIcon" onclick="location.href='index.php'" style="cursor:pointer">
        <p>Book <span>Worm</span></p>
    </div>
    <div id="sideNavList" style="position:relative">
        <ul class="list-group">
            <li class="list-group-item" onclick="location.href='/index.php'"><i class="fa fa-home"></i> Home</li>
            <li class="list-group-item" onclick="location.href='/mybooks.php'"><i class="fa fa-book"></i> My Books</li>
            <li class="list-group-item" onclick="location.href='/search.php'"><i class="fa fa-search"></i> Search</li>
            <li class="list-group-item" onclick="location.href='/about.php'"><i class="fa fa-user"></i> About Us</li>
        </ul>
        <h5 id="welcomeUser" style="text-align: center;width: 100%;position:absolute;bottom:0"></h5>
    </div>
    <div id="sideNavFooter">
        <button onclick="location.href='/sellbook.php'" class="btn btn-lg mb-2 text-light" style="background-color:#0077b5">Sell books<i class="fa fa-book ml-2"></i></button>
        <button class="block btn btn-lg mb-4 btn-danger" onclick="logout()">Logout<i class="fa fa-sign-out ml-2"></i></button>
        <ul class="list-group">
            <li onclick="location.href=''"><i class="fa fa-facebook"></i></li>
            <li onclick="location.href=''"><i class="fa fa-google"></i></li>
            <li onclick="location.href=''"><i class="fa fa-linkedin"></i></li>
            <li onclick="location.href=''"><i class="fa fa-twitter"></i></li>
        </ul>
    </div>
</div>
