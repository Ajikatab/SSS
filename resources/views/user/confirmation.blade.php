@extends('user.layouts.main')

@section('container')
    <h2 class="heading" style="margin-top: 50px;">Konfirmasi Pembayaran</h2>
    <div class="container">

        <!-- Display the confirmation information here -->
        <div>
            <p>Nama: {{ isset($checkoutData['nama']) ? $checkoutData['nama'] : 'N/A' }}</p>
            <p>Alamat: {{ isset($checkoutData['alamat']) ? $checkoutData['alamat'] : 'N/A' }}</p>
            <p>Telepon: {{ isset($checkoutData['telepon']) ? $checkoutData['telepon'] : 'N/A' }}</p>

            <div>
                <p>Total Harga: RP {{ $checkoutData['total_harga'] }}</p>
            </div>

            <!-- Button Pembayaran -->
            <button id="pay-now-button" class="btn" type="submit" data-snap-token="{{ $checkoutData->snap_token }}">
                Bayar Sekarang
            </button>
        </div>
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
</style>
