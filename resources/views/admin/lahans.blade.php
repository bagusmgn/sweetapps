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
                        <div class="table-responsive" style="margin-top: 8px">
                            <table class="table table-bordered table-hover" id="example" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Species</th>
                                        <th style="text-align: center">Name</th>
                                        <th style="text-align: center">Phone</th>
                                        <th style="text-align: center">Address</th>
                                        <th style="text-align: center">Coordinate</th>
                                        <th style="text-align: center">Coordinate Description</th>
                                        <th style="text-align: center">Tipe Lahan</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                @php
                                    $url_page = request()->get('page');
                                    $no = $url_page == null ? 1 : $url_page;
                                    $no_dump = $no * 10;
                                    $nomor = $no_dump > 10 ? $no_dump - 10 + 1 : $no;
                                @endphp
                                @foreach ($fields as $culture)
                                <tbody>
                                    @if ($culture->count() == 0)
                                    <tr>
                                        <td colspan="5">No products to display.</td>
                                    </tr>
                                    @endif
                                    <tr id="field">
                                        <th scope="row" style="text-align: center">{{ $nomor++ }}</th>
                                        <td style="text-align: center">{{ $culture->species_id }}</td>
                                        <td style="text-align: center">{{ $culture->names }}</td>
                                        <td style="text-align: center">{{ $culture->phone }}</td>
                                        <td style="text-align: center">{{ $culture->address }}</td>
                                        <td style="text-align: center">{{ $culture->coordinate }}</td>
                                        <td style="text-align: center">{{ $culture->coordinate_description }}</td>
                                        <td style="text-align: center">{{ $culture->description_of_land_type }}</td>
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
                        <h6 class="card-title">Create Fields</h6>
                        <form action="{{ route('lahans.store') }}" method="POST">
                            @csrf

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (Session::has('success'))
                                <div class="alert alert-success text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <p>{{ Session::get('success') }}</p>
                                </div>
                            @endif

                            <div class="table-responsive" style="margin-top: 2px">
                            <table class="table table-bordered" id="dynamicTable">
                                <tr>
                                    <th>Species</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Coordinate</th>
                                    <th>Coordinate Description</th>
                                    <th>Tipe Lahan</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="js-example-basic-single js-states form-control" name="species_id[]">
                                            <option hidden>Pilih Spesies</option>
                                            @foreach ($species as $item)
                                            <option value="{{ $item->id }}" {{ old('species_id') == $item->id ? 'selected' : null }}>{{ $item->local_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="text" name="names[]" placeholder="Enter your Name" class="form-control" /></td>
                                    <td><input type="number" name="phone[]" placeholder="Enter your Phone" class="form-control" /></td>
                                    <td><input type="text" name="address[]" placeholder="Enter your Address" class="form-control" /></td>
                                    <td><input type="text" name="coordinate[]" placeholder="Enter your Coordinate" class="form-control" /></td>
                                    <td><input type="text" name="coordinate_description[]" placeholder="Enter your Coordinate Description" class="form-control" /></td>
                                    <td><input type="text" name="description_of_land_type[]" placeholder="Enter your Land Type" class="form-control" /></td>
                                    <td><button type="button" name="add" id="add" class="btn btn-success"><i
                                        class="ti-plus"></i></button></td>
                                </tr>
                            </table>
                            </div>

                            <button type="submit" class="btn btn-success">Save</button>
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
    var i = 0;

    $("#add").click(function(){

        ++i;

        $("#dynamicTable").append('<tr>' +
            '<td>' +
                '<select class="js-example-basic-single js-states form-control" name="species_id[]">' +
                    '<option selected>Choose Species</option>' +
                    '@foreach ($species as $item)' +
                    '<option value="{{ $item->id }}" {{ old('species_id') == $item->id ? 'selected' : null }}>{{ $item->local_name }}</option>' +
                    '@endforeach' +
                '</select>' +
            '</td>' +
            '<td>' +
                '<input type="text" name="names[]" placeholder="Enter your Name" class="form-control" />' +
            '</td>' +
            '<td>' +
                '<input type="text" name="phone[]" placeholder="Enter your Qty" class="form-control"/>' +
            '</td>' +
            '<td>' +
                '<input type="text" name="address[]" placeholder="Enter your Price" class="form-control" />' +
            '</td>' +
            '<td>' +
                '<input type="text" name="coordinate[]" placeholder="Enter your Price" class="form-control" />' +
            '</td>' +
            '<td>' +
                '<input type="text" name="coordinate_description[]" placeholder="Enter your Price" class="form-control" />' +
            '</td>' +
            '<td>' +
                '<input type="text" name="description_of_land_type[]" placeholder="Enter your Price" class="form-control" />' +
            '</td>' +
            '<td>' +
                '<button type="button" class="btn btn-danger remove-tr"><i class="ti-close"></i></button>' +
            '</td>' +
            '</tr>');
    });

    $(document).on('click', '.remove-tr', function(){
         $(this).parents('tr').remove();
    });

</script>

@endpush
