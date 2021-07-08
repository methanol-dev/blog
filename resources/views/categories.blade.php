@extends('layouts.frontend.app')

@section('content')
    <div class="main-wrapper">
        <section class="fashion-area section-gap" id="fashion">
            <div class="container">
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-lg-3 col-md-6 single-fashion">
                            <img class="img-fluid" src="{{ asset('storage/category/' . $category->image) }}" alt="" />
                            <p class="date">{{ $category->created_at }}</p>
                            <h4><a href="{{route('category.post', $category->slug)}}">{{ $category->name }}</a></h4>
                            <p>{{ $category->description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
