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
                              <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="link">Transaction</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Confirmation</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Order Confirmation</h1>
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

                            <div class="table-responsive mx-3 my-3">
                                <table class="table table-bordered table-hover" id="table1">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Payment</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($transaction as $t)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$t->product->name}}</td>
                                            <td>{{$t->customer->name}}</td>
                                            <td>{{$t->date}}</td>
                                            <td>
                                                <img src="{{asset('images/'.$t->proof)}}" alt="" width="100px">
                                            </td>
                                            <td>
                                                <button class="btn btn-success btn-sm" id="button-confirm" onclick="confirm({{$t->id}})">Confirm</button>
                                                <button class="btn btn-danger btn-sm" id="button-cancel" onclick="cancel({{$t->id}})">Cancel</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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

            <!-- Vertically Centered modal Modal -->
<div class="modal fade" id="delconfirm" tabindex="-1" role="dialog"
aria-labelledby="delconfirmTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
    role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="delconfirmTitle">Confirmation</h5>
            <button type="button" class="close" data-bs-dismiss="modal"
                aria-label="Close">
                <i data-feather="x"></i>
            </button>
        </div>
        <div class="modal-body">
            <p id="isidelconfirm">
                Croissant jelly-o halvah chocolate sesame snaps. Brownie caramels candy
                canes chocolate cake
                marshmallow icing lollipop I love. Gummies macaroon donut caramels
                biscuit topping danish.
            </p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light-secondary"
                data-bs-dismiss="modal">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Close</span>
            </button>
            {{-- <form action="{{route('customer.destroy')}}" method="post">
                @csrf
                @method('DELETE') --}}
                <input type="hidden" id="iddelconfirm" name="id">
                <button type="submit" class="btn btn-primary ml-1" id="btnconfirm" onclick="confirmdelete()">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Accept</span>
                </button>
            {{-- </form> --}}
        </div>
    </div>
</div>
</div>


@endsection
@section('script')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        var delconfirm = document.getElementById('delconfirm')
        delconfirm.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        // var name = button.getAttribute('data-bs-name')
        var id = button.getAttribute('data-bs-id')
        var name = button.getAttribute('data-bs-name')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalBodyInput = delconfirm.querySelector('.modal-body #isidelconfirm')
        var iddel = delconfirm.querySelector('.modal-footer #iddelconfirm')

        modalBodyInput.innerHTML = 'Apakah anda yakin ingin menghapus '+ name +'?'
        iddel.value = id
        })
    </script>
    <script>
        $(document).ready(function () {
            $('#table1').DataTable();
        });

        function confirm(id) {
            document.getElementById('button-confirm').disabled = true;
            document.getElementById('button-confirm').innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...';
            $.ajax({
                url: "{{route('transaction.confirm')}}",
                type: "POST",
                data: {
                    id: id,
                    _token: "{{csrf_token()}}"
                },
                success: function (response) {
                    if (response.status == 'success') {
                        Toastify({
                            text: 'Transaction Confirmed',
                            duration: 3000,
                            style: {
                                background: "green",
                            }
                        }).showToast();
                        setTimeout(function () {
                                window.location.href = "{{route('confirmorder')}}"; //will redirect to your blog page (an ex: blog.html)
                        }, 1500);
                        document.getElementById('button-confirm').disabled = false;
                        document.getElementById('button-confirm').innerHTML = 'Confirm';

                    }
                }
            });
        }

        function cancel(id) {
            document.getElementById('button-cancel').disabled = true;
            document.getElementById('button-cancel').innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...';
            $.ajax({
                url: "{{route('transaction.cancel')}}",
                type: "POST",
                data: {
                    id: id,
                    _token: "{{csrf_token()}}"
                },
                success: function (response) {
                    if (response.status == 'success') {
                        Toastify({
                            text: 'Transaction Canceled',
                            duration: 3000,
                            style: {
                                background: "green",
                            }
                        }).showToast();
                        document.getElementById('button-cancel').disabled = false;
                        document.getElementById('button-cancel').innerHTML = 'Cancel';

                    }
                }
            });
        }
    </script>
@endsection
