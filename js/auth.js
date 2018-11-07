
var config = {
    apiKey: "AIzaSyAF0BrDTALjYeN5j-dgmlXGBdsp0Rkz-YI",
    authDomain: "bookworm-87259.firebaseapp.com",
    databaseURL: "https://bookworm-87259.firebaseio.com",
    projectId: "bookworm-87259",
    storageBucket: "bookworm-87259.appspot.com",
    messagingSenderId: "1046926518834"
};
firebase.initializeApp(config);
var database = firebase.database();
firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
        console.log("User is logged in | " + user)
        location.href = "/";
    } else {
        $("body .loader").attr("style", "display: none !important")
        console.log("User is logged out")
    }
});
