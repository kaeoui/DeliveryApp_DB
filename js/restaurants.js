document.querySelectorAll(".selectRestaurant").forEach(button => {
    button.addEventListener("click", function() {
        const restaurantId = this.parentElement.getAttribute("data-id");
        localStorage.setItem("selectedRestaurant", restaurantId);
        window.location.href = "foods.html";
    });
});
