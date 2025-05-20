
// Initialize cart
let cart = [];
let cartCount = 0;

// Add product to cart
document.querySelectorAll('.add-to-cart').forEach(button => {
  button.addEventListener('click', (e) => {
    const productId = e.target.getAttribute('data-product-id');
    const productName = e.target.getAttribute('data-product-name');
    const productPrice = parseFloat(e.target.getAttribute('data-product-price'));

    // Add the product to the cart array
    cart.push({ productId, productName, productPrice });

    // Update the cart count and display
    cartCount++;
    document.getElementById('cart-count').innerText = cartCount;
    updateCart();
  });
});

// Show or hide the cart
document.getElementById('cart-btn').addEventListener('click', () => {
  const cartElement = document.getElementById('cart');
  cartElement.style.display = cartElement.style.display === 'block' ? 'none' : 'block';
});

// Update cart view
function updateCart() {
  const cartItems = document.getElementById('cart-items');
  const totalPriceElement = document.getElementById('total-price');
  cartItems.innerHTML = '';

  let totalPrice = 0;

  cart.forEach((item, index) => {
    totalPrice += item.productPrice;
    const listItem = document.createElement('li');
    listItem.textContent = `${item.productName} - $${item.productPrice.toFixed(2)}`;
    
    // Create remove button
    const removeButton = document.createElement('button');
    removeButton.textContent = 'Remove';
    removeButton.addEventListener('click', () => removeFromCart(index));
    
    listItem.appendChild(removeButton);
    cartItems.appendChild(listItem);
  });

  totalPriceElement.innerText = totalPrice.toFixed(2);
}

// Remove item from cart
function removeFromCart(index) {
  cart.splice(index, 1);
  cartCount--;
  document.getElementById('cart-count').innerText = cartCount;
  updateCart();
}

// Checkout button
document.getElementById('checkout-btn').addEventListener('click', () => {
  if (cart.length > 0) {
    // Store cart data in session storage so it's available on the next page
    sessionStorage.setItem('cart', JSON.stringify(cart));

    // Redirect to payment page
    window.location.href = 'payment.html';
  } else {
    alert('Your cart is empty!');
  }
});
function logoutUser() {
    // Clear session or local storage (assuming you store login info there)
    sessionStorage.clear();
    localStorage.clear();
    alert('You have been logged out successfully!');
    window.location.href = 'sign.php'; // Redirect to login page
}
const specialLink = document.getElementById('specialLink');

specialLink.addEventListener('click', function(event) {
    event.preventDefault(); // Optional: prevents navigation if href="#"
    specialLink.classList.add('clicked');
});