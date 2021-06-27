@extends('layouts.backend.app')
@push('header')
    <link rel="stylesheet" href="{{ asset('backend/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endpush
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Category Table</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                                <span class="badge badge-pill badge-danger ">Error</span>{{ $error }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Category Table</strong>                            
                                <button type="button" class="btn btn-primary mb-1 float-right" data-toggle="modal"
                                    data-target="#createModal">
                                    <i class="fa fa-plus"></i>
                                </button>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Created_At</th>
                                        <th>Updated_At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $key => $category)
                                        <tr>
                                            <th>{{ $key + 1 }}</th>
                                            <th>{{ $category->name }}</th>
                                            <th>{{ $category->slug }}</th>
                                            <th>{{ $category->created_at }}</th>
                                            <th>{{ $category->updated_at }}</th>
                                            <td>
                                                <div class="card-body">
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#viewModal-{{ $category->id }}">
                                                        <i class="fa fa-eye"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-secondary" data-toggle="modal"
                                                        data-target="#editModal-{{ $category->id }}">
                                                        <i class="fa fa-pencil"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#deleteModal-{{ $category->id }}">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
        <div class="animated">

            @foreach ($categories as $category)

                {{-- create category --}}
                <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
                    aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Create Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.category.store') }}" method="post" id="createCategory"
                                    enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="name" class=" form-control-label">Name</label>
                                        </div>
                                        <div class="col-12 col-md-9"><input type="text" id="name" name="name"
                                                placeholder="Name" class="form-control"><small
                                                class="form-text text-muted">This is name category</small></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="description"
                                                class=" form-control-label">Description</label></div>
                                        <div class="col-12 col-md-9"><textarea name="description" id="description" rows="9"
                                                placeholder="Content..." class="form-control"></textarea></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="image" class=" form-control-label">Category
                                                Image</label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="image" name="image"
                                                class="form-control-file"></div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm"
                                            onclick="event.preventDefault();
                                                                                                document.getElementById('createCategory').submit();">
                                            <i class="fa fa-dot-circle-o"></i> Create
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- View category --}}
                <div class="modal fade" id="viewModal-{{ $category->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="mediumModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">View</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-sm-6">
                                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label class=" form-control-label">Name</label></div>
                                            <div class="col-12 col-md-9">
                                                <p class="form-control-static">{{ $category->name }}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label class=" form-control-label">Slug</label></div>
                                            <div class="col-12 col-md-9">
                                                <p class="form-control-static">{{ $category->slug }}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label class=" form-control-label">Created At</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <p class="form-control-static">{{ $category->created_at }}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label class=" form-control-label">Updated At</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <p class="form-control-static">{{ $category->updated_at }}</p>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label class=" form-control-label">Description</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <p class="form-control-static">{{ $category->description }}</p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ asset('storage/category/' . $category->image) }}"
                                        alt="{{ $category->image }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- edit category --}}
                <div class="modal fade" id="editModal-{{ $category->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="mediumModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Edit Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.category.update', $category->id) }}" method="post"
                                    id="editCategory-{{ $category->id }}" enctype="multipart/form-data"
                                    class="form-horizontal">
                                    @csrf
                                    @method('PUT')
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="name" class=" form-control-label">Name</label>
                                        </div>
                                        <div class="col-12 col-md-9"><input type="text" id="name" name="name"
                                                placeholder="Name" class="form-control"
                                                value="{{ $category->name }}"><small class="form-text text-muted">This is
                                                name category</small></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="description"
                                                class=" form-control-label">Description</label></div>
                                        <div class="col-12 col-md-9"><textarea name="description" id="description" rows="9"
                                                placeholder="Content..."
                                                class="form-control">{{ $category->description }}</textarea></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="image" class=" form-control-label">Category
                                                Image</label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="image" name="image"
                                                class="form-control-file"></div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm"
                                            onclick="event.preventDefault();
                                                                                                    document.getElementById('editCategory-{{ $category->id }}').submit();">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- delete category --}}
                <div class="modal fade" id="deleteModal-{{ $category->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">Delete Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    You sure!!!
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary btn-danger"
                                    onclick="event.preventDefault();
                                                                                            document.getElementById('deleteCategory-{{ $category->id }}').submit();">Confirm</button>
                                <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST"
                                    id="deleteCategory-{{ $category->id }}" style="display: none"
                                    enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                    @method('DELETE')
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div><!-- .animated -->
    </div>
@endsection
@push('footer')
    <script src="{{ asset('backend/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/init-scripts/data-table/datatables-init.js') }}"></script>

    <script>
        $(document).ready(function() {

            (function($) {

                $('#filter').keyup(function() {

                    var rex = new RegExp($(this).val(), 'i');
                    $('.searchable tr').hide();
                    $('.searchable tr').filter(function() {
                        return rex.test($(this).text());
                    }).show();

                })

            }(jQuery));

        });
    </script>

    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
@endpush
