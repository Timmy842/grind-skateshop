window.addEventListener('load', function() {

    let btnClientes = document.getElementById('btnClientes');
    let btnPedidos = document.getElementById('btnPedidos');
    let btnProductos = document.getElementById('btnProductos');
    let btnMarcas = document.getElementById('btnMarcas');

    if (btnClientes !== null)
        getClientes();

    btnClientes.addEventListener('click', getClientes, false);

    btnPedidos.addEventListener('click', getPedidos, false);

    btnProductos.addEventListener('click', getProductos, false);

    btnMarcas.addEventListener('click', getMarcas, false);

    let divMessageC = document.getElementById('messageConfirmation');
    let divMessageE = document.getElementById('messageError');

    if(divMessageC)
    {
        let btnClose = document.getElementById('btnCloseMessage');

        btnClose.addEventListener('click', () => {

            divMessageC.innerHTML = '';
            divMessageC.classList.add('hidden');
            
        }, false);

    }

    if(divMessageE)
    {
        let btnClose = document.getElementById('btnCloseMessage');

        btnClose.addEventListener('click', () => {

            divMessageE.innerHTML = '';
            divMessageE.classList.add('hidden');
            
        }, false);

    }

    let btnPedidosUser = document.getElementById('btnPedidosUser');

    if (btnPedidosUser !== null)
        btnPedidosUser.addEventListener('click', getPedidosUser, false);

}, false);

/* Peticion Async Await Clientes */

const urlAdminClientes = 'http://127.0.0.1:8000/admin/clientes';

async function getClientes()
{
    try {

        const res = await fetch(
            urlAdminClientes,
            {
                method: 'get',
                body: null
            }
        );

        if(res.status === 200)
        {
            let json = await res.json();

            let trHeadCliente = document.createElement('tr');

            trHeadCliente.innerHTML = `
                                    <th scope="col" class="px-6 py-3">ID</th>
                                    <th scope="col" class="px-6 py-3">Nombre</th>
                                    <th scope="col" class="px-6 py-3">Correo Electronico</th>
                                    <th scope="col" class="px-6 py-3">Telefono</th>
                                    <th scope="col" class="px-6 py-3">Fecha Creacion</th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Eliminar</span>
                                    </th>
                                  `;
            
            let theadCliente = document.getElementById('theadResponse');
            let tbodyClienteD = document.getElementById('tbodyResponse');
            let tfootCliente = document.getElementById('tfootResponse');

            if(tbodyClienteD.children !== null)
                tbodyClienteD.innerHTML = '';

            if(theadCliente.children !== null)
                theadCliente.innerHTML = '';
                
            if(tfootCliente.children !== null)
                tfootCliente.innerHTML = '';


            theadCliente.classList.add('text-xs', 'text-gray-700', 'uppercase', 'bg-gray-100');

            theadCliente.appendChild(trHeadCliente);

            json.forEach( item => {
                console.log(item)

                let trCliente = document.createElement('tr');

                trCliente.id = `row_${item.id}`;
                trCliente.classList.add('bg-white', 'border-b', 'hover:bg-gray-50');
                trCliente.innerHTML = `
                                        <td class="px-6 py-4 font-medium text-gray-900">${item.id}</td>
                                        <td class="px-6 py-4">${item.name}</td>
                                        <td class="px-6 py-4">${item.email}</td>
                                        <td class="px-6 py-4">${item.telf}</td>
                                        <td class="px-6 py-4">${item.created_at}</td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="/admin/delete/clientes/${item.id}" class="font-medium text-red-600 hover:underline">Eliminar</a>
                                        </td>
                                      `;
                
                let tbodyCliente = document.getElementById('tbodyResponse');

                tbodyCliente.appendChild(trCliente);
                
            });
            
        } else
            console.log('Status Server Error')

    } catch (error) {

        let divProfile = document.getElementById('divProfile');
        let pErr = document.createElement('p');

        pErr.innerHTML = `<p>Ha ocurrido un error con la peticion AJAX: ${error}</p>`;
        
        divProfile.appendChild(pErr);
    }
}

