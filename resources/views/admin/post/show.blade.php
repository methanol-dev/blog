@extends('layouts.backend.app')
@push('header')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endpush
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Post</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Post</a></li>
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
                            <a href="{{ route('admin.post.edit', $post->id)}}" class="btn btn-info"><i
                                    class="fa fa-pencil"></i></a>
                            <button type="button" class="btn btn-danger float-right" data-toggle="modal"
                                data-target="#deleteModal-{{ $post->id }}">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        </div>
                        <div class="card-body">
                            <h1>{{ $post->title }}</h1>
                            <h5>{{ $post->category->name }}</h5>
                            <p>Created At : {{ $post->created_at }}</p>
                            <p>Updated At : {{ $post->updated_at }}</p>
                            <p>Tags : {{ $post->tags }}</p>
                            <hr>
                            <div>{!! $post->body !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
        <div class="animated">

            {{-- delete category --}}
            <div class="modal fade" id="deleteModal-{{ $post->id }}" tabindex="-1" role="dialog"
                aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel">Delete Post</h5>
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
                                                                                                                                document.getElementById('deletepost-{{ $post->id }}').submit();">Confirm</button>
                            <form action="{{ route('admin.post.destroy', $post->id) }}" method="POST"
                                id="deletepost-{{ $post->id }}" style="display: none" enctype="multipart/form-data"
                                class="form-horizontal">
                                @csrf
                                @method('DELETE')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .animated -->
    </div>
@endsection
@push('footer')
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
@endpush
