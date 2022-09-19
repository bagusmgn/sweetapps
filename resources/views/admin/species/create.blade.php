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
                        @if (count($errors) > 0)
                        <div class="alert alert-danger alert-dismissible" style="position: relative">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>Ups!</strong> Ada beberapa masalah dengan inputan anda<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form class="needs-validation" name="add_name" id="add_name" enctype="multipart/form-data" action="{{ route('species.store') }}" method="post">
                        {{--  <form class="needs-validation" novalidate="">  --}}
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Local Name</label>
                                    <input type="text" class="form-control" name="local_name"
                                           placeholder="Local Name">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Latin Name</label>
                                    <input type="text" class="form-control" name="latin_name"
                                           placeholder="Latin Name">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Recording Location</label>
                                    <input type="text" class="form-control" name="recording_location"
                                           placeholder="Recording Location">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Description</label>
                                    <input type="text" class="form-control" name="description"
                                           placeholder="Description">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom01">Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="image">
                                          <label class="custom-file-label" for="customFile">Choose file</label>
                                      </div>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>


                            </div>

                            <a href="{{ route('species.index') }}" type="button" name="add" id="add" class="btn btn-success">Back</a>
                            <button class="btn btn-primary" type="submit" name="submit" id="submit">Submit form</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
