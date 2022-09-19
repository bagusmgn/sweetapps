@extends('admin.layouts.admin')

@section('content')

<div class="page-header">
    <div>
        <h3>Image Cards</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Components</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Image Cards</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-12">

        <div class="row">
            <div class="col-md-12">
                <div class="card-columns">
                    <div class="card">
                        <img src="../../assets/media/image/portfolio-four.jpg" class="card-img-top" alt="image">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the
                                card</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
