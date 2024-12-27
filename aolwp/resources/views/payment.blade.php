@extends('navbarfooter')
@section('title', 'Book Now')

@section('content')

<div class="payment-container">
    <div class="row">
        <div class="col-sm-6" style="background-color: #EAEAEA; border-radius:5px;">
        <div class="left-card-container">
            <h2 class="card-title" style="font-size:22px; color: #821616; padding-top:5px;">Payment</h2>
            <h3 class="card-text" style="font-size:14px; color: #84949E; margin-top:20px">Please make sure the filled information is correct.</h3>
            <div class="input-container" style="margin-top:20px;">
                <div class="input-billedto-container">
                    <h4 class="card-text2" style="font-size:14px; color:#606060;">Billed to</h4>
                    <input class="input-fullname" type="text" placeholder="Full name" aria-label="input-fullname" name="fullname" required> 
                    <input class="input-cardnum" type="number" placeholder="Card Number" aria-label="input-cardnum" name="card_number" maxlength="16" required>
                    <div class="cc-input" style="display: flex; gap: 10px;">
                        <input class="input-MMYY" type="text" placeholder="MM / YY" aria-label="input-MMYY" required style="flex: 1;">
                        <input class="input-CVV" type="number" placeholder="CVV" aria-label="input-CVV" maxlength="3" required style="flex: 1;">
                    </div>
                </div>
                <div class="input-country-container">
                    <h4 class="card-text2" style="font-size:14px;color:#606060;">Country</h4>
                    <input class="input-country" type="text" placeholder="Country" aria-label="input-country" required>
                    <input class="input-zip" type="number" placeholder="Zip Code" aria-label="input-zip" required>
                </div>
                <div class="total-price-container">
                    <h1 style="font-size:27px; margin-top:20px;margin-bottom:20px;">{{ $booking->total_price }}</h1>
                </div>
            </div>
        </div>
        </div>
        <div class="col-sm-6" >
            <div class="card w-100" style="background-color: #EAEAEA;border:none;">
                <div class="card-body">
                    <h1 class="card-title" style="font-size:22px; color: #821616;">Package Details</h2>
                    <h2 class="tour-name" style="font-size:14px;">Tour Name:</h2>
                    <p class="card-text" style="font-size:14px;">3-Day Halong Bay Tour with Cruise.</p>
                    <h2 style="font-size:14px;">Tour Highlights</h2>
                    <ul style="font-size:14px;">
                        <li>Guided visits to Sung Sot Cave, Ti Top Island, and Cat Ba Island.</li>
                        <li>Kayaking in Trung Trang Cave and Vung Vieng Floating Village.</li>
                        <li>Overnight luxury cruise accommodations with meals included.</li>
                        <li>Tai Chi sessions and optional cooking class.</li>
                    </ul>
                
                </div>
            </div>

            <div class="card w-100" style="margin-top:10px;background-color: #EAEAEA; border:none;">
                <div class="card-body">
                    <h5 class="card-title"style="font-size:22px; color: #821616">Payment Summary</h5>
                    <ul style="font-size:14px;">
                        <li><strong>Total Cost: </strong>IDR 6.000.000</li> 
                        <li><strong>Deposit (50%): </strong>IDR 3.000.000</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="button-container">
    <div class="hehe" style="height: 100px; text-align: center; color: #821616; padding:10px">
        <a href="#" class="btn" style="background-color: #821616; font-size:24px; color: #fff; padding:10px 100px">Complete</a>
    </div>
</div>


@endsection

<style>
    .row {
        display: flex;
        justify-content: center;
        width: 60%;
        align-items: stretch; /* Ensures both columns have the same height */
    }

    .payment-container {
        display: flex;
        justify-content: center;
        margin-top: 20px;
        width: 100%;
    }

    .col-sm-6 {
        display: flex;
        flex-direction: column;
        justify-content: space-between; /* Ensure the content stretches */
        height: 100%;
    }

    .total-price-container {
        position: absolute; /* Sticky position */
        bottom: 0;          /* Align it to the bottom */
        width: 100%;        /* Ensure it stretches across the container */
        padding-bottom: 20px; /* Add some spacing from the bottom */
    }

    .total-price-container h1 {
        font-size: 27px;
        padding-bottom: 20px; /* Adjust as needed */
    }

    .button-container {
        color: #821616;
        display: flex;
        justify-content: center;
        margin: 20px;
        padding-bottom: 40px;
    }

    /* Container Styling */
    .left-card-container {
        width: 100%;
        padding: 20px;
        border-radius: 5px;
        height: 100%;
        justify-content: space-between; /* Ensure the content stretches */
        position: relative; /* Important for absolute positioning of sticky element */
    }

    /* Input Field Styling */
    .input-container input {
        width: 100%;
        margin-bottom: 10px;
        padding: 8px 10px;
        font-size: 14px;
        border-radius: 5px;
        border: 1px solid #ccc;
        border-color: #821616;
    }

    /* MM/YY and CVV Input Alignment */
    .cc-input {
        display: flex;
        gap: 10px;
    }

    .cc-input input {
        flex: 1;
    }

    /* Optional: Focus Style */
    .input-container input:focus {
        border-color: #821616;
        outline: none;
    }

    .card{
        width: 100%;
        max-width: 600px;
        padding:10px;
        border-radius: 5px;
    }

</style>