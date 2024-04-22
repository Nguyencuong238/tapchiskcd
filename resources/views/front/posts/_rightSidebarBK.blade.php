<div class="col-xl-3 col-lg-4 sidebar-widget">
    <div class="widget widget-search">
        <form action="{{route('front.posts.index')}}">
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
    <div class="widget widget-archive">
        <div class="heading-layout1">
            <h3 class="heading-title">Danh mục</h3>
        </div>
        <ul class="archive-list">
        @foreach(\App\Models\Category::where('parent_id')->get() as $category)
        {{-- @php
                $query = \DB::table('categories')
                    ->whereSlug($category->slug)
                    ->unionAll(
                        \DB::table('categories')
                            ->select('categories.*')
                            ->join('tree', 'tree.id', '=', 'categories.parent_id')
                    );

                $treeIds = \DB::table('tree')
                    ->withRecursiveExpression('tree', $query)
                    ->pluck('tree.id')
                    ->toArray();

                $count = \App\Models\Post::whereHas('categories', function($q) use ($treeIds){
                    $q->whereIn('id', $treeIds);
                })->count();

            @endphp --}}
            <li>
                <a href="{{ route('postCategory', $category->slug) }}">{{ $category->name }}
                {{-- <span>({{ $count }})</span> --}}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="widget widget-upcoming-post">
        <div class="heading-layout1">
            <h2 class="heading-title">Bài viết mới</h2>
        </div>
        <div class="post-list-layout2">
            @foreach(\App\Models\Post::with('media')->latest()->take(5)->get() as $l)
            <div class="media">
                <div class="item-img">
                    <img class="lazyload" data-src="{{ $l->getFirstMediaUrl('media', 'show') }}" alt="{{ $l->title }}">
                </div>
                <div class="media-body">
                    <div class="post-date"><i class="flaticon-clock"></i> {{ $l->created_at->translatedFormat('M, Y') }}</div>
                    <h4 class="post-title"><a class="text-overflow-2-lines" href="{{ $l->showUrl() }}">{{ $l->title }}</a></h4>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="widget widget-archive">
        <div class="heading-layout1">
            <h2 class="heading-title">Archives</h2>
        </div>
        @php
            $archives = \Cache::remember('archives', 60*60*24, function() {
                return \App\Models\Post::query()
                        ->selectRaw('YEAR(created_at) as year')
                        ->selectRaw('MONTHNAME(created_at) as month')
                        ->selectRaw('Count(*) as published_count')
                        ->groupBy('year', 'month')
                        ->orderByRaw('min(created_at) desc')
                        ->get()
                        ->toArray();
            });

            $monthMap = [
                'January' => 'Tháng 1',
                'February' => 'Tháng 2',
                'March' => 'Tháng 3',
                'April' => 'Tháng 4',
                'May' => 'Tháng 5',
                'June' => 'Tháng 6',
                'July' => 'Tháng 7',
                'August' => 'Tháng 8',
                'September' => 'Tháng 9',
                'October' => 'Tháng 10',
                'November' => 'Tháng 11',
                'December' => 'Tháng 12'
            ];

        @endphp
        <ul class="archive-list">
        @foreach($archives as $stat)
        <li >
            <a href="{{ route('postArchive', ['month' => \Carbon\Carbon::parse($stat['month'])->month, 'year' => $stat['year']]) }}">
                {{ $monthMap[$stat['month']] }} / {{ $stat['year'] }} 
                <span>({{ \Str::shortNumber($stat['published_count']) }})</span>
            </a>
        </li>
        @endforeach
        </ul>
    </div>
    {{--  <div class="widget widget-tags">
        <div class="heading-layout1">
            <h2 class="heading-title">Thẻ</h2>
        </div>
        <ul class="tag-list">
            @foreach(\App\Models\Tag::get() as $tag)
                <li><a href="{{ route('postTag', $tag->slug) }}">{{ $tag->name }}</a></li>
            @endforeach
        </ul>
    </div>  --}}
</div>