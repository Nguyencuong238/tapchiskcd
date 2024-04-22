<div class="col-xl-3 col-lg-4 sidebar-widget">
    <div class="widget widget-search">
        <form action="">
        <div class="input-group stylish-input-group">
            <input type="text" class="form-control" value="{{ request('search') }}" name="search" placeholder="Tìm kiếm . . .">
            <span class="input-group-addon">
                <button type="submit">
                    <span class="flaticon-search" aria-hidden="true"></span>
                </button>
            </span>
        </div>
        </form>
    </div>
    <div class="widget widget-upcoming-post">
        <div class="heading-layout1">
            <h2 class="heading-title">Dự án mới</h2>
        </div>
        <div class="post-list-layout2">
            @foreach(\App\Models\Project::with('media')->latest()->take(5)->get() as $l)
            <div class="media">
                <div class="item-img">
                    <img class="lazyload" data-src="{{ $l->getFirstMediaUrl('media', 'show') }}" alt="{{ $l->name }}">
                </div>
                <div class="media-body">
                    <div class="post-date"><i class="flaticon-clock"></i> {{ $l->created_at->translatedFormat('M, Y') }}</div>
                    <h4 class="post-title"><a class="text-overflow-2-lines" href="{{ $l->showUrl() }}">{{ $l->name }}</a></h4>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="widget widget-tags">
        <div class="heading-layout1">
            <h2 class="heading-title">Thẻ</h2>
        </div>
        <ul class="tag-list">
            @foreach(\App\Models\Tag::get() as $tag)
                <li><a href="{{ route('postTag', $tag->slug) }}">{{ $tag->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>