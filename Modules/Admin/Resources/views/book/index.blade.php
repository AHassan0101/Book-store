@extends('admin::layouts.master')
@section('extra-head')
    <style>
        .btn-float {
            padding: 5px !important;
        }

        .btn-success {
            z-index: 0 !important;
        }
    </style>
@stop
@section('content')
    <div class="content-body">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">Books</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item">Books</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section id="configuration">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('All Books') }} |
                                <button class="btn btn-float btn-float-md btn-primary"
                                        onclick="window.location='{{ route('admin.books.create') }}'">{{ __('Add New') }}
                                </button>
                            </h4>
                            <a class="heading-elements-toggle"><i
                                    class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                    <tr style="text-align: center">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Author</th>
                                        <th>Stock</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($books as $book)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $book->name }}</td>
                                            <td class="text-center">{{ $book->price }}</td>
                                            <td class="text-center">{{ $book->author }}</td>
                                            <td class="text-center">
                                                <button type="button"
                                                        onclick="editFunction('{{ $book->id }}','{{ $book->stock }}')"
                                                        class="btn btn-float btn-float-md btn-outline-success">Stock
                                                </button>
                                            </td>
                                            <td class="text-center">
                                                <span>
                                                    <button type="button"
                                                            onclick="window.location.href='{{ route("admin.books.edit", $book->slug) }}'"
                                                            class="btn btn-float btn-float-md btn-outline-info">
                                                        <i class="la la-edit"></i>
                                                    </button>
                                                    <button type="button"
                                                            onclick="deleteFunction({{ $book->id }})"
                                                            class="btn btn-float btn-float-md btn-outline-danger">
                                                        <i class="la la-trash"></i>
                                                    </button>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Book Stock</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form id="myForm" class="form" action="{{ route('admin.books.stock.update') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="hidden" id="book_id" name="book_id">
                                        <label for="stock">Stock</label>
                                        <input type="number" min="0" id="stock" class="form-control"
                                               placeholder="Stock" name="stock" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">
                            <i class="la la-check-square-o"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('extra-script')
    <script>
        $('.table').dataTable({
            "pageLength": 50
        });

        function editFunction(id, stock) {
            $("#book_id").val(id);
            $("#stock").val(stock);
            $('#myModal').modal('show');
        }

        function deleteFunction(id) {
            let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            swal({
                title: "Are you Sure",
                text: "You want to delete?",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "No, cancel please.",
                        value: null,
                        visible: true,
                        className: "",
                        closeModal: false,
                    },
                    confirm: {
                        text: "Yes",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: false
                    }
                }
            }).then(isConfirm => {
                if (isConfirm) {
                    $.ajax({
                        url: "{{ route('admin.books.destroy') }}",
                        type: 'post',
                        data: {
                            id: id,
                            _token: CSRF_TOKEN,
                        },
                        dataType: 'JSON',
                        success: function (data) {
                            if (data.status === 200) {
                                swal("Book has been deleted", {
                                    icon: "success",
                                });
                                location.reload();
                            }
                            if (data.status === 400) {
                                swal("Cancelled", "It's safe.", "error");
                            }
                        },
                    });
                } else {
                    swal("Cancelled", "It's safe.", "error");
                }
            });
        }
    </script>
    @if(Session::has('success'))
        <script>
            toastr.success('{{ Session::get('success') }}')
        </script>
    @endif
@stop
