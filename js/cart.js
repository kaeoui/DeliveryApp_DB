const cart = JSON.parse(localStorage.getItem("cart") || "[]");
const cartItems = document.getElementById("cartItems");
const totalPriceElement = document.getElementById("totalPrice");

let totalPrice = 0;

cart.forEach(item => {
    const li = document.createElement("li");
    li.textContent = `${item.name} - $${item.price}`;
    cartItems.appendChild(li);
    totalPrice += item.price;
});

totalPriceElement.textContent = totalPrice.toFixed(2);

    document.getElementById("checkoutButton").addEventListener("click", function() {
        // Almacenar el total en la sesión
        storeTotalInSession(totalPrice);
    
        // Redirigir a la página de pago
        window.location.href = "payment.html";
    });
    
    // Función para enviar el total al servidor y almacenarlo en la sesión
    function storeTotalInSession(total) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "store_total.php", true); // Cambia a tu archivo de procesamiento
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("total=" + total);

    }
