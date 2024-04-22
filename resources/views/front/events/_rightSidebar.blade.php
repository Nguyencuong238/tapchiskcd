<div class="jeg_sidebar left jeg_sticky_sidebar col-sm-4" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
    <div class="jegStickyHolder">
        <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static;">
            <div class="widget widget_jnews_popular" id="jnews_popular-3">
                <div class="jeg_block_heading jeg_block_heading_6 jnews_module_11285_0_6321863940580">
                    <h3 class="jeg_block_title"><span>SỰ KIỆN<strong> NỔI BẬT</strong></span></h3>
                </div>
                <ul class="popularpost_list">
                    @php $key = 0; @endphp
                    @foreach(\App\Models\Event::with('media')->latest()->take(5)->get() as $l)
                        @php $key++; @endphp
                        <li class="popularpost_item format-standard">
                            <h3 class="jeg_post_title">
                                <a href="{{ $l->showUrl() }}" data-num="0{{ $key }}">
                                    {{ $l->title }}
                                </a>
                            </h3>
                            <div class="popularpost_meta">
                                <div class="jeg_socialshare">
                                    <span class="share_count"><i class="fa fa-share-alt"></i> 0 shares</span>
                                    <div class="socialshare_list">
                                        <a href="http://www.facebook.com/sharer.php?u={{ $l->showUrl() }}" class="jeg_share_fb">
                                            <span class="share-text">Share</span>
                                            <span class="share-count">0</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="widget widget_jnews_module_block_4" id="jnews_module_block_4-2">
                <div class="jeg_postblock_4 jeg_postblock jeg_module_hook jeg_pagination_disable jeg_col_1o3 jnews_module_11285_1_63218639448e6  normal " data-unique="jnews_module_11285_1_63218639448e6">
                    <div class="jeg_block_heading jeg_block_heading_6 jeg_subcat_right">
                        <h3 class="jeg_block_title"><span>SỰ KIỆN<strong> MỚI NHẤT</strong></span></h3>
                    </div>
                    <div class="jeg_posts jeg_block_container">
                        <div class="jeg_posts jeg_load_more_flag">
                            @foreach(\App\Models\Event::with('media')->latest()->take(5)->get() as $l)
                                <article class="jeg_post jeg_pl_md_3 format-standard">
                                    <div class="jeg_thumb">
                                        <a href="{{ $l->showUrl() }}">
                                            <div class="thumbnail-container animate-lazy  size-715 ">
                                                <img width="120" height="86" src="{{ $l->getFirstMediaUrl('media', 'show') }}"
                                                     class="attachment-jnews-120x86 size-jnews-120x86 wp-post-image lazyautosizes lazyloaded"
                                                     alt="{{ $l->title }}"
                                                     loading="lazy"
                                                     sizes="120px">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="jeg_postblock_content">
                                        <h3 class="jeg_post_title">
                                            <a href="{{ $l->showUrl() }}">{{ $l->title }}</a>
                                        </h3>
                                        <div class="jeg_post_meta">
                                            {{--  <div class="jeg_meta_author"><span class="by">Đăng bởi</span> <a href="{{ $l->showUrl() }}">Admin</a></div>  --}}
                                            <div class="jeg_meta_date">
                                                <a href="{{ $l->showUrl() }}">
                                                    <i class="fa fa-clock-o"></i>
                                                    {{ $l->created_at->format('d/m/Y H:i:s') }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="jeg_post_excerpt">
                                            <p>
                                                {{ $l->title }}
                                            </p>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
