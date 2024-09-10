setTimeout(() => {
    document.getElementById("orderStatus").style.display = "none";
    document.getElementById("deliveryStatus").style.display = "block";

    setTimeout(() => {
        document.getElementById("deliveryStatus").style.display = "none";
        document.getElementById("pickupStatus").style.display = "block";
    }, 10000);
}, 10000);

document.getElementById("completeOrderButton").addEventListener("click", function() {
    document.getElementById("pickupStatus").style.display = "none";
    window.location.href = "restaurants.php";
});
