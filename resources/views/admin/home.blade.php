<!DOCTYPE html>
<html lang="en">

<head>
   @include('admin.css')
</head>

<body>
    @include('admin.sidebar')
        <!-- partial -->
        @include('admin.navbar')
        <!-- partial -->
    @include('admin.body')
        <!-- main-panel ends -->
    @include('admin.script')
    <!-- End custom js for this page -->
</body>

</html>
