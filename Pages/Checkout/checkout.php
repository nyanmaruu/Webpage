<div class="checkoutContainer">
    <div class="row">
        <div class="col-md-6">
            <h2 class="text-center">Shipping Information</h2>
            <form>
                <div class="form-group">
                    <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea id="address" name="address" required class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="zip">Zip Code:</label>
                    <input type="text" id="zip" name="zip" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="country">Country:</label>
                    <input type="text" id="country" name="country" required class="form-control">
                </div>
            </form>
        </div>

        <div class="col-md-6">
            <h2 class="text-center">Payment</h2>
            <div class="payment-options">
                <div class="form-group">
                    <label for="credit-card">Payment Option:</label>
                    <select id="credit-card" name="payment" class="form-control">
                        <option value="credit-card">Credit Card</option>
                        <option disabled value="paypal">PayPal</option>
                        <option disabled value="stripe">Stripe</option>
                    </select>
                </div>
                <form>
                    <div class="form-group">
                        <label for="card">Credit Card Number:</label>
                        <input type="text" id="card" name="card" required class="form-control">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="expiry">Expiration Date:</label>
                            <input type="text" id="expiry" name="expiry" placeholder="MM/YY" required class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label for="cvv">CVV:</label>
                            <input type="text" id="cvv" name="cvv" required class="form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="cart">
                <h2 class="cart-title text-center">Cart</h2>
                <div class="cart-item">

                </div>
            </div>
        </div>
    </div>


    <div class="row mt-4">
        <div class="col-md-12 text-center">
            <button type="submit" class="btn ">Place Order</button>
        </div>
    </div>
</div>

<script src="./Js/checkout/checkout.js"></script>