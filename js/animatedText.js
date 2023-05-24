const animatedText= document.getElementById('animated-text');
const text = animatedText.innerHTML;
animatedText.innerHTML = ''; 
for (let i = 0; i < text.length; i++) {
  setTimeout(() => {
    animatedText.innerHTML += text.charAt(i);
  }, 100 * i); 
}