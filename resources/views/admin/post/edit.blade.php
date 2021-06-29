@extends('layouts.backend.app')
@push('header')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endpush
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Edit</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#" class="active">Edit Post</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
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

                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.post.update', $post->id) }}" method="POST"
                            enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            @method('PUT')
                            {{-- title --}}
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="title" class=" form-control-label">Title</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="title" name="title" placeholder="Title" class="form-control"
                                        value="{{ $post->title }}">
                                </div>
                            </div>
                            {{-- categories --}}
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Category</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="category" id="select" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $post->category->id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- tags --}}
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="tag" class=" form-control-label">Tags</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="tag" name="tags" placeholder="Tag(Separated by ,)"
                                        class="form-control" value="tag">
                                </div>
                            </div>
                            {{-- status --}}
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Status</label></div>
                                <div class="col col-md-9">
                                    <div class="form-check">
                                        <div class="checkbox">
                                            <label for="checkbox1" class="form-check-label ">
                                                <input type="checkbox" id="checkbox1" name="status" value="1"
                                                    class="form-check-input"
                                                    {{ $post->status == 1 ? 'checked' : '' }}>Published
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- image --}}
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Image</label>
                                </div>
                                <div class="col-12 col-md-9"><input type="file" id="file-input" name="image"
                                        class="form-control-file"></div>
                            </div>
                            {{-- body --}}
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="body" class=" form-control-label">Content</label>
                                </div>
                                <div class="col-12 col-md-9"><textarea name="body" id="summernote" rows="9"
                                        placeholder="Content..." class="form-control">{{ $post->body }}</textarea></div>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div>
@endsection
@push('footer')

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
    <script>
        $('#summernote').summernote({
            tabsize: 2,
            height: 300,
        });
    </script>

    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
@endpush
