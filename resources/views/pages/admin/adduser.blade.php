@extends('pages.admin.layouts.layout')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
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
                              <li class="breadcrumb-item"><a href="{{route('user')}}" class="link">Users</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Add</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Add User</h1>
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
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="name" placeholder="name" onkeyup="removeinvalid('name')">
                                    <label for="name">Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" placeholder="name@example.com" onkeyup="removeinvalid('email')">
                                    <label for="email">Email address</label>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="password" placeholder="Username" onkeyup="removeinvalid('password')">
                                        <label for="password">Password</label>
                                    </div>
                                    <button class="btn btn-outline-secondary" type="button" id="button-generate" onclick="generatepass()"><i class="mdi mdi-auto-fix"></i></button>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="role" aria-label="Floating label select example" onchange="removeinvalid('role')">
                                        <option value="" selected>Open this select menu</option>
                                        @foreach ($role as $r)
                                        <option value="{{$r->id}}">{{$r->name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="role">Role</label>
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
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#table1').DataTable();
        });
    </script>
    <script>
        function generatepass(){
            let name = document.getElementById('name').value;
            let pass = '';
            console.log(name);
            if (name == '') {
                var length = 8,
                    charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
                    retVal = "";
                for (var i = 0, n = charset.length; i < length; ++i) {
                    retVal += charset.charAt(Math.floor(Math.random() * n));
                }
                pass = retVal;
            } else {
                var length = 8,
                    charset = "0123456789",
                    retVal = "";
                for (var i = 0, n = charset.length; i < length; ++i) {
                    retVal += charset.charAt(Math.floor(Math.random() * n));
                }
                pass = name + retVal;
            }
            document.getElementById('password').value = '';
            document.getElementById('password').value = pass;
        }

        function removeinvalid(id) {
            document.getElementById(id).classList.remove('is-invalid');
        }

        function submitform() {
            document.getElementById('button-submit').disabled = true;
            document.getElementById('button-submit').innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...';
            // document.getElementById('btnconfirm').disabled = false;
            // document.getElementById('btnconfirm').innerHTML = 'Submit';
            let name = document.getElementById('name');
            let email = document.getElementById('email');
            let password = document.getElementById('password');
            let role = document.getElementById('role');
            let filled = true;
            //validation input name
            if (name.value == '') {
                filled = false;
                name.classList.add('is-invalid');

            }
            //validation input email
            if (email.value == '') {
                filled = false;
                email.classList.add('is-invalid');

            }
            //validation input password
            if (password.value == '') {
                filled = false;
                password.classList.add('is-invalid');

            }
            //validation input role
            if (role.value == '') {
                filled = false;
                role.classList.add('is-invalid');

            }

            if (filled == true) {
                $.ajax({
                    url:"{{route('user.store')}}",
                    type:"POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: name.value,
                        email: email.value,
                        password: password.value,
                        role: role.value,
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            Toastify({
                                text: 'User Successfully Added',
                                duration: 3000,
                                style: {
                                    background: "green",
                                }
                            }).showToast();
                            setTimeout(function () {
                                window.location.href = "{{route('user')}}"; //will redirect to your blog page (an ex: blog.html)
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
