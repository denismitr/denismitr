@if($post->hasParts())
    <div class="flex mb-5">
        @foreach($post->parts as $part)
            <a class="mr-4" href="{{ $part->getUrl() }}">@lang('blog.part') {{ $part->part }}</a>
        @endforeach
    </div>
@elseif($post->hasParent())
    <div class="flex mb-5">
        <a class="mr-4" href="{{ $post->parent->getUrl() }}">@lang('blog.part') 1</a>
        @foreach($post->parent->parts as $part)
            <a class="mr-4" href="{{ $part->getUrl() }}">@lang('blog.part') {{ $part->part }}</a>
        @endforeach
    </div>
@endif