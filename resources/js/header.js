let buttonLogout = document.querySelector('#logout');

if(buttonLogout === null)
{
    console.log('Waiting...');
} else {

    buttonLogout.addEventListener('click', function (e) {

        confirm('¿Desea cerrar sesion?');
    
    })
    
}