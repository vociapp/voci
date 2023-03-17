// This script is used in the decks view
// It handles all of the speech recognition for that page.

if ('SpeechRecognition' in window) {

    var recognition = new window.SpeechRecognition();
    } else if ('webkitSpeechRecognition' in window) { // Check if webkitSpeechRecognition is supported
    var recognition = new window.webkitSpeechRecognition();
    } else if ('mozSpeechRecognition' in window) { // Check if webkitSpeechRecognition is supported
    var recognition = new window.mozSpeechRecognition();
    } else if ('msSpeechRecognition' in window) { // Check if webkitSpeechRecognition is supported
    var recognition = new window.msSpeechRecognition();
    } else {
    console.log('Speech recognition not supported');
}

recognition.continuous = true;
recognition.interimResults = false;
recognition.lang = 'en-US';
recognition.maxAlternatives = 5;

// Initializing the deck names and uuids from DOM
var deck_names = document.querySelectorAll('#deck_name');
var deck_uuids = document.querySelectorAll('#deck_uuid');

// Turning them into arrays
var deck_names_array = Array.from(deck_names);
var deck_uuids_array = Array.from(deck_uuids);

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

    // Creating commands for deck names in DOM
    for (var i = 0; i < deck_names_array.length; i++){

        // If a given deck name is spoken
        if (interim_transcript.toLowerCase().includes(deck_names_array[i].textContent.toLowerCase())){

            // Study the deck
            window.location.href = window.location.origin + '/study/initialize/' + deck_uuids_array[i].textContent;
        }
    }
};

recognition.start();
