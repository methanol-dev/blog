<div class="col-lg-4 sidebar-area">
    <div class="single_widget search_widget">
        <div id="imaginary_container">
            <div class="input-group stylish-input-group">
                <form action="{{ route('search') }}" method="get">
                    <input type="text" class="form-control" name="search" placeholder="search">
                    <span class="input-group-addon">
                        <button type="submit">
                            <span class="lnr lnr-magnifier"></span>
                        </button>
                    </span>
                </form>
            </div>
        </div>
    </div>

    <div class="single_widget cat_widget">
        <h4 class="text-uppercase pb-20">post categories</h4>
        <ul>
            @foreach ($categories as $category)
                <li>
                    <a
                        href="{{ route('category.post', $category->slug) }}">{{ $category->name }}<span>{{ $category->posts->count() }}</span></a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="single_widget recent_widget">
        <h4 class="text-uppercase pb-20">Recent Posts</h4>
        <div class="active-recent-carusel">
            @foreach ($posts as $post)
                <div class="item">
                    <img src="{{ asset('storage/post/' . $post->image) }}" alt="{{ $post->image }}" />
                    <a href="{{ route('post', $post->slug) }}">
                        <p class="mt-20 title text-uppercase">
                            {{ $post->title }}
                        </p>
                    </a>
                    <p>
                        {{ $post->created_at->diffForHumans() }}
                        <span>
                            <i class="fa fa-heart-o" aria-hidden="true"></i> 06
                            <i class="fa fa-comment-o" aria-hidden="true"></i>02</span>
                    </p>
                </div>
            @endforeach
        </div>
    </div>

    <div class="single_widget tag_widget">
        <h4 class="text-uppercase pb-20">Tag Clouds</h4>
        <ul>
            <li><a href="#">Lifestyle</a></li>
            <li><a href="#">Art</a></li>
            <li><a href="#">Adventure</a></li>
            <li><a href="#">Food</a></li>
            <li><a href="#">Technology</a></li>
            <li><a href="#">Fashion</a></li>
            <li><a href="#">Adventure</a></li>
            <li><a href="#">Food</a></li>
            <li><a href="#">Technology</a></li>
        </ul>
    </div>
</div>
