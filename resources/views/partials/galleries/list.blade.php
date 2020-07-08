
<div class="title-container-outer-wrap">
    <div class="title-container-wrap-remover-aqui">
        <div class="title-container clearfix">
            <div class="entry-title">
                @if(isset($title))
                <h1 class="entry-title">
                    {{ $title }}
                </h1>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="container-fluid clearfix">
    <div class="page-contents-wrap">
        <div id="post-5836" class="post-5836 page type-page status-publish hentry">
            <div class="entry-page-wrapper entry-content clearfix">
                <div id="mtheme-pagebuilder-wrapper-5836" class="mtheme-pagebuilder">
                    <div class="mtheme-supercell clearfix ">
                        <div class="mtheme-cell-wrap">
                            <div id="mtheme-block-1" class="mtheme-block mtheme-block-em_portfolio_grid span12 mtheme-first-cell " data-width="12">
                                <div class="gridblock-filter-select-wrap">
                                    <ul id="gridblock-filters">
                                        <li class="filter-control filter-control-artwork">
                                            <a href="{{ route('portfolio.index') }}" class="btn btn-link">Fotos ({{ count($medias) }})</a>
                                        </li>
                                        <li class="filter-control filter-control-artwork">
                                            <a href="{{ route('galleries.index') }}" class="btn btn-link">Galleries ({{ count($userGalleries) }})</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="contentclearfix clearfix"></div>
    </div>
</div>    