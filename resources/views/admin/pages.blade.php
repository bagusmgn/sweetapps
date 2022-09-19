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
                        <table class="table table-bordered table-hover" id='userTable' style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type='text' id='username' placeholder="Enter your Name" class="form-control"></td>
                                    <td><input type='text' id='name' placeholder="Enter your Name" class="form-control"></td>
                                    <td><input type='text' id='email' placeholder="Enter your Name" class="form-control"></td>
                                    <td><input type='button' id='adduser' value='Add' class="btn btn-primary"></td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<!-- Script -->
<script type='text/javascript'>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $(document).ready(function () {

        // Fetch records
        fetchRecords();

        // Add record
        $('#adduser').click(function () {

            var username = $('#username').val();
            var name = $('#name').val();
            var email = $('#email').val();

            if (username != '' && name != '' && email != '') {
                $.ajax({
                    url: 'addUser',
                    type: 'post',
                    data: {
                        _token: CSRF_TOKEN,
                        username: username,
                        name: name,
                        email: email
                    },
                    success: function (response) {

                        if (response > 0) {
                            var id = response;
                            var findnorecord = $('#userTable tr.norecord').length;

                            if (findnorecord > 0) {
                                $('#userTable tr.norecord').remove();
                            }
                            var tr_str = "<tr>" +
                                "<td align='center'><input type='text' class='form-control' value='" + username +
                                "' id='username_" + id + "' disabled ></td>" +
                                "<td align='center'><input type='text' class='form-control' value='" + name +
                                "' id='name_" + id + "'></td>" +
                                "<td align='center'><input type='email' class='form-control' value='" + email +
                                "' id='email_" + id + "'></td>" +
                                "<td align=''><input type='button' value='Update' class='btn btn-info update' data-id='" +
                                id +
                                "' >" + "&nbsp" +"<input type='button' value='Delete' onclick='return confirm('Are you sure you want to delete this item')' class='btn btn-danger delete' data-id='" +
                                id + "' ></td>" +
                                "</tr>";

                            $("#userTable tbody").append(tr_str);
                        } else if (response == 0) {
                            alert('Username already in use.');
                        } else {
                            alert(response);
                        }

                        // Empty the input fields
                        $('#username').val('');
                        $('#name').val('');
                        $('#email').val('');
                    }
                });
            } else {
                alert('Fill all fields');
            }
        });

    });

    // Update record
    $(document).on("click", ".update", function () {
        var edit_id = $(this).data('id');

        var name = $('#name_' + edit_id).val();
        var email = $('#email_' + edit_id).val();

        if (name != '' && email != '') {
            $.ajax({
                url: 'updateUser',
                type: 'post',
                data: {
                    _token: CSRF_TOKEN,
                    editid: edit_id,
                    name: name,
                    email: email
                },
                success: function (response) {
                    alert(response);
                }
            });
        } else {
            alert('Fill all fields');
        }
    });

    // Delete record
    $(document).on("click", ".delete", function () {
        var delete_id = $(this).data('id');
        var el = this;
        $.ajax({
            url: 'deleteUser/' + delete_id,
            type: 'get',
            success: function (response) {
                $(el).closest("tr").remove();
                alert(response);
            }
        });
    });

    // Fetch records
    function fetchRecords() {
        $.ajax({
            url: 'getUsers',
            type: 'get',
            dataType: 'json',
            success: function (response) {

                var len = 0;
                $('#userTable tbody tr:not(:first)').empty(); // Empty <tbody>
                if (response['data'] != null) {
                    len = response['data'].length;
                }

                if (len > 0) {
                    for (var i = 0; i < len; i++) {

                        var id = response['data'][i].id;
                        var username = response['data'][i].username;
                        var name = response['data'][i].name;
                        var email = response['data'][i].email;

                        var tr_str = "<tr>" +
                            "<td align='center'><input type='text' class='form-control' value='" + username + "' id='username_" +
                            id + "' disabled></td>" +
                            "<td align='center'><input type='text' class='form-control' value='" + name + "' id='name_" + id +
                            "'></td>" +
                            "<td align='center'><input type='email' class='form-control' value='" + email + "' id='email_" + id +
                            "'></td>" +
                            "<td align=''><input type='button' value='Update' class='btn btn-info update' data-id='" +
                            id + "' >" + "&nbsp" +"<input type='button' onclick='return confirm('Are you sure you want to delete this item')' value='Delete' class='btn btn-danger delete' data-id='" + id +
                            "' ></td>" +
                            "</tr>";

                        $("#userTable tbody").append(tr_str);

                    }
                } else {
                    var tr_str = "<tr class='norecord'>" +
                        "<td align='center' colspan='4'>No record found.</td>" +
                        "</tr>";

                    $("#userTable tbody").append(tr_str);
                }

            }
        });
    }

</script>
@endpush
