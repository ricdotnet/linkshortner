//var output = document.getElementById("output");

const urlname = document.getElementById("urlname"); //get urlname input
const urldestination = document.getElementById("urldestination"); //get urldestination input

const urlsubmit = document.getElementById("urlsubmit"); //get submit button

//validate url
function validateURL() {

    var desturl;

    try {
        desturl = new URL(urldestination.value);
    } catch(err) {
        return false;
    }

    //console.log("url done")
    return true;
}

//validate both inputs
function validateForm() {

    var nameLength = urlname.value.length;

    if(validateURL() == true && nameLength > 5) {
        urlsubmit.disabled = false;

        //console.log("yes done")
    }

    //console.log("not yet")

}

//create a timer for refresh
var timer = setInterval(myTimer, 1000);
var secondsError = 4;
var secondsSuccess = 16;

function myTimer() {

    if(getMessage() != false && type == "error") {

        message = "A link with that name already exists.\n"
        + "Refreshing in...";

        secondsError--;
        //output.textContent = message + " " + secondsError;
        
        errorBox.textContent = message + " " + secondsError;
        errorBox.style.display = "block";
        errorBox.style.visibility = "visible";

        console.log("error")

    } else if(getMessage() != false && type == "success") {

        message = "Please save this link.\n"
                + "Refreshing in... ";

        secondsSuccess--;
        //outputSuccess.textContent = message + " " + secondsSuccess;

        successBox.textContent = message + " " + secondsSuccess;
        successBox.style.display = "block";
        generatedLink.style.display = "block";
        successBox.style.visibility = "visible";
        generatedLink.style.visibility = "visible";

        console.log("success")

    }
}

//get message (error or confirm)
const outputError = document.getElementById("showError");
const outputSuccess = document.getElementById("showSuccess");

const errorBox = document.getElementById("outputerror");
const successBox = document.getElementById("outputsuccess");
const generatedLink = document.getElementById("generatedLink");
var type;

function getMessage() {
    
    if(outputError != null) {

        type = "error";

        //return outputError.textContent;

        return true;


    } else if(outputSuccess != null) {

        type = "success";
        //return outputSuccess.textContent;

        return true;

    }

    return false; //if no message yet return false
}
//const message = getMessage(); //set the default message