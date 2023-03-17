const button = document.getElementById("voiceEnable");
// button.setAttribute("onclick", "welcome()");

// Necessary for safari
// Safari will only speak after speaking from a button click
var isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);

function SpeakText() {
    var msg = new SpeechSynthesisUtterance();
    window.speechSynthesis.speak(msg);

    document.getElementsByClassName("wc-mic")[0].removeEventListener("click", SpeakText);
}

if (isSafari) {

    window.addEventListener("load", function () {
        document.getElementsByClassName("wc-mic")[0].addEventListener("click", SpeakText);
    });
}

// Needed to change between the two audio contexts
var AudioContext = window.AudioContext || window.webkitAudioContext;

var context;
var processor;

// Overrides the base constructor to use a singleton like structure
// Needed for Safari
var BasePrototype = AudioContext.prototype;
AudioContext = function () {
    return context;
};
AudioContext.prototype = BasePrototype;

// Sets the old style getUserMedia to use the new style that is supported in more browsers
window.navigator.getUserMedia = function (constraints, successCallback, errorCallback) {
    context = new BasePrototype.constructor;
    processor = context.createScriptProcessor(1024, 1, 1);
    processor.connect(context.destination);

    window.navigator.mediaDevices.getUserMedia(constraints)
        .then(function (e) {
            successCallback(e);
        })
        .catch(function (e) {
            errorCallback(e);
        });
};