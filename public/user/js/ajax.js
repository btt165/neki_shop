

document.querySelectorAll('.increase, .decrease').forEach(btn => {
    btn.addEventListener('click', function() {
        let itemDiv = this.closest('.item');
        let quantityEl = itemDiv.querySelector('.quantity');
        let quantity = parseInt(quantityEl.textContent);
        
        if (this.classList.contains('increase')) {
            quantity++;
        } else if (this.classList.contains('decrease') && quantity > 1) {
            quantity--;
        }

        quantityEl.textContent = quantity;

        let key = itemDiv.dataset.id; // key chính là product_id_size_color nếu bạn thay data-id
        updateQuantityAjax(key, quantity, itemDiv);
    });
});

function updateQuantityAjax(key, quantity, itemDiv) {
    fetch(window.updateCartUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': window.csrfToken
        },
        body: JSON.stringify({
            key: key,
            quantity: quantity
        })
    })
    .then(res => res.json())
    .then(data => {
        // Cập nhật giá sản phẩm
        itemDiv.querySelector('h4').innerHTML = data.item_total;
        document.querySelector('#cart-total').innerHTML = data.cart_total;
        document.querySelector('.summary__item span:first-child').innerHTML = data.subtotal;
    });
}