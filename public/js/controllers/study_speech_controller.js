// This script is used in the study/show view
// It handles all of the speech recognition for that page.

var currentUrl = window.location.href;

if ('SpeechRecognition' in window) {
    var recognition = new SpeechRecognition();
    } else if ('webkitSpeechRecognition' in window) { // Check if webkitSpeechRecognition is supported
    var recognition = new webkitSpeechRecognition();
    } else {
    console.log('Speech recognition not supported');
}
recognition.continuous = true;
recognition.interimResults = true;
recognition.lang = 'en-US';

recognition.onend = function() {
    recognition.start();
};

recognition.onresult = function(event) {
    var final_transcript = '';
    var interim_transcript = '';

    for (var i = event.resultIndex; i < event.results.length; ++i) {
        if (event.results[i].isFinal) {
            final_transcript += event.results[i][0].transcript;
        } else {
            interim_transcript += event.results[i][0].transcript;
        }
    }
    
    // *********************************************************************************
    //                                      COMMANDS
    // *********************************************************************************

    if (interim_transcript.includes("flip") ||
        interim_transcript.includes("next") ||
        interim_transcript.includes("continue") ||
        interim_transcript.includes("skip"))
        {
        
        // Simply refresh the page to proceed
        window.location.href = currentUrl;
    }
    else if (interim_transcript.includes("stop")){
        if (speechSynthesis.speaking) {
            speechSynthesis.cancel();
    
            // Make sure we don't create more than one timeout...
            if (sayTimeout !== null)
                clearTimeout(sayTimeout);
    
            sayTimeout = setTimeout(function () { say(text); }, 250);
        }
    }
    else if (interim_transcript.includes("end") ||
            interim_transcript.includes("decks") || 
            interim_transcript.includes("home") ||
            interim_transcript.includes("exit"))
        {

        // Find the root URL
        var rootUrl = window.location.origin;

        // Navigate to the decks directory
        window.location.href = rootUrl + '/decks/';
    }
    else if (interim_transcript.includes("repeat") ||
            interim_transcript.includes("recite")) {
        
        console.log("repeat");
        // Run text to speech script
        speechSynthesis.speak(utterance);
    }
};

recognition.start();