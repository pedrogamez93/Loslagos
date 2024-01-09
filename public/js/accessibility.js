// accessibility.js

function changeFontSize(action) {
    const body = document.body;
    const currentFontSize = parseInt(window.getComputedStyle(body).fontSize);
  
    if (action === 'increase') {
      body.style.fontSize = `${currentFontSize + 2}px`;
    } else if (action === 'decrease' && currentFontSize > 10) {
      body.style.fontSize = `${currentFontSize - 2}px`;
    }
  }
  
  function toggleHighContrast() {
    document.body.classList.toggle('high-contrast');
  }
  