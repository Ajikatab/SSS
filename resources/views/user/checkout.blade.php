@extends('user.layouts.main')

@section('container')
    <div class="movies" id="movies">
        <h2 class="heading" style="margin-top: 50px;">Checkout</h2>

        <form action="/process-checkout" method="post">
            @csrf
            <!-- Ganti "/process-checkout" dengan URL yang sesuai untuk mengirim data checkout -->

            <!-- Informasi Pengiriman -->
            <h3>Informasi Pengiriman</h3>
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" required></textarea>

            <label for="telepon">Nomor Telepon:</label>
            <input type="tel" id="telepon" name="telepon" required>


            <!-- Tombol Submit -->
            <button class="btn" type="submit">Proses Checkout</button>
        </form>
    </div>
@endsection

<style>
    form {
        max-width: 800px;
        margin: auto;
        display: grid;
        gap: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input,
    textarea,
    select {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
    }

    button .btn {
        background-color: #FF0000;
        /* Ganti dengan warna sesuai tema web Anda */
        color: #FFFFFF;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    /* Styles untuk ukuran layar kecil */
    @media only screen and (max-width: 768px) {
        form {
            grid-template-columns: 1fr;
        }
    }
</style>
