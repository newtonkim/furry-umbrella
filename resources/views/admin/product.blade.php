<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')

    <style>
        .title {
            color: white;
            padding-top: 25px;
            font-size: 25px;
        }

    </style>
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
                        <h1 class="title">Add Product</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('uploadproduct') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Product Title</label>
                                <input style="color: orange;" type="text" class="form-control" id="title" name="title"
                                    aria-describedby="emailHelp">
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input style="color: orange;" type="number" class="form-control" id="price"
                                    name="price">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input style="color: orange;" type="text" class="form-control" id="des" name="des">
                            </div>

                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input style="color: orange;" type="number" class="form-control" id="quantity"
                                    name="quantity">
                            </div>

                            <div class="form-group">
                                <input type="file" class="form-control-file" name="file">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.script')
    <!-- End custom js for this page -->
</body>

</html>
