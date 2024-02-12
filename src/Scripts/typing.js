const words = ['Awards', 'Interior Designings', 'Exterior Designings'];
let wordIndex = 0;
let charIndex = 0;
let isDeleting = false;

function type() {
  const word = words[wordIndex];
  const typingEffect = document.getElementById('typing-effect');

  if (isDeleting) {
    typingEffect.textContent = word.substring(0, charIndex - 1);
    charIndex--;
  } else {
    typingEffect.textContent = word.substring(0, charIndex + 1);
    charIndex++;
  }

  if (!isDeleting && charIndex === word.length) {
    isDeleting = true;
    setTimeout(type, 3000);
  } else if (isDeleting && charIndex === 0) {
    isDeleting = false;
    wordIndex++;
    if (wordIndex === words.length) {
      wordIndex = 0;
    }
    setTimeout(type, 500);
  } else {
    setTimeout(type, 100);
  }

}

type();



