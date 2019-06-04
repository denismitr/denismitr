@foreach($posts as $post)
    <div class="mb-4">
        <h4 class="text-red text-xl font-italic mb-4">
            <strong>&mdash;</strong>
            &nbsp;
            <a class="text-red hover:text-red-darker" href="{{ route('front.blog.post', $post->getRouteKey()) }}">{{ $post->name }}</a>
            @if($post->hasParts())
                &nbsp;
                &nbsp;
                [
                <a class="text-red hover:text-red-darker text-sm" href="{{ route('front.blog.post', $post->getRouteKey()) }}">part 1</a>,
                @foreach($post->parts as $part)
                    &nbsp;<a class="text-red hover:text-red-darker text-sm" href="{{ route('front.blog.post', $part->getRouteKey()) }}">part {{ $part->part }}</a>
                    @unless($loop->last)
                        ,
                    @endunless
                @endforeach
                ]
            @endif
        </h4>

        <p class="text-grey mb-3">{{ $post->human_date }} | {{ $post->topic_names }}</p>
        <p>{!! $post->description(150) !!}</p>
    </div>
@endforeach