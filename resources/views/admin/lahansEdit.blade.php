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

                        <h6 class="card-title">Edit Fields</h6>
                        <form class="forms-sample" action="{{ route('lahans.update', $fields->id) }}" method="POST" enctype="multipart/form-data">
                        {{--  <form action="" method="POST">  --}}
                            @csrf
                            @method('put')

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
                                        <select class="custom-select" name="species_id[]">
                                            <option selected>Choose Species</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                          </select>
                                    </td>
                                    <td><input type="text" name="names[]" placeholder="Enter your Name" value="{{ $fields->names }}" class="form-control" /></td>
                                    <td><input type="number" name="phone[]" placeholder="Enter your Qty" class="form-control" /></td>
                                    <td><input type="text" name="address[]" placeholder="Enter your Price" class="form-control" /></td>
                                    <td><input type="text" name="coordinate[]" placeholder="Enter your Price" class="form-control" /></td>
                                    <td><input type="text" name="coordinate_description[]" placeholder="Enter your Price" class="form-control" /></td>
                                    <td><input type="text" name="description_of_land_type[]" placeholder="Enter your Price" class="form-control" /></td>
                                    <td>
                                        <button type="button" name="add" id="add" class="btn btn-success"><i class="ti-plus"></i></button>
                                        <button class="btn btn-primary" id="update_data" value="{{ $fields->id }}">Update</button>
                                    </td>
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

    var id = $(this).data('id');
    console.log(id)
    var i = 0;

    $("#add").click(function(){

        ++i;

        $("#dynamicTable").append('<tr>' +
            '<td>' +
                '<select class="custom-select" name="species_id[]">' +
                    '<option selected>Choose Species</option>' +
                    '<option value="1">One</option>' +
                    '<option value="2">Two</option>' +
                    '<option value="3">Three</option>' +
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
                '<input type="button" value="Update" class="update" data-id="'+id+'" >' +
            '</td>' +
            '</tr>');
    });

    $(document).on('click', '.remove-tr', function(){
         $(this).parents('tr').remove();
    });

    $(document).on("click", "#update_data", function() {
        var url = "{{ route('lahans.update', $fields->id) }}";
        var id=
        $.ajax({
            url: url,
            type: "PUT",
            cache: false,
            data:{
                _token:'{{ csrf_token() }}',
                type: 3,
                name: $('#name').val(),
                email: $('#email').val(),
                phone: $('#phone').val(),
                city: $('#city').val()
            },
            success: function(dataResult){
                dataResult = JSON.parse(dataResult);
             if(dataResult.statusCode)
             {
                window.location = "/userData";
             }
             else{
                 alert("Internal Server Error");
             }

            }
        });
    });



</script>
{{--  <script>
    $(document).ready(function(){


});

</script>  --}}
@endpush
