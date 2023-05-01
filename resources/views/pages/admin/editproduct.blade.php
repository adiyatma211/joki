@extends('pages.admin.layouts.layout')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
@endsection
@section('content')
    <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 d-flex align-items-center">
                              <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                              {{-- <li class="breadcrumb-item"><a href="{{route('user')}}" class="link">Users</a></li> --}}
                              <li class="breadcrumb-item"><a href="{{route('product')}}" class="link">Product</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Add</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Add Product</h1>
                    </div>

                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <input type="file" class="image-preview-filepond" name="image">
                                <input type="hidden" id="image">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="name" placeholder="name" onkeyup="removeinvalid('name')">
                                    <label for="name">Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="description" style="height: 100px" onkeyup="removeinvalid('description')"></textarea>
                                    <label for="description">Description</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="category" aria-label="Floating label select example" onchange="removeinvalid('category')">
                                        <option value="" selected>Open this select menu</option>
                                        @foreach ($category as $r)
                                        <option value="{{$r->id}}">{{$r->name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="category">Category</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="price" placeholder="price" onkeyup="removeinvalid('price')">
                                    <label for="price">Price (Rp)</label>
                                </div>
                                <button class="btn btn-primary w-100" id="button-submit" onclick="submitform()">Save</button>

                            </div>

                        </div>
                    </div>

                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
@endsection
@section('script')
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script>
        // Register the plugin with FilePond
        FilePond.registerPlugin(FilePondPluginImagePreview);

        // Get a reference to the file input element
        const inputElement = document.querySelector('input[type="file"]');

        // Create the FilePond instance
        const pond = FilePond.create(inputElement);

        FilePond.setOptions({
            server: {
                process: {
                    url: '/upload-temp-product',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    onload: (response) => {
                        document.getElementById('image').value = response;
                    },

                },
                revert: '/delete-temp-product',
            },

        });

    </script>
    <script>

        function removeinvalid(id) {
            document.getElementById(id).classList.remove('is-invalid');
        }

        function submitform() {
            document.getElementById('button-submit').disabled = true;
            document.getElementById('button-submit').innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...';
            // document.getElementById('btnconfirm').disabled = false;
            // document.getElementById('btnconfirm').innerHTML = 'Submit';
            let name = document.getElementById('name');
            let image = document.getElementById('image');
            let description = document.getElementById('description');
            let category = document.getElementById('category');
            let price = document.getElementById('price');
            let filled = true;
            //validation input name
            if (name.value == '') {
                filled = false;
                name.classList.add('is-invalid');

            }

            //validation input description
            if (description.value == '') {
                filled = false;
                description.classList.add('is-invalid');

            }
            //validation input category
            if (category.value == '') {
                filled = false;
                category.classList.add('is-invalid');

            }
            //validation input price
            if (price.value == '') {
                filled = false;
                price.classList.add('is-invalid');

            }

            if (filled == true) {
                $.ajax({
                    url:"{{route('product.store')}}",
                    type:"POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: name.value,
                        description: description.value,
                        image: image.value,
                        category: category.value,
                        price: price.value,
                        user: "{{Auth::user()->id}}",
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            Toastify({
                                text: 'Product Successfully Added',
                                duration: 3000,
                                style: {
                                    background: "green",
                                }
                            }).showToast();
                            setTimeout(function () {
                                window.location.href = "{{route('product')}}"; //will redirect to your blog page (an ex: blog.html)
                            }, 1500);
                        }
                    }
                });
            } else {

                document.getElementById('button-submit').disabled = false;
                document.getElementById('button-submit').innerHTML = 'Submit';
            }

        }
    </script>
@endsection
