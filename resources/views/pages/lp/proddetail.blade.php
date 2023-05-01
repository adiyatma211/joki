
@extends('layouts.layoutlp')
@section('content')
    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="{{asset('images/' . $product->image)}}" alt="Card image cap" id="product-detail">
                    </div>
                    <div class="row">
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
                        <!--End Controls-->
                        <!--Start Carousel Wrapper-->
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                            <!--Start Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="{{asset('images/' . $product->image)}}" alt="Product Image 1">
                                            </a>
                                        </div>

                                    </div>
                                </div>
                                <!--/.First slide-->


                            </div>
                            <!--End Slides-->
                        </div>
                        <!--End Carousel Wrapper-->
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">{{$product->name}}</h1>
                            <p class="h3 py-2">Rp{{$product->price}}</p>
                            {{-- <p class="py-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <span class="list-inline-item text-dark">Rating 4.8 | 36 Comments</span>
                            </p> --}}
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Photographer:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>{{$product->user->name}}</strong></p>
                                </li>
                            </ul>

                            <h6>Description:</h6>
                            <p>{{$product->description}}</p>


                            <div class="col d-grid mb-3">
                                @auth
                                <button type="button" class="btn btn-success btn-lg" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Book Now</button>
                                @else
                                <button type="button" class="btn btn-secondary btn-lg" disabled>Please Login to Book</button>
                                @endauth
                            </div>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" id="datebook" placeholder="yyyy/mm/dd">
                                        <label for="datebook">Date Book</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" placeholder="Leave a note here" id="notes" style="height: 100px"></textarea>
                                        <label for="notes">Notes</label>
                                    </div>
                                    <button class="btn btn-primary w-100" id="button-submit" onclick="submitbook()">Confirm Book</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->

    
@endsection
@section('script')
    <script>
        function submitbook() {
            document.getElementById('button-submit').disabled = true;
            document.getElementById('button-submit').innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...';
            let date = document.getElementById('datebook');
            let notes = document.getElementById('notes');

            if (date.value == '') {

                Toastify({
                    text: "Please select date",
                    duration: 3000,
                    style: {
                        background: "red",
                    }
                }).showToast();
                document.getElementById('button-submit').disabled = false;
                document.getElementById('button-submit').innerHTML = 'Submit';

            }else{
                let data = {
                    date: date.value,
                    notes: notes.value,
                    product: '{{$product->id}}',

                    seller: '{{$product->user->id}}',
                    _token: "{{ csrf_token() }}",
                }
                $.ajax({
                    url: "{{route('book')}}",
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
        }
    </script>
@endsection
