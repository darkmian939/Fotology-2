const usuarioForm = document.getElementById('Usuario');
const fotografoForm = document.getElementById('Fotografo');
const administradorForm = document.getElementById('Administrador');

const usuarioContainer = document.getElementById('usuarioContainer');
const fotografoContainer = document.getElementById('fotografoContainer');
const administradorContainer = document.getElementById('administradorContainer');

document.querySelectorAll('.header a').forEach((link) => {
    link.addEventListener('click', function (e) {
        e.preventDefault(); 

        usuarioContainer.style.display = 'none';
        fotografoContainer.style.display = 'none';
        administradorContainer.style.display = 'none';

        const userType = link.getAttribute('data-user-type');
        if (userType === 'Usuario') {
            usuarioContainer.style.display = 'block';
        } else if (userType === 'Fotografo') {
            fotografoContainer.style.display = 'block';
        } else if (userType === 'Administrador') {
            administradorContainer.style.display = 'block';
        }
    });
});

