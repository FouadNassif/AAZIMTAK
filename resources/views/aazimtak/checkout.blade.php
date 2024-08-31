@extends('components.mainLayout')
@section('title', 'AAZIMTAK - Order Details')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/order.css') }}">
@endsection
@section('content')
    <div class="order-container p-8 max-w-4xl mx-auto">
        <!-- Check Your Order Section -->
        <div class="check-order mb-12">
            <h1 class="text-3xl font-bold mb-6">1. Check Your Order</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Basic Package -->
                <div class="package-card bg-white rounded-lg shadow-lg p-6 transition-transform transform hover:scale-105 hover:shadow-2xl cursor-pointer"
                    onclick="updateReceipt('Basic Package', 90)">
                    <h2 class="text-xl font-semibold mb-4 text-[#2a5298]">Basic Package</h2>
                    <p class="text-lg font-bold">$90</p>
                    <p class="text-sm text-gray-600">Includes Invitation Card, Music, Images, Fixed style, End-Date (After 7
                        days of the wedding)</p>
                </div>

                <!-- Premium Package -->
                <div class="package-card bg-white rounded-lg shadow-lg p-6 transition-transform transform hover:scale-105 hover:shadow-2xl cursor-pointer"
                    onclick="updateReceipt('Premium Package', 130)">
                    <h2 class="text-xl font-semibold mb-4 text-[#2a5298]">Premium Package</h2>
                    <p class="text-lg font-bold">$130</p>
                    <p class="text-sm text-gray-600">Includes Invitation Card, Music, Images, Videos, Reservation, Choose
                        your layout, End-Date (After 30 days of the wedding)</p>
                </div>

                <!-- Deluxe Package -->
                <div class="package-card bg-white rounded-lg shadow-lg p-6 transition-transform transform hover:scale-105 hover:shadow-2xl cursor-pointer"
                    onclick="updateReceipt('Deluxe Package', 180)">
                    <h2 class="text-xl font-semibold mb-4 text-[#2a5298]">Deluxe Package</h2>
                    <p class="text-lg font-bold">$180</p>
                    <p class="text-sm text-gray-600">Includes Invitation Card, Music, Images, Videos, Reservation, Choose
                        your layout, End-Date (After 190 days of the wedding)</p>
                </div>
            </div>
        </div>

        <!-- Receipt Section -->
        <div id="receipt-section" class="mb-12">
            <h1 class="text-3xl font-bold mb-6">2. Receipt</h1>
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold mb-4">Selected Plan:</h2>
                <p id="receipt-plan" class="text-lg font-bold">None</p>
                <p id="receipt-price" class="text-lg font-bold">N/A</p>

                <div class="mt-6">
                    <h2 class="text-xl font-semibold mb-4">Customer Information</h2>
                    <form>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="first-name" class="block text-sm font-medium text-gray-700">First Name</label>
                                <input type="text" id="first-name"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-[#2a5298] focus:ring-[#2a5298] transition-colors"
                                    required>
                            </div>
                            <div>
                                <label for="last-name" class="block text-sm font-medium text-gray-700">Last Name</label>
                                <input type="text" id="last-name"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-[#2a5298] focus:ring-[#2a5298] transition-colors"
                                    required>
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <input type="tel" id="phone"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-[#2a5298] focus:ring-[#2a5298] transition-colors"
                                required>
                        </div>

                        <div class="mb-6">
                            <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                            <input type="text" id="country"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-[#2a5298] focus:ring-[#2a5298] transition-colors"
                                required>
                        </div>

                        <div class="mb-6">
                            <label for="total-price" class="block text-sm font-medium text-gray-700">Total Price</label>
                            <p id="total-price" class="text-lg font-bold">$0.00</p>
                        </div>

                        <div class="mb-6">
                            <label for="coupon" class="block text-sm font-medium text-gray-700">Coupon Code
                                (Optional)</label>
                            <input type="text" id="coupon"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-[#2a5298] focus:ring-[#2a5298] transition-colors">
                        </div>

                        <div class="mb-6">
                            <h2 class="text-xl font-semibold mb-4">Select Payment Method</h2>
                            <div class="flex items-center mb-4">
                                <input type="radio" id="credit-card" name="payment-method" value="credit-card"
                                    class="mr-2">
                                <label for="credit-card" class="text-sm font-medium text-gray-700">Credit Card</label>
                            </div>
                            <!-- Add more payment options if needed -->
                        </div>

                        <button type="submit"
                            class="bg-[#2a5298] text-white py-2 px-4 rounded-full hover:bg-[#1e3a6c] transition-colors">Confirm
                            and Pay</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@section('script')
    <script>
        function updateReceipt(plan, price) {
            document.getElementById('receipt-plan').textContent = plan;
            document.getElementById('receipt-price').textContent = `$${price}`;
            document.getElementById('total-price').textContent = `$${price}`;
        }
    </script>
@endsection
@endsection
