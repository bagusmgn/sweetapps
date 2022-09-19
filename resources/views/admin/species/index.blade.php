@extends('admin.layouts.admin')

@section('content')
<div class="page-header">
    <div>
        <h3>Fields Page</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Fields</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Fields Form Form</li>
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
                        <h6 class="card-title">Fields Form</h6>
                        <a href="{{ route('species.create') }}" class="btn btn-info">Add</a>

                        <div class="table-responsive" style="">
                            <table class="table table-bordered table-hover" id="example" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Name</th>
                                        <th style="text-align: center">Phone</th>
                                        <th style="text-align: center">Address</th>
                                        <th style="text-align: center">Coordinate</th>
                                        <th style="text-align: center">Coordinate Description</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                @php
                                    $url_page = request()->get('page');
                                    $no = $url_page == null ? 1 : $url_page;
                                    $no_dump = $no * 10;
                                    $nomor = $no_dump > 10 ? $no_dump - 10 + 1 : $no;
                                @endphp
                                @foreach ($species as $culture)
                                <tbody>
                                    @if ($culture->count() == 0)
                                    <tr>
                                        <td colspan="5">No products to display.</td>
                                    </tr>
                                    @endif
                                    <tr id="field">
                                        <th scope="row" style="text-align: center">{{ $nomor++ }}</th>
                                        <td style="text-align: center">{{ $culture->local_name }}</td>
                                        <td style="text-align: center">{{ $culture->latin_name }}</td>
                                        <td style="text-align: center">{{ $culture->recording_location }}</td>
                                        <td style="text-align: center">{{ $culture->description }}</td>
                                        <td style="text-align: center">{{ $culture->image }}</td>
                                        <td style="text-align: center">
                                            <form action="" method="POST">
                                                <a class="btn btn-sm btn-success btn-floating"
                                                    href="{{ route('lahans.edit', $culture->id) }}"><i class="ti-pencil"></i></a>
                                                <a class="btn btn-sm btn-info btn-floating" href=""><i
                                                        class="ti-eye"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" id="delete-post" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger btn-floating"><i
                                                        class="ti-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
