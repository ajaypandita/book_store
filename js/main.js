var config = {
    apiKey: "AIzaSyAF0BrDTALjYeN5j-dgmlXGBdsp0Rkz-YI",
    authDomain: "bookworm-87259.firebaseapp.com",
    databaseURL: "https://bookworm-87259.firebaseio.com",
    projectId: "bookworm-87259",
    storageBucket: "bookworm-87259.appspot.com",
    messagingSenderId: "1046926518834"
};
var _email="";
var _userDetails={};
firebase.initializeApp(config);
var database = firebase.database();
firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
        $("body .loader").attr("style", "display: none !important")
        console.log("User is logged in | " + user)
        _email=user.email.replace(".","_")
        console.log(_email)
        firebase.database().ref().child("/users/"+_email+"/details/").on("value",(_snapshot)=>{
            _userDetails=_snapshot.val();
            $("#welcomeUser").text("Welcome  "+_userDetails.full_name)
        })
    } else {
        $("body .loader").attr("style", "display: none !important")
        console.log("User is logged out")
        location.href = "/login.php";
    }
});
function logout() {
    $("body .loader h1").text("Logging you out...");
    $("body .loader").removeAttr("style");
    firebase.auth().signOut().then(function() {
    }, function(error) {
        $("body .loader").attr("style", "display: none !important")
        $("body .loader h1").text("Loading");
        alert("There was an error. Try again.")
    });
}

$(document).ready(function() {
    $("#sideNav").height($(window).height());
    $("#mainContainer").height($(window).height());
    $(".gridViewList1").height($(window).height()-80);
    $("#sellBookContainer").height($(window).height()-140);
    $("#bookDetails,.loader-1").height($(window).height()-100);
});

