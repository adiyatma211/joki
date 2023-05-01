@extends('layouts.layoutlp')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
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
                            <h1 class="h2">Confirm Your Payment</h1>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <label for="">Upload Your Proof of Payment</label>
                                    <input type="file" class="image-preview-filepond" name="image">
                                    <input type="hidden" id="image">
                                    <button class="btn btn-primary w-100" onclick="submit()" id="button-submit">Confirm</button>
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
                    url: '/upload-tf',
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
        function submit() {
            document.getElementById('button-submit').disabled = true;
            document.getElementById('button-submit').innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...';
            let image = document.getElementById('image');

            if (image.value == '') {
                Toastify({
                    text: 'Please Upload Your Proof of Payment',
                    duration: 3000,
                    style: {
                        background: "red",
                    }
                }).showToast();
                document.getElementById('button-submit').disabled = false;
                document.getElementById('button-submit').innerHTML = 'Submit';
            } else {
                $.ajax({
                    url:"{{route('transactionconfirmation')}}",
                    type:"POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        idtrans: '{{$transaction->id}}',
                        proof: image.value,

                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            Toastify({
                                text: 'Thanks for Your Payment',
                                duration: 3000,
                                style: {
                                    background: "green",
                                }
                            }).showToast();
                            setTimeout(function () {
                                window.location.href = "{{route('usertransaction')}}"; //will redirect to your blog page (an ex: blog.html)
                            }, 1500);
                        }
                    }
                });
            }
        }
    </script>
@endsection
