@if (count($images) > 0)
    @foreach($images as $img)
    <a href="{{ $img->media_url }}" title="{{ $img->media_title }}" class="image-link" data-lightbox='magnific-image'> 
        <img src="{{ $img->media_url }}" alt="" />
    </a>
    @endforeach
@endif