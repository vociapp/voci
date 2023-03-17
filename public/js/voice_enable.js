function speak(text) {
    const msg = new SpeechSynthesisUtterance(text);
    window.speechSynthesis.speak(msg);
}

function onFirstInteraction() {
    document.removeEventListener('touchstart', onFirstInteraction);
    const hiddenButton = document.getElementById('hiddenButton');
    hiddenButton.click();
}

window.onload = () => {
    const hiddenButton = document.getElementById('hiddenButton');
    hiddenButton.addEventListener('click', () => speak('Hello, this is your speech synthesis on page reload!'));
    document.addEventListener('touchstart', onFirstInteraction);
};