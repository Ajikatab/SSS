@extends('user.layouts.main')

@section('container')
    @php
        $checkout = session('checkout');
    @endphp
    <!-- SHOP SECTION -->
    <div class="movies" id="movies">
        <h2 class="heading" style="margin-top: 50px;">Shop Products</h2>

        <!-- Movies container  -->
        <div class="movies-container">
            <!-- Loop through your TMDb movie data here -->
            @foreach ($stores as $store)
                <div class="box" data-product-id="{{ $store->id }}">
                    <div class="box-img">
                        @if (isset($store->image))
                            <img src="{{ asset('storage/image-store/' . $store->image) }}" alt="Store Image">
                        @endif
                    </div>
                    <h3>{{ $store->name }}</h3>
                    <span>
                        RP {{ $store->price }}
                    </span>
                    <button class='btn-add-to-cart'>
                        <i class='bx bx-shopping-bag'></i> Tambahkan ke Keranjang
                    </button>
                </div>
            @endforeach
        </div>
    </div>

    <!-- CART SECTION -->
    <section class="cart-container">
        <h2 class="heading">Shopping Cart</h2>
        <ul class="cart-items"></ul>
        <div class="cart-total">
            <strong>Total:</strong> RP <span class="total-amount">0</span>
        </div>
        <button class="btn-checkout" type="submit" form="checkout-form">Checkout</button>

        <!-- Formulir Checkout -->
        <form action="{{ route('process.checkout') }}" method="post" class="checkout-form">
            @csrf
            <!-- Informasi Pengiriman -->
            <h3>Informasi Pengiriman</h3>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea id="alamat" name="alamat" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="telepon">Nomor Telepon:</label>
                <input type="tel" id="telepon" name="telepon" class="form-control" required>
            </div>

            <input type="hidden" id="total-amount-input" name="total_amount" value="0">

            <!-- Tombol Submit Checkout -->
            <button id="pay-button" class="btn" type="submit"
                data-snap-token="{{ session('checkout.snap_token') }}">Proses Checkout</button>

        </form>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#pay-button').on('click', function() {
                // Submit formulir secara manual
                $('#checkoutForm').submit();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Cart array to store added items
            var cart = [];

            // Add to Cart click event
            $('.btn-add-to-cart').on('click', function() {
                var productBox = $(this).closest('.box');
                var productId = productBox.data('product-id');
                var productName = productBox.find('h3').text();
                var productPrice = parseFloat(productBox.find('span').text().replace('RP ', ''));

                // Check if the product is already in the cart
                var existingItem = cart.find(item => item.id === productId);

                if (existingItem) {
                    existingItem.quantity += 1;
                } else {
                    cart.push({
                        id: productId,
                        name: productName,
                        price: productPrice,
                        quantity: 1,
                        image: productBox.find('.box-img img').attr('src')
                    });
                }

                // Update the cart display
                updateCartDisplay();
            });

            // Function to update the cart display
            function updateCartDisplay() {
                var cartItems = $('.cart-items');
                cartItems.empty();

                var totalAmount = 0;

                cart.forEach(function(item) {
                    var listItem = $('<li>').html(`
                    <div class="cart-item">
                        <div class="cart-item-img">
                            <img src="${item.image}" alt="${item.name}">
                        </div>
                        <div class="cart-item-info">
                            <h4>${item.name}</h4>
                            <p>RP ${item.price} x ${item.quantity}</p>
                        </div>
                        <div class="cart-item-actions">
                            <button class="btn-remove" data-product-id="${item.id}">Remove</button>
                            <button class="btn-increase" data-product-id="${item.id}">+</button>
                            <button class="btn-decrease" data-product-id="${item.id}">-</button>
                        </div>
                    </div>
                `);
                    cartItems.append(listItem);

                    // Event listener for remove button
                    listItem.find('.btn-remove').on('click', function() {
                        var productId = $(this).data('product-id');
                        removeCartItem(productId);
                    });

                    // Event listener for increase button
                    listItem.find('.btn-increase').on('click', function() {
                        var productId = $(this).data('product-id');
                        updateCartItemQuantity(productId, 1);
                    });

                    // Event listener for decrease button
                    listItem.find('.btn-decrease').on('click', function() {
                        var productId = $(this).data('product-id');
                        updateCartItemQuantity(productId, -1);
                    });

                    // Calculate total amount
                    totalAmount += item.price * item.quantity;
                });

                // Update total amount display
                $('.total-amount').text(totalAmount.toLocaleString('id-ID'));

                // Update the hidden input field for total amount
                $('#total-amount-input').val(totalAmount);

                // Show the cart section in the center
                $('.cart-container').addClass('show');
                sendCartToServer(cart);
            }

            // Function to remove item from cart
            function removeCartItem(productId) {
                cart = cart.filter(item => item.id !== productId);
                updateCartDisplay();
            }

            // Function to update item quantity in cart
            function updateCartItemQuantity(productId, quantityChange) {
                var cartItem = cart.find(item => item.id === productId);
                if (cartItem) {
                    cartItem.quantity += quantityChange;

                    if (cartItem.quantity <= 0) {
                        removeCartItem(productId);
                    } else {
                        updateCartDisplay();
                    }
                }
            }

            function sendCartToServer(cart) {
                var totalAmount = calculateTotalAmount(cart);
                var image = cart.length > 0 ? cart[0].image :
                    ''; // Ambil image dari item pertama (menggantinya dengan logika yang sesuai)

                // Kirim data ke server menggunakan AJAX
                $.ajax({
                    url: '/process-checkout', // Ganti dengan endpoint Laravel yang sesuai
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        cart: cart,
                        totalAmount: totalAmount,
                        image: image
                    },
                    success: function(response) {
                        console.log('Cart updated successfully:', response);
                        // window.location.href = '/confirmation';
                    },
                    error: function(error) {
                        console.error('Error updating cart:', error);
                    }
                });
            }

            function calculateTotalAmount(cart) {
                return cart.reduce(function(total, item) {
                    return total + (item.price * item.quantity);
                }, 0);
            }

            // Checkout button click event
            $('.btn-checkout').on('click', function() {
                // Menampilkan formulir checkout
                $('.checkout-form').show();
            });
        });
    </script>
