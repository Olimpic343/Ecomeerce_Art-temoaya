document.addEventListener("DOMContentLoaded", function () {
    loadCart();
    loadWishlist();
});

// Cambia cantidad desde el botón
function updateQuantity(productId, action) {
    let qtyInput = document.getElementById(`qty-${productId}`);
    let quantity = parseInt(qtyInput.value) || 1;

    if (action === "plus") {
        quantity++;
    } else if (action === "minus" && quantity > 1) {
        quantity--;
    }

    qtyInput.value = quantity;
}

// Agrega producto al carrito con toda la info
function addToCart(productId, imageUrl, url, price, name) {
    let quantity = parseInt(document.getElementById(`qty-${productId}`).value) || 1;
    let cart = JSON.parse(localStorage.getItem("cart")) || {};

    if (cart[productId]) {
        cart[productId].quantity += quantity;
    } else {
        cart[productId] = {
            id: productId,
            name: name,
            image: imageUrl,
            url: url,
            price: parseFloat(price),
            quantity: quantity
        };
    }

    localStorage.setItem("cart", JSON.stringify(cart));
    alert("Producto agregado al carrito");
}

// Agrega producto a wishlist
function addToWishlist(productId, imageUrl, url, price, name) {
    let wishlist = JSON.parse(localStorage.getItem("wishlist")) || {};

    if (!wishlist[productId]) {
        wishlist[productId] = {
            id: productId,
            name: name,
            image: imageUrl,
            url: url,
            price: parseFloat(price)
        };
        localStorage.setItem("wishlist", JSON.stringify(wishlist));
        alert("Producto agregado a la lista de deseos");
    } else {
        alert("Este producto ya está en la lista de deseos");
    }
}

// Consolas de depuración (usadas al cargar)
function loadCart() {
    let cart = JSON.parse(localStorage.getItem("cart")) || {};
    console.log("Carrito cargado:", cart);
}

function loadWishlist() {
    let wishlist = JSON.parse(localStorage.getItem("wishlist")) || {};
    console.log("Lista de deseos cargada:", wishlist);
}

function editReview(reviewId, rating, comment){

    document.getElementById('reviewId').value = reviewId;
    document.getElementById('raiting_raiting').value = rating;
    document.getElementById('review_comment').value = comment;

}