/* Peticion Async Await Pedidos */

const urlAdminPedidos = 'http://127.0.0.1:8000/get/admin/pedidos';

async function getPedidos()
{
    try {

        const res = await fetch(
            urlAdminPedidos,
            {
                method: 'get',
                body: null
            }
        );

        if(res.status === 200)
        {
            let json = await res.json();

            let trHeadPedido = document.createElement('tr');

            trHeadPedido.innerHTML = `
                                    <th scope="col" class="px-6 py-3">ID</th>
                                    <th scope="col" class="px-6 py-3">Nombre</th>
                                    <th scope="col" class="px-6 py-3">Correo Electronico</th>
                                    <th scope="col" class="px-6 py-3">Telefono</th>
                                    <th scope="col" class="px-6 py-3">Fecha Creacion</th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Eliminar</span>
                                    </th>
                                  `;
            
            let theadPedido = document.getElementById('theadResponse');
            let tbodyPedidoD = document.getElementById('tbodyResponse');

            if(tbodyPedidoD.children !== null)
                tbodyPedidoD.innerHTML = '';

            if(theadPedido.children !== null)
                theadPedido.innerHTML = '';


            theadPedido.classList.add('text-xs', 'text-gray-700', 'uppercase', 'bg-gray-100');

            theadPedido.appendChild(trHeadPedido);

            json.forEach( item => {
                console.log(item)

                let trPedido = document.createElement('tr');

                trPedido.id = `row_${item.id}`;
                trPedido.classList.add('bg-white', 'border-b', 'hover:bg-gray-50');
                trPedido.innerHTML = `
                                        <td class="px-6 py-4 font-medium text-gray-900">${item.id}</td>
                                        <td class="px-6 py-4">${item.name}</td>
                                        <td class="px-6 py-4">${item.email}</td>
                                        <td class="px-6 py-4">${item.telf}</td>
                                        <td class="px-6 py-4">${item.created_at}</td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="#" class="font-medium text-red-600 hover:underline">Eliminar</a>
                                        </td>
                                      `;
                
                let tbodyPedido = document.getElementById('tbodyResponse');

                tbodyPedido.appendChild(trPedido);
                
            });
            
        } else
            console.log('Status Server Error')

    } catch (error) {

        let divProfile = document.getElementById('divProfile');
        let pErr = document.createElement('p');

        pErr.innerHTML = `<p>Ha ocurrido un error con la peticion AJAX: ${error}</p>`;
        
        divProfile.appendChild(pErr);
    }
}

/* Peticion Async Await Productos */

const urlAdminProductos = 'http://127.0.0.1:8000/get/admin/productos';

