let firstInteraction = false;

function speak(text) {
  const msg = new SpeechSynthesisUtterance(text);
  window.speechSynthesis.speak(msg);
}

function onFirstInteraction() {
  if (!firstInteraction) {
    firstInteraction = true;
    document.removeEventListener('touchstart', onFirstInteraction);
  }
}

function removeOverlay() {
    const overlay = document.getElementById('overlay');
    if (overlay) {
      overlay.remove();
    }
  }

  function onFirstInteraction() {
    if (!firstInteraction) {
      firstInteraction = true;
      document.removeEventListener('touchstart', onFirstInteraction);
      removeOverlay();
    }
  }
  
window.onload = () => {
  document.addEventListener('touchstart', onFirstInteraction);
};
