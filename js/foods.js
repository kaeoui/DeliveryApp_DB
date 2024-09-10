document.querySelectorAll(".addToCart").forEach(button => {
    button.addEventListener("click", function() {
        const name = this.getAttribute("data-name");
        const price = parseFloat(this.getAttribute("data-price"));
        const cart = JSON.parse(localStorage.getItem("cart") || "[]");
        
        // Añadir el producto al carrito
        cart.push({ name, price });
        localStorage.setItem("cart", JSON.stringify(cart));

        // Actualizar el contador del carrito
        let cartCount = cart.length;
        document.getElementById("cartCount").textContent = cartCount;
    });
});

// Botón para ver el carrito
document.getElementById("viewCartButton").addEventListener("click", function() {
    window.location.href = "cart.html";  // Redirige a la página del carrito
});