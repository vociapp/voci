let firstInteraction = false;

function speak(text) {
    const msg = new SpeechSynthesisUtterance(text);
    window.speechSynthesis.speak(msg);
}

function onFirstInteraction() {
    if (!firstInteraction) {
        firstInteraction = true;
        document.removeEventListener('touchstart', onFirstInteraction);
        speak('Hello, this is your speech synthesis on page reload!');
    }
}

window.onload = () => {
    document.addEventListener('touchstart', onFirstInteraction);
};