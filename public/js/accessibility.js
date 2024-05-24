// accessibility.js

        // JavaScript para cambiar el tamaño de fuente
        document.getElementById('increase-font').addEventListener('click', function() {
          changeFontSize('increase');
      });

      document.getElementById('decrease-font').addEventListener('click', function() {
          changeFontSize('decrease');
      });

      function changeFontSize(action) {
          const body = document.body;
          const currentSize = parseFloat(window.getComputedStyle(body).fontSize);

          if (action === 'increase') {
              body.style.fontSize = `${currentSize * 1.2}px`;
          } else if (action === 'decrease') {
              body.style.fontSize = `${currentSize * 0.8}px`;
          }

          // Guardar el tamaño de fuente en una cookie
          document.cookie = `font-size=${body.style.fontSize};path=/`;
      }

      // JavaScript para cambiar el tema de contraste
      document.getElementById('toggle-contrast').addEventListener('click', function() {
          document.body.classList.toggle('high-contrast');

          // Guardar el estado de contraste en una cookie
          const contrastState = document.body.classList.contains('high-contrast') ? 'enabled' : 'disabled';
          document.cookie = `contrast-state=${contrastState};path=/`;
      });

      // Función para leer cookies
      function getCookie(name) {
          const match = document.cookie.match(new RegExp(`(?:^|; )${name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1')}=([^;]*)`));
          return match ? decodeURIComponent(match[1]) : null;
      }

      // Restaurar configuración al cargar la página
      const fontSize = getCookie('font-size');
      const contrastState = getCookie('contrast-state');

      if (fontSize) {
          document.body.style.fontSize = fontSize;
      }

      if (contrastState === 'enabled') {
          document.body.classList.add('high-contrast');
      }