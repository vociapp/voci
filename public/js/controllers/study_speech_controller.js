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

    for (var i = event.resultIndex; i < event.results.length; ++i) {
        if (event.results[i].isFinal) {
            final_transcript += event.results[i][0].transcript;
        }
    }
    
    // *********************************************************************************
    //                                      COMMANDS
    // *********************************************************************************

    if (final_transcript.includes("flip") ||
        final_transcript.includes("next") ||
        final_transcript.includes("skip"))
        {
        
        // Simply refresh the page to proceed
        window.location.href = currentUrl;
    }
    else if (final_transcript.includes("stop")){
        if (speechSynthesis.speaking) {
            speechSynthesis.cancel();
    
            // Make sure we don't create more than one timeout...
            if (sayTimeout !== null)
                clearTimeout(sayTimeout);
    
            sayTimeout = setTimeout(function () { say(text); }, 250);
        }
    }
    else if (final_transcript.includes("end") ||
            final_transcript.includes("decks") || 
            final_transcript.includes("home") ||
            final_transcript.includes("exit"))
        {

        // Find the root URL
        var rootUrl = window.location.origin;

        // Navigate to the decks directory
        window.location.href = rootUrl + '/decks/';
    }
    else if (final_transcript.includes("repeat") ||
            final_transcript.includes("recite")) {
        
        console.log("repeat");
        // Run text to speech script
        speechSynthesis.speak(utterance);
    }
};

recognition.start();