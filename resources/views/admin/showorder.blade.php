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
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Order Status</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check form-check-muted m-0">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input">
                                                    </label>
                                                </div>
                                            </th>
                                            <th style="color: #fff">Customer Name </th>
                                            <th style="color: #fff">Phone Number </th>
                                            <th style="color: #fff">Address </th>
                                            <th style="color: #fff">Product Title </th>
                                            <th style="color: #fff">Quantity</th>
                                            <th style="color: #fff">Price </th>
                                            <th style="color: #fff">Status </th>
                                            <th style="color: #fff">Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-muted m-0">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input">
                                                        </label>
                                                    </div>
                                                </td>
                                                {{-- <td>
                                  <img src="assets/images/faces/face2.jpg" alt="image" />
                                  <span class="pl-2">Newton</span>
                                </td> --}}
                                                <td>
                                                    <span class="pl-2">{{ $order->name }}</span>
                                                </td>
                                                </td>
                                                <td> {{ $order->phone }} </td>
                                                <td> {{ $order->address }} </td>
                                                <td>{{ $order->product_name }}</td>
                                                <td> {{ $order->quantity }} </td>
                                                <td> {{ $order->price }} </td>
                                                <td>
                                                    <div class="badge badge-outline-warning">{{ $order->status }}</div>
                                                </td>
                                                <td>
                                                    <a class="btn btn-outline-success" href="{{url('updatestatus', $order->id)}}">Delivered</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{-- <tr>
                                <td>
                                  <div class="form-check form-check-muted m-0">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input">
                                    </label>
                                  </div>
                                </td>
                                <td>
                                  <img src="assets/images/faces/face2.jpg" alt="image" />
                                  <span class="pl-2">Estella Bryan</span>
                                </td>
                                <td> 02312 </td>
                                <td> $14,500 </td>
                                <td> Website </td>
                                <td> Cash on delivered </td>
                                <td> 04 Dec 2019 </td>
                                <td>
                                  <div class="badge badge-outline-warning">Pending</div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="form-check form-check-muted m-0">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input">
                                    </label>
                                  </div>
                                </td>
                                <td>
                                  <img src="assets/images/faces/face5.jpg" alt="image" />
                                  <span class="pl-2">Lucy Abbott</span>
                                </td>
                                <td> 02312 </td>
                                <td> $14,500 </td>
                                <td> App design </td>
                                <td> Credit card </td>
                                <td> 04 Dec 2019 </td>
                                <td>
                                  <div class="badge badge-outline-danger">Rejected</div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="form-check form-check-muted m-0">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input">
                                    </label>
                                  </div>
                                </td>
                                <td>
                                  <img src="assets/images/faces/face3.jpg" alt="image" />
                                  <span class="pl-2">Peter Gill</span>
                                </td>
                                <td> 02312 </td>
                                <td> $14,500 </td>
                                <td> Development </td>
                                <td> Online Payment </td>
                                <td> 04 Dec 2019 </td>
                                <td>
                                  <div class="badge badge-outline-success">Approved</div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="form-check form-check-muted m-0">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input">
                                    </label>
                                  </div>
                                </td>
                                <td>
                                  <img src="assets/images/faces/face4.jpg" alt="image" />
                                  <span class="pl-2">Sallie Reyes</span>
                                </td>
                                <td> 02312 </td>
                                <td> $14,500 </td>
                                <td> Website </td>
                                <td> Credit card </td>
                                <td> 04 Dec 2019 </td>
                                <td>
                                  <div class="badge badge-outline-success">Approved</div>
                                </td>
                              </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
    </div>
    </div>

    @include('admin.script')
    <!-- End custom js for this page -->
</body>

</html>