@endsection

<style>
    .checkout-form {
        display: none;
        /* Sembunyikan secara default */
        margin-top: 20px;
    }

    .checkout-form .form-group {
        margin-bottom: 15px;
    }

    .cart-container {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 300px;
        background-color: #14b8b8;
        /* Ganti dengan warna sesuai tema web Anda */
        border: 1px solid #000000;
        /* Ganti dengan warna sesuai tema web Anda */
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: none;
        /* Sembunyikan secara default */
    }

    .cart-container.show {
        display: block;
    }

    .cart-container h2 {
        text-align: center;
        margin-bottom: 10px;
    }

    .cart-items {
        list-style-type: none;
        padding: 0;
        max-height: 200px;
        overflow-y: auto;
        /* Tambahkan scrollbar jika item terlalu banyak */
    }

    .cart-items li {
        margin: 5px 0;
        font-size: 16px;
    }

    .cart-total {
        margin-top: 10px;
        text-align: right;
    }

    .cart-item-img img {
        max-width: 50px;
        max-height: 50px;
        object-fit: cover;
        margin-right: 10px;
    }

    .cart-item-info h4 {
        margin: 0;
    }

    .cart-item-actions {
        display: flex;
        gap: 10px;
    }

    .btn-remove,
    .btn-increase,
    .btn-decrease {
        padding: 5px 10px;
        font-size: 12px;
        cursor: pointer;
        background-color: #FF0000;
        /* Ganti dengan warna merah sesuai tema web Anda */
        color: #FFFFFF;
        /* Ganti dengan warna putih untuk kontras teks */
        border: none;
        border-radius: 3px;
    }

    .btn-remove:hover,
    .btn-increase:hover,
    .btn-decrease:hover {
        background-color: #D80000;
        /* Ganti dengan warna merah yang lebih gelap jika diinginkan */
    }

    .cart-total {
        margin-top: 20px;
        text-align: right;
    }

    .cart-total strong {
        font-weight: bold;
        margin-right: 10px;
    }

    .cart-total .total-amount {
        font-size: 18px;
        color: #FFf;
        /* Ganti dengan warna merah sesuai tema web Anda */
        font-weight: bold;
    }
</style>
