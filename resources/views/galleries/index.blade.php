
@extends('layouts.app-scars')
@section('css')
<link rel='stylesheet' href='https://assetcdn.500px.org/assets/profiles-2c1aa8998c8477d93f3dc654fa46ea1d.css' type='text/css' media='all' />
<style>
    body {
        background-color: white; !important;
    }
</style>
@endsection
@section('content')
@include('partials.galleries.list')
<div class="profile_body">
	<div class="galleries_body infinite_scroll_container pagination_finished single_page galleries_body--fetched">
		<div class="gallery_list">
            @foreach($userGalleries as $gallery)<div class="gallery_card_view px_card medium no_badge no_avatar"><div class="gallery_card__overlay"></div>
            <a class="link_wrap" href="{{ route('galleries.show', $gallery->gallery_id) }}"></a>
            <div class="top" style="background-image:url('{{ $gallery->media_url }}')"></div>
            <div class="bottom gallery_card_view__bottom">
                <div class="gallery_card_view__name_wrapper ">
                    <a class="name" href="{{ route('galleries.show', $gallery->gallery_id) }}">{{ $gallery->gallery_name }}</a>
                </div>
                <span class="description gallery_card_view__photo_count gallery_card_view__description">{{ $gallery->total }}</span>
                </div>
            </div>@endforeach
	
			<div class="infinite_scroll_loader">
				<div class="loading"></div>
				<div class="finished">Concluído |
                    <a href="#">Back to top</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>
    //$("body").removeClass();
    //$("body").addClass("2020 browser_chrome desktop groups lang_pt-BR no_javascript not_logged_in promotion_April v3 with-cover-photo");
</script>
@endsection