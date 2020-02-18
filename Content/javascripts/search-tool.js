

//get data from user (type in)
function gettext() {
    var s = document.getElementById(text - content).value;
    return s;
}

//find match data
function matchData() {
    //Get input content
    var intxt = gettext();

    //get data from json file
    var myData = JSON.parse(data);

    //Result array
    var result = new Array();

    //loop finding match data
    for (var i = 0; i < myData.length; i++) {
        if (myData[i].startWith(intxt) == true) {
            //add to array 
            result.push(myData[i]);
        }

    }

    return result;
}

//suggestion
function suggetion() {
    var result = new Array();
    result = matchData();
    if (result.length > 0) {
        for (var i = 0; i < result.length; i++) {
            document.getElementById("suggetion").innerHTML = result[i];

        }
        
    }
}