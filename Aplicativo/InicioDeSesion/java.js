const $btnSignIn= document.querySelector('.sign-in-btn'),
      $btnSignUp = document.querySelector('.sign-up-btn'),  
      $signUp = document.querySelector('.sign-up'),
      $signIn  = document.querySelector('.sign-in');

document.addEventListener('click', e => {
    if (e.target === $btnSignIn || e.target === $btnSignUp) {
        $signIn.classList.toggle('active');
        $signUp.classList.toggle('active')
    }
});

document.querySelector('form').addEventListener('submit', function (event) {
    const nombre = document.querySelector('input[name="nombre"]').value;
    const telefono = document.querySelector('input[name="telefono"]').value;
    const email = document.querySelector('input[name="email"]').value;
    const contrasena = document.querySelector('input[name="contrasena"]').value;

    if (!nombre || !telefono || !email || !contrasena) {
        event.preventDefault(); 
        alert('Por favor, completa todos los campos requeridos.');
    }
});

