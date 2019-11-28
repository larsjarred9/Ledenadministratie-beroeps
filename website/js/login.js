var attempt = 3;

var users = [{
    id: 1,
    username: "admin",
    password: "#1Geheim",
}, {
    id: 2,
    username: "thomas",
    password: "de_trein", // :D
}];

function getUserByProperty(key, value, strict, multiple, case_insensitive) {
    var result = [];

    for(var index in users) {
        var user = users[index];

        if(typeof user[key] != "undefined") {
            var compare = user[key];

            if(case_insensitive) {
                if(typeof compare == "string")
                    compare = compare.toLowerCase();
                
                if(typeof value == "string")
                    value = value.toLowerCase
            }
        }
    }
}

function login() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    if(username == "admin" && password == "#1Geheim") {
        window.location = "dashboard/index.php";
    } else if(username == "thomas" && password == "de_trein") {
        window.location = "dashboard/index.php"
    } else if(attempt > 1) {
        attempt --;
        alert("U heeft nog " +attempt+ " poging(en) over.");
        
    } else if(attempt == 0) {
        alert("Al u pogingen zijn op, probeer het over 15 minuten nog eens.");
        document.getElementById("username").disabled = true;
        document.getElementById("password").disabled = true;
        document.getElementById("submit").disabled = true;
    }
}