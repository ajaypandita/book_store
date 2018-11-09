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
    "B TECH CSE":{
        "image":"images/civil.jpg",
        "sems":{
            1:[
                "Maths",
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
	               "ompiler design",
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
	               "Information security",
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
    "B TECH Civil":{
        "image":"images/civil.jpg",
        "sems":{
            1:[
            "Maths",
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
    "B TECH Electronics":{
        "image":"images/civil.jpg",
        "sems":{
            1:[
            "Maths",
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
			"Wireless sensor ",
			"VLSI design",
			"RF communication circuits",
            ],
            8:[
            "Major Projects",
            ]
        }
    },
    "B TECH Mechanical":{
        "image":"images/civil.jpg",
        "sems":{
            1:[
            "Maths",
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
			"Applied physics,
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
    },
	"Bachelor of Commerce":{
        "image":"images/civil.jpg",
        "sems":{
            1:[
            "financial accounting",
            "mercantile laws",
            "workshop on computer applications",
            "micro economics",
            "funtional communication skills-1",
            "principles of management and organization behavior",
			"workshop on excel modelling",
            ],
            2:[
            "financial accounting-2",
            "workshopon computerized accounting",
            "ompany law",
            "environment and ecology",
            "micro economics",
            "advanced workshopon excel modelling",
			"communication skills-2",
            ],
            3:[
            "auditing theory and practice",
            "corporate accounting",
            "meetings incentives conventions and exhibitions",
            "business ethics and values",
            "essentials of marketing",
			"analytical skills-1",
			"quantitative techniques"
            ],
            4:[
            "corporate accounting 2",
            "cost accounting",
            "e-commerce",
            "research methodology",
			"enterpreneurship development",
			"workshop on business plan",
			"analytical skills-2",
            ],
            5:[,
            "Dmanagment accounting",
            "income tax laws",
            "workshopon practical taxation",
            "indian financial system",
            "banking insurance",
			"general bank operations",
			"business tourism and event management",
            ],
            6:[
            "indirect tax laws",
            "legal aspects in banking and insurance",
            "indian economics problemsand policies",
            "basic financial management",
			"travel agency and tour operartion",
			"corporate strategy",
			"marketing of financial servics",
			"communication skills-3",
            ],
        }
    },
	"Bachelor of Science":{
        "image":"images/civil.jpg",
        "sems":{
            1:[
            "mercantile laws",
			"workshop on computer applications",
			"environmental studies",
			"micro economics",
			"principles and practices of management",
			"entrepreneurship development",
			"communication skills-1",
            ],
            2:[
            "financial accounting",
			"macro economics",
			"essentials of organization behaviour",
			"workshop on excel modelling",
			"business ethics",
			"business communication skills-1",
            ],
            3:[
            "cost and management accounting",
			"banking and insurance",
			"essentials of marketing",
			"introduction to acting",
			"quantitative aptitude",
			"business communication skills-2",
			"business mathematics",
            ],
            4:[
            "company law",
			"basic financial management",
			"human resource management",
			"building a character",
			"reasoning aptitude",
			"soft skills",
			"quantitative techniques",
            ],
            5:[,
            "research methodology",
			"business environment",
			"summer project",
			"event management",
			"essentials of consumer behavior",
			"production and perations management",
			"creating a role",
            ],
            6:[
            "introduction to international business",
			"corporate strategy",
			"e-business",
			"fundamentals of promotions managament",
			"selling and sales management",
			"scene work",
            ],
        }
    }
};
