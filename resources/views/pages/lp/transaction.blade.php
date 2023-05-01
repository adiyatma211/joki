@extends('layouts.layoutlp')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">

                <!-- col end -->
                <div class="col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">Your Transaction</h1>

                            {{-- <div class="table-responsive mx-3 my-3">
                                <table id="table" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Transaction ID</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div> --}}
                            @foreach ($transaction as $t)
                                @php
                                    if (date('Y-m-d', strtotime('tomorrow')) == $t->date) {
                                        $bgcolor = 'bg-danger';
                                    } else {
                                        $bgcolor = '';
                                    }
                                    
                                    if ($t->status == '1') {
                                        $badge = 'warning';
                                        $txt = 'Need Payment';
                                    }
                                    
                                    if ($t->status == '2') {
                                        $badge = 'info';
                                        $txt = 'Wait Confirmation';
                                    }
                                    
                                    if ($t->status == '3') {
                                        $badge = 'success';
                                        $txt = 'Confirmed';
                                    }
                                    
                                    if ($t->status == '4') {
                                        $badge = 'danger';
                                        $txt = 'Canceled';
                                    }
                                    
                                @endphp
                                <div class="card mb-3 {{ $bgcolor }}">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="d-inline p-2"><i class="fa fa-bag-shopping"></i></div>
                                                <div class="d-inline p-2">{{ $t->date }}</div>
                                                <div class="d-inline p-2"><span
                                                        class="badge text-bg-{{ $badge }}">{{ $txt }}</span>
                                                </div>
                                                <div class="d-inline p-2">INV/ORD/{{ $t->invoice_id }}</div>
                                            </div>

                                            <div class="col-lg-12 mt-3">
                                                <p><small><em>{{ $t->seller->name }}</em></small></p>
                                                <img src="{{ asset('images/' . $t->product->image) }}"
                                                    class="img-thumbnail p-2 mb-3" alt="..." width="100px">
                                                <h5>{{ $t->product->name }}</h5>
                                                @if ($t->status == '1')
                                                    <a href="{{ route('payment', $t->id) }}" class="btn btn-primary">Confirm
                                                        Payment</a>
                                                @else
                                                    @if ($t->status == '3')
                                                        <a class="btn btn-success" target="_blank"
                                                            href="{{ route('transactioninvoice', $t->id) }}">Download
                                                            Invoice</a>
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#edithari{{ $t->date }}">
                                                            Launch static backdrop modal
                                                        </button>
                                                    @else
                                                        <button disabled="disabled" class="btn btn-primary">Confirm
                                                            Payment</button>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- modal edit jadwal  --}}
                                <div class="modal fade" id="edithari{{ $t->date }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card card-body">
                                                    <div class="form-floating mb-3">
                                                        <input type="date" class="form-control" id="datebook"
                                                            placeholder="yyyy/mm/dd" value="{{ $t->date }}">
                                                        <label for="datebook">Tanggal Pesan</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <div class="form-floating mb-3">
                                                            <input type="date" class="form-control" id="tanggal"
                                                                placeholder="yyyy/mm/dd">
                                                            <label for="datebook">Rubah Tanggal </label>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary w-100"onclick="uptanggal()" id="update_data">Confirm Book</button>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Understood</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end -modal --}}
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->
@endsection
@section('script')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')
        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
    </script>
    <script>
        $(document).ready(function() {
            $(document).on("click", "#update_data", function() {
                var url = " {{route('uphari')}}";
                var id =
                    $.ajax({
                        url: url,
                        type: 'POST',
                        cache: false,
                        data: {
                            date: $('#tanggal').val(),
                            _token: '{{ csrf_token() }}',
                        },
                        success: function (data) {
                        if (data.status == 'success') {
                            Toastify({
                                text: "Booked successfully",
                                duration: 3000,
                                style: {
                                    background: "green",
                                }
                            }).showToast();
                            console.log(data.idtrans);

                            setTimeout(function () {
                                window.location.href = "{{route('usertransaction')}}"; //will redirect to your blog page (an ex: blog.html)
                            }, 1500);
                        } else {
                            Toastify({
                                text: "Something went wrong",
                                duration: 3000,
                                style: {
                                    background: "red",
                                }
                            }).showToast();
                            document.getElementById('button-submit').disabled = false;
                            document.getElementById('button-submit').innerHTML = 'Submit';
                        }
                    },
                    });
            });
        });
    </script>
    <script>
        function uptanggal() {
            document.getElementById('button-submit').disabled = true;
            document.getElementById('button-submit').innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...';
            let date = document.getElementById('tanggal');
            let data = {
                    date: date.value,
                    _token: "{{ csrf_token() }}",
                }
                $.ajax({
                    url: "{{route('uphari')}}",
                    type: 'POST',
                    data: data,
                    success: function (data) {
                        if (data.status == 'success') {
                            Toastify({
                                text: "Booked successfully",
                                duration: 3000,
                                style: {
                                    background: "green",
                                }
                            }).showToast();
                            console.log(data.idtrans);

                            setTimeout(function () {
                                window.location.href = "{{route('usertransaction')}}"; //will redirect to your blog page (an ex: blog.html)
                            }, 1500);
                        } else {
                            Toastify({
                                text: "Something went wrong",
                                duration: 3000,
                                style: {
                                    background: "red",
                                }
                            }).showToast();
                            document.getElementById('button-submit').disabled = false;
                            document.getElementById('button-submit').innerHTML = 'Submit';
                        }
                    }
                });
        }
@endsection