var _content={
    "B Com":{
        "image":"images/civil.jpg",
        "sems":{
            1:["financial accounting","mercantile laws","workshop on computer applications","micro economics","funtional communication skills-1","principles of management and organization behavior","workshop on excel modelling"],
            2:["financial accounting-2","workshopon computerized accounting","company law","environment and ecology","micro economics","advanced workshopon excel modelling","communication skills-2"],
            3:["auditing theory and practice","corporate accounting","meetings incentives conventions and exhibitions","business ethics and values","essentials of marketing","analytical skills-1","quantitative techniques"],
            4:["corporate accounting 2","cost accounting","e-commerce","research methodology","enterpreneurship development","workshop on business plan","analytical skills-2"],
            5:["managment accounting","income tax laws","workshopon practical taxation","indian financial system","banking insurance","general bank operations","business tourism and event management"],
            6:["indirect tax laws","legal aspects in banking and insurance","indian economics problemsand policies","basic financial management","travel agency and tour operartion","corporate strategy","marketing of financial servics","communication skills-3"],
        }
    },
    "B TECH CSE":{
        "image":"images/civil.jpg",
        "sems":{
            1:[
                "Math",
                "Physics",
                "Basic electrical and electronics engineering",
                "Mechanics",
                "Computer programming",
                "Environmental studies",
            ],
            2:[
                "Biology",
                "Enginering chemistry",
                "OOPs",
                "Engineering Graphics",
                "Differential equations",
                "Applied physics ",

            ],
            3:[
                "Data structure and algorithm",
                "Computer organisation and design",
                "Digital electronics",
                "Python programming",
                "Database",
                "Discrete mathematics",
            ],
            4:[
	               "Computer networks",
	                  "Programming in java",
	                     "Operatin Systems",
	                        "Software engineering",
	                           "Automata",
	                              "Probability and statics",
	                                 "Design and analysis of algorithm",
            ],
            5:[
	               "Computer graphics and visualization",
	                  "Compiler design",
	                     "Cyber security",
	                        "SAP",
	                           "Quantative aptitude",
            ],
            6:[
	               "Cloud computing",
	                  "Information system security",
	                     "Securing computing systems",
	                        "Artificial intelligence",
	                           "Reasoning aptitude",
            ],
            7:[
	               "Information  security",
	                  "Penetration testing",
	                     "Mobile computing",

            ],
            8:[
	               "Cryptography",
	                  "Data storage",
	                     "Software management",
	                        "Open source",

            ]
        }
    },
    "B Sc":{
        "image":"images/civil.jpg",
        "sems":{
            1:["financial accounting","mercantile laws","workshop on computer applications","micro economics","funtional communication skills-1","principles of management and organization behavior","workshop on excel modelling"],
            2:["financial accounting-2","workshopon computerized accounting","company law","environment and ecology","micro economics","advanced workshopon excel modelling","communication skills-2"],
            3:["auditing theory and practice","corporate accounting","meetings incentives conventions and exhibitions","business ethics and values","essentials of marketing","analytical skills-1","quantitative techniques"],
            4:["corporate accounting 2","cost accounting","e-commerce","research methodology","enterpreneurship development","workshop on business plan","analytical skills-2"],
            5:["managment accounting","income tax laws","workshopon practical taxation","indian financial system","banking insurance","general bank operations","business tourism and event management"],
            6:["indirect tax laws","legal aspects in banking and insurance","indian economics problemsand policies","basic financial management","travel agency and tour operartion","corporate strategy","marketing of financial servics","communication skills-3"],
        }
    },
    "B TECH":{
        "image":"images/civil.jpg",
        "sems":{
            1:["financial accounting","mercantile laws","workshop on computer applications","micro economics","funtional communication skills-1","principles of management and organization behavior","workshop on excel modelling"],
            2:["financial accounting-2","workshopon computerized accounting","company law","environment and ecology","micro economics","advanced workshopon excel modelling","communication skills-2"],
            3:["auditing theory and practice","corporate accounting","meetings incentives conventions and exhibitions","business ethics and values","essentials of marketing","analytical skills-1","quantitative techniques"],
            4:["corporate accounting 2","cost accounting","e-commerce","research methodology","enterpreneurship development","workshop on business plan","analytical skills-2"],
            5:["managment accounting","income tax laws","workshopon practical taxation","indian financial system","banking insurance","general bank operations","business tourism and event management"],
            6:["indirect tax laws","legal aspects in banking and insurance","indian economics problemsand policies","basic financial management","travel agency and tour operartion","corporate strategy","marketing of financial servics","communication skills-3"],
        }
    },

    "B TECH Civil":{
        "image":"images/civil.jpg",
        "sems":{
            1:[
                "Math",
                "Physics",
                "Basic electrical and electronics engineering",
                "Mechanics",
                "Computer programming",
                "Environmental studies",
            ],
            2:[
                "Biology",
                "Enginering chemistry",
                "OOPs",
                "Engineering Graphics",
                "Differential equations",
                "Applied physics ",

            ],
            3:[
                "Data structure and algorithm",
                "Computer organisation and design",
                "Digital electronics",
                "Python programming",
                "Database",
                "Discrete mathematics",
            ],
            4:[
	               "Computer networks",
	                  "Programming in java",
	                     "Operatin Systems",
	                        "Software engineering",
	                           "Automata",
	                              "Probability and statics",
	                                 "Design and analysis of algorithm",
            ],
            5:[
	               "Computer graphics and visualization",
	                  "Compiler design",
	                     "Cyber security",
	                        "SAP",
	                           "Quantative aptitude",
            ],
            6:[
	               "Cloud computing",
	                  "Information system security",
	                     "Securing computing systems",
	                        "Artificial intelligence",
	                           "Reasoning aptitude",
            ],
            7:[
	               "Information  security",
	                  "Penetration testing",
	                     "Mobile computing",

            ],
            8:[
	               "Cryptography",
	                  "Data storage",
	                     "Software management",
	                        "Open source",

            ]
        }
    },
};
