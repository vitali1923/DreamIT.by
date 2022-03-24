function light(obj) {
    //document.getElementById("tr_" + obj).style.backgroundColor = "#ccc";
    var perem = document.querySelectorAll("#tr_" + obj + " td");
    for (var i = 0; i < perem.length; i++) {
        perem[i].style.borderColor = "red";
    }
}