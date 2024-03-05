/* global bootstrap fetch */
(() => {
    let deleteCode = document.getElementById('deleteCode');
    let deleteName = document.getElementById('deleteName');
    let deleteUrl = document.getElementById('deleteUrl');
        const csrf = document.querySelector('meta[name="csrf-token"]')['content'];
    //let urlBase = 'https://carmelo.ieszaidinvergeles.es/laraveles/ajaxApp/public';
    const urlBase = document.querySelector('meta[name="url-base"]')['content'] + '/';

    let llamadaAjax = (url, procesarRespuesta) => {
        fetch(url, {
          method: 'GET',
          headers: {
            'Accept': 'application/json'
          }
        })
        .then(response => response.json())
        .then(data => {
            procesarRespuesta(data);
        })
        .catch(error => {
            console.log(error);
        });
    };
    


    let generarTextoProducto = (producto) => {
        return   `<div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="images/${producto.imagen}" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">${producto.nombre}</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>${producto.precio}</h6>
                                </div>
                            </div>
            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a id='btAddChart' dataset="${producto.nombre}" datasetCode="${producto.precio}" 
            class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                            </div>
                            </div>
                        </div>`;};

    let generarContenidoAjax = (data) => {
        let todo = '';
        data.productos.data.forEach(producto => {
            todo += generarTextoProducto(producto);
        });
        let contenidoAjax = document.getElementById('contenidoAjax');
        contenidoAjax.innerHTML = todo;
    };
    
let generarEnlacePagina = (link, index) => {
  return ` 
    <li class="page-item"><a id="pagina-${index}" class="page-link"
      href="//">${link.label}</a>
    </li>`;
};

let agregarEventosPaginacion = (data) => {
  data.productos.links.forEach((link, index) => {
    let botonPagina = document.getElementById(`pagina-${index}`);
    botonPagina.addEventListener('click', function(event) {
      event.preventDefault(); // Evita que el enlace cambie de página
      shopProducto(link.url);
    });
  });
};

let generarPaginacionAjax = (data) => {
    let todo = '';
    data.productos.links.forEach((link, index) => {
        todo += generarEnlacePagina(link, index);
    });
    let paginacionAjax = document.getElementById('paginacionAjax');
    paginacionAjax.innerHTML = todo;
    agregarEventosPaginacion(data);
    agregarEventoAddChart();
   
};

    let shopProducto = (url) => {
        llamadaAjax(url, (data) => {
            document.getElementById('contenidoAjax').innerHTML = '';
            generarContenidoAjax(data);
            generarPaginacionAjax(data);
        });
    }

    document.addEventListener('DOMContentLoaded', function(event) {
      let url = urlBase + 'shop/producto?page=1';
      shopProducto(url);
       cargarCarrito(); 
      
    });
      
    document.getElementById('btBorrarPais').onclick = () =>{
        peticionBorrarPais();
          cargarCarrito();
    };
   

let agregarEventoAddChart = () => {
    let addChartButtons = document.querySelectorAll('#btAddChart');
    addChartButtons.forEach(button => {
        button.addEventListener('click', () => {
            AddChart(button.getAttribute('dataset'), button.getAttribute('datasetCode'));
        });
    });
};
    let agregarEventoOneLess = () => {
    let addChartButtons = document.querySelectorAll('#oneLess');
    addChartButtons.forEach(button => {
        button.addEventListener('click', () => {
            
            Rest(button.getAttribute('data-name'), button.getAttribute('data-code'));
        });
    });
};
    let agregarEventoOneMore = () => {
    let addChartButtons = document.querySelectorAll('#oneMore');
    addChartButtons.forEach(button => {
        button.addEventListener('click', () => {
            
            AddChart(button.getAttribute('data-name'), button.getAttribute('data-code'));
        });
    });
};
    
    function cargarCarrito() {
    // Realiza una solicitud AJAX para obtener los datos del carrito
    fetch('https://jcarrey1403.ieszaidinvergeles.es/laraveles/tiendaApp/public/shop/chart', {
        method: 'GET',
        headers: {
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        let carritoElement = document.getElementById('modal-body');
    carritoElement.innerHTML = '';

    // Iterar sobre los elementos del carrito
    for (let pais in data) {
        let producto = data[pais];
        let nombre = producto[0].name;
        let code = producto[0].code;
        let precio = producto[0].code; // Supongamos que tienes una función para obtener el precio del producto
        let cantidad = producto[1];
        console.log(cantidad)
        // Crear un elemento para mostrar el producto en el carrito
        let productoElement = document.createElement('div');
        productoElement.classList.add('feature', 'col');

        // Crear y agregar elementos para mostrar la información del producto
        let iconoElement = document.createElement('div');
        iconoElement.classList.add('feature-icon', 'd-inline-flex', 'align-items-center', 'justify-content-center', 'text-bg-primary', 'bg-gradient', 'fs-2', 'mb-3');
        iconoElement.innerHTML = `
            <svg class="bi" width="1em" height="1em">
                <use xlink:href="#collection"></use>
            </svg>`;
        productoElement.appendChild(iconoElement);

        let nombreElement = document.createElement('h3');
        nombreElement.classList.add('fs-2', 'text-body-emphasis');
        nombreElement.textContent = nombre+' '+cantidad;
        productoElement.appendChild(nombreElement);

        let precioElement = document.createElement('h4');
        precioElement.classList.add('fs-2', 'text-body-emphasis');
        precioElement.textContent = precio*cantidad + ' €';
        productoElement.appendChild(precioElement);

        let eliminarElement = document.createElement('a');
        eliminarElement.classList.add('icon-link');
        eliminarElement.href = '#';
        eliminarElement.innerHTML = `
            
        <h3>   
    <i id="oneLess" data-name="`+nombre+`" data-code="`+code+`" class="bi bi-caret-left"> - </i>
    `+cantidad+`
    <i id="oneMore" data-name="`+nombre+`" data-code="`+code+`" class="bi bi-caret-right"> + </i>
</h3>
`;
           
        productoElement.appendChild(eliminarElement);

        // Agregar el elemento del producto al carrito
        carritoElement.appendChild(productoElement);
        agregarEventoOneMore();
        agregarEventoOneLess();
    }
    })
    .catch(error => console.error("Error:", error));
}
    
function Rest(name, code) {
    let data = {
        name: name,
        code: code
    };

    fetch('https://jcarrey1403.ieszaidinvergeles.es/laraveles/tiendaApp/public/shop/rest/' + code, { // Utilizamos el helper url() para obtener la URL base
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrf // Asegúrate de incluir el token CSRF si es necesario
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
         console.log("cargando carrito")
            cargarCarrito();
    })
    .catch(error => console.error("Error:", error));
}

    
    
    
    
    
    
    
    
    function AddChart(name,code) {
      let data = {
              code: code,
              name: name,
        };

console.log("Código del país a borrar:", data.name);
   

    // Realizar la petición DELETE
    fetch(('https://jcarrey1403.ieszaidinvergeles.es/laraveles/tiendaApp/public/shop/' + data.name), {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-CSRF-TOKEN': csrf
    },
    body: JSON.stringify(data)
})
    .then(response => response.json())
    .then(data => {
        console.log("cargando carrito", data);
        cargarCarrito();
    })
    .catch(error => {
        console.error("Error:", error);
        // Registra la respuesta de error
        if (error.response) {
            console.error("Datos de la respuesta de error:", error.response.data);
            console.error("Estado de la respuesta de error:", error.response.status);
            console.error("Encabezados de la respuesta de error:", error.response.headers);
        }
        cargarCarrito(); // Es posible que desees cargar el carrito incluso si hay un error
    });

    }
    
    
       var deletePaisModal = document.getElementById('deletePaisModal');
    console.log(deletePaisModal)
    deletePaisModal.addEventListener('shown.bs.modal', function (event) {
      console.table({
          dataset : event.relatedTarget.dataset.url,
          datasetCode : event.relatedTarget.dataset.code,
          
      });
       
      //let url = event.relatedTarget.dataset.url;
      //let code = event.relatedTarget.dataset.code;

      
      
      /*editCode.value = code;
      editUrl.value = url;
      editName.value = '';*/
    });
    
    function peticionBorrarPais() {

    // Realizar la petición DELETE
    fetch('https://jcarrey1403.ieszaidinvergeles.es/laraveles/tiendaApp/public/shop/AFG', {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
           'X-CSRF-TOKEN': csrf
        },
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        if (data.result > 0) {
            // Borrado exitoso, actualizar la interfaz o mostrar un mensaje
             var modalElem = document.querySelector('#deletePaisModal');
                var modalInstance = bootstrap.Modal.getInstance(modalElem);
                modalInstance.hide();
                var modalBody = document.getElementById('modal-body');
    while (modalBody.firstChild) {
    modalBody.removeChild(modalBody.firstChild);
}
        } else {
            // El borrado no fue exitoso, mostrar un mensaje de error
            var errorAlert = document.getElementById('errorAlert');
            errorAlert.className = 'alert alert-danger';
        }
    })
    .catch(error => console.error("Error:", error));
}
let agregarEventoFiltrarTalla = () => {
    let addChartButtons = document.querySelectorAll('#checkboxSize');
    addChartButtons.forEach(button => {
        button.addEventListener('click', () => {
            if (button.checked ||  button.tagName === 'A') {
                console.log(button.getAttribute('dataset'));
                FilterProducts(button.getAttribute('Category'),button.getAttribute('dataset'));

            } else {
                            FilterProducts('');
              
            }
        });
    });
};

/*------------------------Flitrado-----------------------------*/
function FilterProducts(filterType, filterValue) {
    let url;

    if (filterType === 'Talla') {
        // Construir la URL para filtrar por nombre
        url = urlBase + 'searchbytalla?Talla=' + encodeURIComponent(filterValue);
    } else if (filterType === 'Genero') {
        // Construir la URL para filtrar por precio
        url = urlBase + 'searchbytalla?Genero=' + encodeURIComponent(filterValue);
    } else {
        // Si no se especifica un tipo de filtro válido, realizar una búsqueda sin filtro
        url = urlBase + 'shop/producto';
    }
 console.log(url)
    // Realizar la solicitud AJAX al servidor con la URL construida
    fetch(url, {
        method: 'GET',
        headers: {
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        // Procesar los resultados de la búsqueda
        document.getElementById('contenidoAjax').innerHTML = ''; // Limpiar el contenido anterior
        generarContenidoAjax(data); // Mostrar los resultados de la búsqueda
        generarPaginacionAjax(data); // Mostrar la paginación si es necesario
    })
    .catch(error => console.error("Error:", error));
}
})();

