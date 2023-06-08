// Stop speech is used to prevent 

if (speechSynthesis.speaking) {
    
speechSynthesis.cancel();

    if (sayTimeout !== null)
        clearTimeout(sayTimeout);

    sayTimeout = setTimeout(function () { say(text); }, 250);
}