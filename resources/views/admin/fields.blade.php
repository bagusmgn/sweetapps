@extends('admin.layouts.admin')

@section('content')
<div class="page-header">
    <div>
        <h3>Form Validation</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Forms</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Form Validation</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12">

        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Valid Feedback</h6>
                        <form class="needs-validation" name="add_name" id="add_name" enctype="multipart/form-data" action="home" method="post">
                        {{--  <form class="needs-validation" novalidate="">  --}}
                            @csrf
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Name</label>
                                    <input type="text" class="form-control name_list" name="name[]"
                                           placeholder="Name"
                                            required="">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Phone</label>
                                    <input type="number" class="form-control name_list" name="phone[]"
                                           placeholder="Phone" required="">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                            </div>

                            <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                            <button class="btn btn-primary" type="submit" name="submit" id="submit">Submit form</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@push('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $('#add_name').submit(function(e) {
        e.preventDefault();
        var form = $(this);
        console.log(form)
        var formData = new FormData(this);
        $.ajax({
            url: form.attr('action'),
            method: "POST",
            data: formData,
            type: 'json',
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.error) {
                    printErrorMsg(data.error);
                } else {
                    i = 1;
                    $('.dynamic-added').remove();
                    $('#add_name')[0].reset();
                    $(".print-success-msg").find("ul").html('');
                    $(".print-success-msg").css('display', 'block');
                    $(".print-error-msg").css('display', 'none');
                    $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    // location.href = "http://www.example.com/ThankYou.html"
                }
            }
        });
        return false;
    });
</script>
</script>
<style>
    .btn.btn-success {
        margin-top: 18px;
    }
    .btn.btn-primary {
        margin-top: 18px;
    }
</style>

@endpush
