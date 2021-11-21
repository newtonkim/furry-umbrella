<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body>
    @include('admin.sidebar')
    <!-- partial -->
    @include('admin.navbar')
    <div class="container-fluid page-body-wrapper">
        <div class="container">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h1 class="title">Show Products</h1>
                    </div>
                    <div class="card-body">
                        <table class="table-responsive table table-striped">
                            <thead>
                                <tr style="background-color: green" class="mb-0 font-weight-bolder">
                                    <th class=" font-weight-bolder text-monospace" scope=" col" style="color: white;">
                                        Image</th>
                                    <th class=" font-weight-bolder text-monospace" scope=" col" style="color: white;">
                                        Title</th>
                                    <th class="font-weight-bolder text-monospace" scope="col" style="color: white;">
                                        Description</th>
                                    <th class="font-weight-bolder text-monospace scope=" col" style="color: white;">
                                        Quantity</th>
                                    <th class="font-weight-bolder text-monospace scope=" col" style="color: white;">
                                        Price</th>
                                    <th class="font-weight-bolder text-monospace scope=" col" style="color: white;">
                                        Update</th>
                                    <th class="font-weight-bolder text-monospace scope=" col" style="color: white;">
                                        Delete</th>
                                </tr>
                            </thead>

                            @foreach ($data as $product)
                                <tbody>
                                    <tr>
                                        <td style="color: white;">
                                            <img height="400" width="400" src="/productimage/{{ $product->image }}">
                                        </td>
                                        <th class=" font-weight-normal text-monospace" style="color: white;"
                                            scope="row">
                                            {{ $product->title }}</th>
                                        <td class=" font-weight-normal text-monospace" style="color: white;">
                                            {{ $product->description }}</td>
                                        <td class=" font-weight-normal text-monospace" style="color: white;">
                                            {{ $product->quantity }}</td>
                                        <td class=" font-weight-normal text-monospace" style="color: white;">
                                            {{ number_format($product->price) }}</td>
                                        <td>
                                            <a href="{{ url('updateproduct', $product->id) }}">
                                                <div
                                                    class="font-weight-bolder text-monospace badge badge-outline-success">
                                                    Update</div>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ url('/deleteproduct', $product->id) }}">
                                                <div
                                                    class=" font-weight-bolder text-monospace badge badge-outline-danger">
                                                    Delete</div>
                                            </a>

                                        </td>

                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                        <div class="d-flex justify-content-center mb-5">
                            {!! $data->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>
