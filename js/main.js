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
    "COMPUTER SCIENCE ENGINEERING":{
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
    "CIVIL ENGINEERING":{
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
            "Applied physics",
            ],
            3:[
            "Building and town planning",
            "Concrete technology",
            "Surveying 1",
            "Structural mechanics",
            "Ethics and values",
            ],
            4:[
            "Geology and geotechnical engineering",
            "Structural mechanics 2",
            "Building construction",
            "Surveying 2",
            "Fluid mechanics",
            ],
            5:[
            "Design of structure 1",
            "Water resources and irrrigation",
            "Transportation engineering  1",
            "Advanced construction",
            "Foundation engineering",
            ],
            6:[
            "Design of structure 2",
            "Environmental engineering",
            "Transpotation engineering 2",
            "Law for engineer",
            ],
            7:[
            "Professional pratices",
            "Design of structures 3",
            "Construction and project management",
            ],
            8:[
            "Major Projects",
            ],
        }
    },
    "Electronics and communication engineering":{
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
            "Applied physics",
            ],
            3:[
            "Electronic devices and circuits 1",
            "Digital electronics",
            "Network analysics",
            "Linear control system",
            "Vector calculus",
            "Economics for engineeering",
            ],
            4:[
            "Signal and systems",
            "Electronics devices and circuits 2",
            "Electrical machines and drives",
            "Communication systems",
            "Electronics design",
            ],
            5:[
            "Electromagnetics engineering",
            "Integrated circuits and applications",
            "Microprocessor and computer architecture",
            "Modern measurement and instrumentation",
            "Digital electronics",
            "Microprocessor and microcontroller",
            ],
            6:[
            "Digital system design",
            "Antenna and wave propagation",
            "Fibre opticss",
            "Digital integrated circuit design",
            "Telecom  networks",
            "Modern processor archetecture",
            ],
            7:[
            "Satellite communiocation",
            "Data communicaion",
            "Embedded systems",
            "Microwave engineering",
            "Multimedia systems",
            "Wireless sensor",
            "VLSI design",
            "RF communication circuits",
            ],
            8:[
            "Major Projects",
            ]
        }
    },
    "Mehanical Engineeriing":{
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
            "Applied physics",
            ],
            3:[
            "Kinematics",
            "Thermodynamics",
            "Material technology",
            "Electrical technology",
            "Industrial drafting and machine design",
            ],
            4:[
            "Dynamics of machinery",
            "Mathematics for engineering",
            "Manufacturing process",
            "Fluid mechanics",
            ],
            5:[,
            "Dynamics of machinery 2",
            "Power plant engineering",
            "Fluid power engineering",
            "Heat and mass transfer",
            "Control engineering",
            ],
            6:[
            "Production technology",
            "Machine design 1",
            "Thermal engineering",
            "Law for enguineers",
            ],
            7:[,
            "Computer aided design",
            "Machine design 2",
            "Computer aided manufacturing",
            ],
            8:[,
            "Major Projects",
            ],
        }
    }
};
