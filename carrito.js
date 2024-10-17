let carrito = [];
let total = 0;

function agregarAlCarrito(nombre, precio) {
    carrito.push({ nombre, precio });
    total += precio;
    actualizarCarrito();
}

function actualizarCarrito() {
    const productosDiv = document.getElementById('productos');
    const totalDiv = document.getElementById('total');
    
    productosDiv.innerHTML = '';
    carrito.forEach((producto, index) => {
        productosDiv.innerHTML += `
            <div class="producto">
                <span>${producto.nombre} - $${producto.precio.toFixed(2)}</span>
                <button class="btn-eliminar" onclick="eliminarDelCarrito(${index})">Eliminar</button>
            </div>
        `;
    });

    totalDiv.innerHTML = `<p><strong>Total: $${total.toFixed(2)}</strong></p>`;
}

function eliminarDelCarrito(index) {
    total -= carrito[index].precio;
    carrito.splice(index, 1);
    actualizarCarrito();
}

function pagar() {
    alert("Proceso de pago iniciado");
    // Aquí podrías hacer una llamada a tu backend para procesar el pago
}