async function getProductos()
{
    try {

        const res = await fetch(
            urlAdminProductos,
            {
                method: 'get',
                body: null
            }
        );

        console.log(res)
        
        if(res.status === 200)
        {
            let json = await res.json();

            console.log(json)

            let trHeadProductos = document.createElement('tr');

            trHeadProductos.innerHTML = `
                                    <th scope="col" class="px-6 py-3">ID</th>
                                    <th scope="col" class="px-6 py-3">Nombre</th>
                                    <th scope="col" class="px-6 py-3">Tipo Producto</th>
                                    <th scope="col" class="px-6 py-3">Marca</th>
                                    <th scope="col" class="px-6 py-3">Precio</th>
                                    <th scope="col" class="px-6 py-3">Medida</th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Editar</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Eliminar</span>
                                    </th>
                                  `;
            
            let trFootProductos = document.createElement('tr');

            trFootProductos.innerHTML = `
                                        <td colspan="8" class="px-6 py-4">
                                            <a href="admin/productos/create" class="bg-azul-principal hover:bg-azul-google text-white p-2 rounded-md">Nuevo Producto</a>
                                        </td>
                                        `;
            
            let theadProductos = document.getElementById('theadResponse');
            let tbodyProductosD = document.getElementById('tbodyResponse');
            let tfootProductos = document.getElementById('tfootResponse');

            if(tbodyProductosD.children !== null)
                tbodyProductosD.innerHTML = '';

            if(theadProductos.children !== null)
                theadProductos.innerHTML = '';

            if(tfootProductos.children !== null)
                tfootProductos.innerHTML = '';


            theadProductos.classList.add('text-xs', 'text-gray-700', 'uppercase', 'bg-gray-100');
            tfootProductos.classList.add('bg-white', 'border-b');

            theadProductos.appendChild(trHeadProductos);
            tfootProductos.appendChild(trFootProductos);

            json.forEach( item => {
                console.log(item)

                let trProductos = document.createElement('tr');

                trProductos.id = `row_${item.id}`;
                trProductos.classList.add('bg-white', 'border-b', 'hover:bg-gray-50');
                trProductos.innerHTML = `
                                        <td class="px-6 py-4 font-medium text-gray-900">${item.id}</td>
                                        <td class="px-6 py-4">${item.nombre}</td>
                                        <td class="px-6 py-4">${item.tipo}</td>
                                        <td class="px-6 py-4">${item.marca_id}</td>
                                        <td class="px-6 py-4">${item.precio} €</td>
                                        <td class="px-6 py-4">${item.medida}</td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="admin/productos/${item.id}/edit" class="font-medium text-green-500 hover:underline">Editar</a>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="admin/delete/productos/${item.id}" class="font-medium text-red-600 hover:underline">Eliminar</a>
                                        </td>
                                      `;
                
                let tbodyProductos = document.getElementById('tbodyResponse');

                tbodyProductos.appendChild(trProductos);
                
            });
            
        } else
            console.log('Status Server Error')

    } catch (error) {

        let divProfile = document.getElementById('divProfile');
        let pErr = document.createElement('p');

        pErr.innerHTML = `<p>Ha ocurrido un error con la peticion AJAX: ${error}</p>`;
        
        divProfile.appendChild(pErr);
    }
}

/* Peticion Async Await Marcas */

const urlAdminMarcas = 'http://127.0.0.1:8000/get/admin/marcas';

async function getMarcas()
{
    try {

        const res = await fetch(
            urlAdminMarcas,
            {
                method: 'get',
                body: null
            }
        );

        if(res.status === 200)
        {
            let json = await res.json();

            let trHeadMarcas = document.createElement('tr');

            trHeadMarcas.innerHTML = `
                                    <th scope="col" class="px-6 py-3">ID</th>
                                    <th scope="col" class="px-6 py-3">Nombre</th>
                                    <th scope="col" class="px-6 py-3 text-center">Imagen</th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Editar</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Eliminar</span>
                                    </th>
                                  `;

            let trFootMarcas = document.createElement('tr');

            trFootMarcas.innerHTML = `
                                        <td colspan="5" class="px-6 py-4">
                                            <a href="admin/marcas/create" class="bg-azul-principal hover:bg-azul-google text-white p-2 rounded-md">Nueva Marca</a>
                                        </td>
                                        `;
            
            let theadMarcas = document.getElementById('theadResponse');
            let tbodyMarcasD = document.getElementById('tbodyResponse');
            let tfootMarcas = document.getElementById('tfootResponse');

            if(tbodyMarcasD.children !== null)
                tbodyMarcasD.innerHTML = '';

            if(theadMarcas.children !== null)
                theadMarcas.innerHTML = '';
                
            if(tfootMarcas.children !== null)
                tfootMarcas.innerHTML = '';


            theadMarcas.classList.add('text-xs', 'text-gray-700', 'uppercase', 'bg-gray-100');
            tfootMarcas.classList.add('bg-white', 'border-b');

            theadMarcas.appendChild(trHeadMarcas);
            tfootMarcas.appendChild(trFootMarcas);

            json.forEach( item => {
                console.log(item)

                let trMarcas = document.createElement('tr');

                trMarcas.id = `row_${item.id}`;
                trMarcas.classList.add('bg-white', 'border-b', 'hover:bg-gray-50');
                trMarcas.innerHTML = `
                                        <td class="px-6 py-4 font-medium text-gray-900">${item.id}</td>
                                        <td class="px-6 py-4">${item.nombre}</td>
                                        <td class="px-6 py-4 flex justify-center h-32">
                                            <image src="${item.image}"></image>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="admin/marcas/${item.id}/edit" class="font-medium text-green-500 hover:underline">Editar</a>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="admin/delete/marcas/${item.id}" class="font-medium text-red-600 hover:underline">Eliminar</a>
                                        </td>
                                      `;
                
                let tbodyMarcas = document.getElementById('tbodyResponse');

                tbodyMarcas.appendChild(trMarcas);
                
            });
            
        } else
            console.log('Status Server Error')

    } catch (error) {

        let divProfile = document.getElementById('divProfile');
        let pErr = document.createElement('p');

        pErr.innerHTML = `<p>Ha ocurrido un error con la peticion AJAX: ${error}</p>`;
        
        divProfile.appendChild(pErr);
    }
}

