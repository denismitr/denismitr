@extends('layouts.admin')

@section('content')
    <section>
        <h2 class="title is-2">Posts</h2>
        <p>
            <a class="button is-success" href="{{ route('admin.posts.create') }}">Create</a>
        </p>

        @include('admin._notification')
    </section>
    <section class="section">
        @foreach($posts as $post)
            <article class="media">
                <div class="media-content">
                    <div class="content">
                        <p><strong>{{ $post->name }}</strong></p>
                        <p>
                            Topics:
                            @foreach($post->topics as $topic)
                                <span class="tag is-info is-medium">{{ $topic->name }}</span>
                            @endforeach
                        </p>
                    </div>
                    <br>
                    <nav class="level is-media">
                        <a class="button is-warning" href="{{ route('admin.posts.edit', $post->getRouteKey()) }}">Edit</a>
                        <a class="button is-danger" href="{{ route('admin.posts.confirm', $post->getRouteKey()) }}">Delete</a>
                    </nav>
                </div>
            </article>
        @endforeach
        <br><br>
        {{  $posts->links('admin.pagination.bulma') }}
    </section>
@endsection