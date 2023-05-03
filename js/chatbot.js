// Collapsible
var coll = document.getElementsByClassName("collapsible");

for (let i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function () {
        this.classList.toggle("active");

        var content = this.nextElementSibling;

        if (content.style.maxHeight) {
            content.style.maxHeight = null;
        } else {
            content.style.maxHeight = content.scrollHeight + "px";
        }

    });
}

function getTime() {
    let today = new Date();
    hours = today.getHours();
    minutes = today.getMinutes();

    if (hours < 10) {
        hours = "0" + hours;
    }

    if (minutes < 10) {
        minutes = "0" + minutes;
    }

    let time = hours + ":" + minutes;
    return time;
}

// Gets the first message
function firstBotMessage() {
    let firstMessage = "Hello!How's it going?"
    document.getElementById("botStarterMessage").innerHTML = '<p class="botText"><span>' + firstMessage + '</span></p>';

    let time = getTime();

    $("#chat-timestamp").append(time);
    document.getElementById("userInput").scrollIntoView(false);
}

firstBotMessage();

// Retrieves the response
function getHardResponse(userText) {
    let botResponse = getBotResponse(userText);
    let botHtml = '<p class="botText"><span>' + botResponse + '</span></p>';
    $("#chatbox").append(botHtml);

    document.getElementById("chat-bar-bottom").scrollIntoView(true);
}

//Gets the text text from the input box and processes it
function getResponse() {
    let userText = $("#textInput").val();

    if (userText == "") {
        userText = "I love Cheli Beti!";
    }

    let userHtml = '<p class="userText"><span>' + userText + '</span></p>';

    $("#textInput").val("");
    $("#chatbox").append(userHtml);
    document.getElementById("chat-bar-bottom").scrollIntoView(true);

    setTimeout(() => {
        getHardResponse(userText);
    }, 1000)

}

// Handles sending text via button clicks
function buttonSendText(sampleText) {
    let userHtml = '<p class="userText"><span>' + sampleText + '</span></p>';

    $("#textInput").val("");
    $("#chatbox").append(userHtml);
    document.getElementById("chat-bar-bottom").scrollIntoView(true);

    //Uncomment this if you want the bot to respond to this buttonSendText event
    // setTimeout(() => {
    //     getHardResponse(sampleText);
    // }, 1000)
}

function sendButton() {
    getResponse();
}

function heartButton() {
    buttonSendText("Heart clicked!")
}

// Press enter to send a message
$("#textInput").keypress(function (e) {
    if (e.which == 13) {
        getResponse();
    }
});

function getBotResponse(input) {
    //rock paper scissors
    if (input == "do you sell pads"||input=="Do you sell pads?"||input=="do you sell pads?") {
        return "No, we distribute it for free according to your period cycle.";
    } else if (input == "What is your location?"||input=="Location"||input=="what is your location"||input=="whats your locaiton") {
        return "We are located in your nearest ward office.";
    } else if (input == "how do i get pads"||input == "How do i get pads"||input == "how do i obtain pads") {
        return "You can visit your nearest ward office after receiving notification or get them delivered.";
    }
    else if (input == "what should i bring to get pads"||input=="What should i bring to get pads") {
        return "You can bring your Citizenship or show you personal QR code on the mobile phone.";
    }
    else if (input == "period pain"||input=="menstruation"||input=="cancer"||input=="women health") {
        return "Please visit our article section to get more information.";
    }
    // Simple responses
    if (input == "hello"||input=="Hello"||input=="hi"||input=="Hi"||input=="hiiii") {
        return "Hello there!";
    } else if (input == "goodbye"||input=="Goodbye"||input=="See you"||input=="bye") {
        return "Bye! Talk to you later!";
    } else {
        return "For further enqurie please visit contact us page. Thank you!";
    }
}