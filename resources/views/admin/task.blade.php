@extends('admin.layouts.admin')

@section('content')
<div class="page-header">
    <div>
        <h3>Task Page</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/">Home</a>
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
    <div class="col-md-6">
        <label for="">Enter Task</label>
        <input type="text" placeholder="Enter task" class="form-control form-control-sm" name="task_name[]" id="task_name"
            value="">
        <font style="color:red"> {{ $errors->has('task_name') ?  $errors->first('task_name') : '' }} </font>
    </div>
    <div class="col-md-6">
        <label for="">Enter Cost</label>
        <input type="number" placeholder="Enter task" class="form-control form-control-sm" name="cost[]" id="cost"
            value="">
        <font style="color:red"> {{ $errors->has('cost') ?  $errors->first('cost') : '' }} </font>
    </div>
    <div class="col-md-6" style="margin-top:26px;">
        <button id="addMore" class="btn btn-success btn-sm">Add More </button>
    </div>
</div>
<div class="row">
    <div class="col-md-6">

        <form action="{{ route('task.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <table class="table table-sm table-bordered" style="display: none;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Cost</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody id="addRow" class="addRow">

                </tbody>
                <tbody>
                    <tr>
                        <td colspan="1" class="text-right">
                            <strong>Total:</strong>
                        </td>
                        <td>
                            <input type="number" id="estimated_ammount" class="estimated_ammount" value="0" readonly>
                        </td>
                    </tr>
                </tbody>

            </table>
            <button type="submit" class="btn btn-success btn-sm">Submit</button>
        </form>
    </div>


    @endsection
    @push('scripts')
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>

    <script id="document-template" type="text/x-handlebars-template">
        <tr class="delete_add_more_item" id="delete_add_more_item">

    <td>
      <input type="text" name="task_name[]" value="@{{ task_name }}">
    </td>
    <td>
      <input type="number" class="cost" name="cost[]" value="@{{ cost }}">
    </td>

    <td>
     <i class="removeaddmore" style="cursor:pointer;color:red;">Remove</i>
    </td>

</tr>
</script>
    <style>
        .btn.btn-success {
            margin-top: 18px;
        }
    </style>
    <script type="text/javascript">
        $(document).on('click', '#addMore', function () {

            $('.table').show();

            var task_name = $("#task_name").val();
            var cost = $("#cost").val();
            var source = $("#document-template").html();
            var template = Handlebars.compile(source);

            var data = {
                task_name: task_name,
                cost: cost
            }

            var html = template(data);
            $("#addRow").append(html)

            total_ammount_price();
        });

        $(document).on('click', '.removeaddmore', function (event) {
            $(this).closest('.delete_add_more_item').remove();
            total_ammount_price();
        });

        function total_ammount_price() {
            var sum = 0;
            $('.cost').each(function () {
                var value = $(this).val();
                if (value.length != 0) {
                    sum += parseFloat(value);
                }
            });
            $('#estimated_ammount').val(sum);
        }

    </script>

    @endpush