/* Peticion Async Await Pedidos Cliente */

const urlAdminPedidosUser = 'http://127.0.0.1:8000/get/admin/pedidos';

async function getPedidosUser()
{
    try {

        const res = await fetch(
            urlAdminPedidos,
            {
                method: 'get',
                body: null
            }
        );

        if(res.status === 200)
        {
            let json = await res.json();

            let trHeadPedido = document.createElement('tr');

            trHeadPedido.innerHTML = `
                                    <th scope="col" class="px-6 py-3">ID</th>
                                    <th scope="col" class="px-6 py-3">Nombre</th>
                                    <th scope="col" class="px-6 py-3">Correo Electronico</th>
                                    <th scope="col" class="px-6 py-3">Telefono</th>
                                    <th scope="col" class="px-6 py-3">Fecha Creacion</th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Eliminar</span>
                                    </th>
                                  `;
            
            let theadPedido = document.getElementById('theadResponse');
            let tbodyPedidoD = document.getElementById('tbodyResponse');

            if(tbodyPedidoD.children !== null)
                tbodyPedidoD.innerHTML = '';

            if(theadPedido.children !== null)
                theadPedido.innerHTML = '';


            theadPedido.classList.add('text-xs', 'text-gray-700', 'uppercase', 'bg-gray-100');

            theadPedido.appendChild(trHeadPedido);

            json.forEach( item => {
                console.log(item)

                let trPedido = document.createElement('tr');

                trPedido.id = `row_${item.id}`;
                trPedido.classList.add('bg-white', 'border-b', 'hover:bg-gray-50');
                trPedido.innerHTML = `
                                        <td class="px-6 py-4 font-medium text-gray-900">${item.id}</td>
                                        <td class="px-6 py-4">${item.name}</td>
                                        <td class="px-6 py-4">${item.email}</td>
                                        <td class="px-6 py-4">${item.telf}</td>
                                        <td class="px-6 py-4">${item.created_at}</td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="#" class="font-medium text-red-600 hover:underline">Eliminar</a>
                                        </td>
                                      `;
                
                let tbodyPedido = document.getElementById('tbodyResponse');

                tbodyPedido.appendChild(trPedido);
                
            });
            
        } else
            console.log('Status Server Error')

    } catch (error) {

        let divProfile = document.getElementById('divProfile');
        let pErr = document.createElement('p');

        pErr.innerHTML = `<p>Ha ocurrido un error con la peticion AJAX: ${error}</p>`;
        
        divProfile.appendChild(pErr);
    }
}
