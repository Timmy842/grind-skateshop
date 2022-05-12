const secret_id = document.getElementById('secret_id');

require('./bootstrap');
require('./cantidadProducto');
require('./header');

if (secret_id !== null)
{
    require('./profileFetchPetition');
}