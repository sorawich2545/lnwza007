<x-active class="news-detail">
  <!-- Breadcrumb Section -->
  <section class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>{{ $article->title }}</h2>
        <ol>
          <li><a href="{{ url('/') }}">News</a></li>
          <li>{{ Str::limit($article->title, 30) }}</li>
        </ol>
      </div>
    </div>
  </section>

  <!-- Article Detail Section -->
  <section class="blog-details section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <article class="article">
            <div class="post-img">
              <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="img-fluid">
            </div>

            <h2 class="title">{{ $article->title }}</h2>

            <div class="meta-top">
              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-person"></i> {{ $article->author }}</li>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <time datetime="{{ $article->created_at->format('Y-m-d') }}">{{ $article->created_at->format('M d, Y') }}</time></li>
                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> {{ $article->genre }}</li>
              </ul>
            </div>

            <div class="content">
              <p class="lead">{{ $article->summary }}</p>
              <div class="article-content">
                {!! nl2br(e($article->content)) !!}
              </div>
            </div>

            <!-- Movie Information Card -->
            <div class="movie-info-card mt-5 p-4 bg-light rounded">
              <h4>Movie Information</h4>
              <div class="row">
                <div class="col-md-6">
                  <p><strong>Title:</strong> {{ $article->movie_title }}</p>
                  <p><strong>Genre:</strong> {{ $article->genre }}</p>
                  <p><strong>Director:</strong> {{ $article->director }}</p>
                </div>
                <div class="col-md-6">
                  <p><strong>Release Date:</strong> {{ $article->release_date->format('F j, Y') }}</p>
                </div>
              </div>
            </div>

            <div class="meta-bottom">
              <i class="bi bi-folder"></i>
              <ul class="cats">
                <li><a href="{{ route('news') }}">{{ $article->genre }}</a></li>
              </ul>

              <i class="bi bi-tags"></i>
              <ul class="tags">
                <li><a href="{{ route('news') }}">Movie News</a></li>
                <li><a href="{{ route('news') }}">{{ $article->genre }}</a></li>
              </ul>
            </div>

          </article>
        </div>

        <div class="col-lg-4 sidebar">
          <div class="widgets-container">

            <!-- Recent Posts Widget -->
            <div class="recent-posts-widget widget-item">
              <h3 class="widget-title">Recent News</h3>
              @foreach(\App\Models\MovieNews::where('id', '!=', $article->id)->orderBy('created_at', 'desc')->limit(5)->get() as $recentNews)
              <div class="post-item">
                <img src="{{ $recentNews->image_url }}" alt="{{ $recentNews->title }}" class="flex-shrink-0">
                <div>
                  <h4><a href="{{ route('news.detail', $recentNews->id) }}">{{ Str::limit($recentNews->title, 60) }}</a></h4>
                  <time datetime="{{ $recentNews->created_at->format('Y-m-d') }}">{{ $recentNews->created_at->format('M d, Y') }}</time>
                </div>
              </div>
              @endforeach
            </div>

            <!-- Tags Widget -->
            <div class="tags-widget widget-item">
              <h3 class="widget-title">Tags</h3>
              <ul>
                <li><a href="{{ route('news') }}">Action</a></li>
                <li><a href="{{ route('news') }}">Drama</a></li>
                <li><a href="{{ route('news') }}">Comedy</a></li>
                <li><a href="{{ route('news') }}">Science Fiction</a></li>
                <li><a href="{{ route('news') }}">Horror</a></li>
                <li><a href="{{ route('news') }}">Animation</a></li>
                <li><a href="{{ route('news') }}">Adventure</a></li>
              </ul>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Back to News Section -->
  <section class="back-to-news section-sm bg-light">
    <div class="container">
      <div class="text-center">
        <a href="{{ route('news') }}" class="btn btn-primary">
          <i class="bi bi-arrow-left"></i> Back to All News
        </a>
      </div>
    </div>
  </section>
</x-active>