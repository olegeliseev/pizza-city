<!-- Tags block -->
@props(['tags'])
@if ($tags->isNotEmpty())
    <div class="tags-block">
        @foreach ($tags as $tag)
            <a href="#" class="tags-block__tag">{{ $tag->name }}</a>
        @endforeach
    </div>
@endif
