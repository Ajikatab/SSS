@extends('user.layouts.main')

@section('container')
    <h2 class="heading" style="margin-top: 50px;">Konfirmasi Pembayaran</h2>
    <div class="container">

        <!-- Display the confirmation information here -->
        <div>
            <form>
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama"
                    value="{{ isset($checkoutData['nama']) ? $checkoutData['nama'] : 'N/A' }}" readonly>

                <label for="alamat">Alamat:</label>
                <input type="text" id="alamat" name="alamat"
                    value="{{ isset($checkoutData['alamat']) ? $checkoutData['alamat'] : 'N/A' }}" readonly>

                <label for="telepon">Telepon:</label>
                <input type="text" id="telepon" name="telepon"
                    value="{{ isset($checkoutData['telepon']) ? $checkoutData['telepon'] : 'N/A' }}" readonly>

                <div>
                    <label for="total_harga">Total Harga:</label>
                    <input type="text" id="total_harga" name="total_harga" value="RP {{ $checkoutData['total_harga'] }}"
                        readonly>
                </div>

                <!-- Button Pembayaran -->
            </form>
            <button id="pay-now-button" class="btn" type="submit" data-snap-token="{{ $checkoutData->snap_token }}">
                Bayar Sekarang
            </button>
        </div>
    @endsection

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#pay-now-button').on('click', function() {
                var snapToken = $(this).data('snap-token');
                snap.pay(snapToken);
            });
        });
    </script>

    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-width: 400px;
            margin: auto;
        }

        label {
            font-weight: bold;
        }

        input {
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
        }

        div {
            margin-top: 15px;
        }
    </style>
