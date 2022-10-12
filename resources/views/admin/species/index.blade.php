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
                                        <td style="text-align: center"><img src="uploads/species_photo/cover/{{ $culture->image }}" style="width: 150px"></td>
                                        <td style="text-align: center">
                                            <form id="DeleteCategory{{ $culture->id }}" action="{{ route('species.destroy',$culture->id) }}" method="POST">
                                                <a class="btn btn-sm btn-success btn-floating"
                                                    href="{{ route('lahans.edit', $culture->id) }}"><i class="ti-pencil"></i></a>
                                                <a class="btn btn-sm btn-info btn-floating" href=""><i
                                                        class="ti-eye"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" id="delete-post" onclick="deleteCategory()" class="btn btn-sm btn-danger btn-floating"
                                                ><i class="ti-trash"></i></button>
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
@push('scripts')
<script>
    function deleteCategory(id, name) {

        var name = $(this).data("name");
        var content = document.createElement('div');
        content.innerHTML = 'Menghapus kategori <strong>'+ name + '</strong> akan menghapus seluruh kategori didalamnya.';
        Swal.fire({
            title: 'Apakah kamu yakin?',
            html: content,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yakin, hapus kategori',
            cancelButtonText: 'Batalkan'
        })
        .then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Sedang menghapus Layanan",
                    showConfirmButton: false,
                    timer: 2300,
                    timerProgressBar: true,
                    onOpen: () => {
                        document.getElementById(`DeleteService${id}`).submit();
                        Swal.fire(
                        'Terhapus!',
                        'Category berhasil dihapus',
                        'success'
                        )
                    }
                });
            }
        })
    }
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@endpush
