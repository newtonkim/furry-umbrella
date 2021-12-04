<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


    <title>Nunuwa Stores</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <h2>Sixteen <em>Clothing</em></h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="products.html">Our Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact Us</a>
                        </li>
                        <li class="nav-item">

                            @if (Route::has('login'))

                                @auth

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('showcart') }}">
                                    <i class="fas fa-shopping-cart"></i>
                                    Cart[{{ $count }}]
                                </a>
                            </li>
                            <x-app-layout>

                            </x-app-layout>

                        @else
                            <li>
                                <a class="nav-link" href="{{ route('login') }}">
                                    Log in
                                </a>
                            </li>

                            @if (Route::has('register'))
                                <li>
                                    <a class="nav-link" href="{{ route('register') }}">
                                        Register
                                    </a>
                                </li>
                            @endif
                        @endauth
                        @endif
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="row">
        <div class="col-md-12">
            <form action="{{ url('order') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="table-responsive" style="padding:10%;">
                    <table class="table table-hover table-dark">
                        <thead>
                            <tr>
                                <th class="text-warning" scope="col">Product Name</th>
                                <th class="text-warning" scope="col">Quantity</th>
                                <th class="text-warning" scope="col">Price</th>
                                <th class="text-warning" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($carts as $cart)
                                <tr>
                                    <td>
                                        <input type="text" name="productname[]" value="{{ $cart->product_title }}" hidden="">
                                        {{ $cart->product_title }}
                                    </td>
                                    <td>
                                        <input type="text" name="quantity[]" value=" {{ $cart->quantity }}" hidden="">
                                        {{ $cart->quantity }}
                                    </td>
                                    <td>
                                        <input type="text" name="price[]" value=" {{ number_format($cart->price)}}" hidden="">
                                        Ush {{ number_format($cart->price) }}
                                    </td>
                                    {{-- <td class="text-success">Ush {{ number_format($cart->quantity * $cart->price) }}
                                    </td> --}}
                                    <td> <a class="btn btn-danger"
                                            href="{{ url('deletecart', $cart->id) }}">Remove</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button class="btn btn-success">Confirm Order</button>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-content">
                        <p>Copyright &copy; 2021 Nunuwa Stores., Ltd.

                            - Design: <a rel="nofollow noopener" href="https://nunuwastore.com" target="_blank">Nunuwa
                                Stores</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language="text/Javascript">
        cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
        function clearField(t) { //declaring the array outside of the
            if (!cleared[t.id]) { // function makes it static and global
                cleared[t.id] = 1; // you could use true and false, but that's more typing
                t.value = ''; // with more chance of typos
                t.style.color = '#fff';
            }
        }
    </script>


</body>

</html>
