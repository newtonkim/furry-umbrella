<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Flutterwave Payment Laravel 8</title>
</head>

<body>
    <div class="container">
        <div class="header mt-2 px-5 text-center bg-primary py-5 text-white">
            <h1>Pay for Goods</h1>
        </div>
        <div class="main">
            <form id="makePaymentForm">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mt-4">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter full name"
                                required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-4">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email"
                                required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-4">
                            <label for="amount">Amount</label>
                            <input type="number" name="amount" class="form-control" id="amount"
                                placeholder="Enter amount" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-4">
                            <label for="number">Phone Number</label>
                            <input type="number" name="number" class="form-control" id="number"
                                placeholder="Enter phone number" required>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary">Pay Now</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
        integrity="sha512-bnIvzh6FU75ZKxp0GXLH9bewza/OIw6dLVh9ICg0gogclmYGguQJWl8U30WpbsGTqbIiAwxTsbe76DErLq5EDQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    <script src="https://checkout.flutterwave.com/v3.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
        $(function() {
            $("#makePaymentForm").submit(function(e) {
                e.preventDefault();
                var name = $("#name").val();
                var email = $("#email").val();
                var phone = $("#number").val();
                var amount = $("#amount").val();
                // make our payment
                makePayment(amount, email, phone, name);
            });
        });

        function makePayment(amount, email, phone_number, name) {
            FlutterwaveCheckout({
                // public_key: "FLWPUBK_TEST-SANDBOXDEMOKEY-X",
                public_key: "FLWPUBK_TEST-d03f51630e9c0d44e860b90b1a9073c6-X",
                tx_ref: "RX1_{{ substr(rand(0, time()), 0, 7) }}",
                amount,
                currency: "USD",
                country: "US",
                payment_options: " ",
                customer: {
                    email,
                    phone_number,
                    name,
                },
                callback: function(data) {
                    var transaction_id = data.transaction_id;
                    // make ajax request
                    var _token = $("input[name='_token']").val();
                    $.ajax({
                        type: "POST",
                        url: "{{URL::to('verifypayment')}}",
                        data: {
                            transaction_id,
                            _token
                        },
                        success: function (response) {
                            console.log(response);
                        }
                    });
                },
                onclose: function() {
                    // close modal
                },
                customizations: {
                    title: "My store",
                    description: "Payment for items in cart",
                    logo: "https://www.fintechfutures.com/files/2021/11/Flutterwave-logo.png",
                },
            });
        }
    </script>

</body>

</html>
