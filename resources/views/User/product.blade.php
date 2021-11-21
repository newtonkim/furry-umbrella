<div class="latest-products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Latest Products</h2>
                    <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>

                    <form action="{{ url('search') }}" method="GET" class="form-inline"
                        style="float: right; padding: 10px;">
                        @csrf
                        <input class="form-control" type="search" name="search" placeholder="search">

                        <input type="submit" class="btn btn-success" value="Search">
                    </form>
                </div>
            </div>

            @foreach ($data as $product)
                <div class="col-md-4">
                    <div class="product-item">
                        <a href="#"><img height="350" width="150" src="/productimage/{{ $product->image }}"
                                alt=""></a>
                        <div class="down-content">
                            <a href="#">
                                <h4>{{ $product->title }}</h4>
                            </a>
                            <h6>Ugx{{ number_format($product->price) }}</h6>
                            <p>{{ $product->description }}</p>

                            <a class="btn btn-primary" href="#">Add Cart</a>

                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <span>Reviews (32)</span>
                        </div>
                    </div>
                </div>
            @endforeach

            <!--Cater for error if search is clicked and its empty-->
            @if (method_exists($data, 'links'))

                <div class="d-flex justify-content-center">

                    {!! $data->links() !!}
                </div>
            @endif
        </div>
    </div>
</div>
