<div class="jeg_sidebar left jeg_sticky_sidebar col-sm-4" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
    <div class="jegStickyHolder">
        <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static;">
            <div class="widget widget_jnews_module_block_4" id="jnews_module_block_4-2">
                <div class="jeg_postblock_4 jeg_postblock jeg_module_hook jeg_pagination_disable jeg_col_1o3 jnews_module_11285_1_63218639448e6  normal " data-unique="jnews_module_11285_1_63218639448e6">
                    <div class="jeg_block_heading jeg_block_heading_6 jeg_subcat_right">
                        <h3 class="jeg_block_title"><span>VIDEO <strong>MỚI NHẤT</strong></span></h3>
                    </div>
                    <div class="jeg_posts jeg_block_container">
                        <div class="jeg_posts jeg_load_more_flag">
                            @foreach(\App\Models\Video::with('media')->latest()->take(5)->get() as $l)
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
                                            <a href="{{ $l->showUrl() }}" class="text-3-line">{{ $l->title }}</a>
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
