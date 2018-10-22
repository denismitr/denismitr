@extends('layouts.admin')

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
@endsection

@section('content')
    <section>
        <div class="card">
            <form action="{{ route('admin.posts.update', $post->getRouteKey()) }}" method="POST" enctype="multipart/form-data" class="card-content">
                <p class="title">Edit post</p>

                @include('admin._notification')

                @csrf
                @method('PUT')

                @include('admin.posts._form')

                <br>

                <div>
                    <button type="submit" class="button is-primary">
                        Update
                    </button>
                    <a href="{{ route('admin.posts.index') }}" class="button is-danger">
                        Back
                    </a>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

    <script>
        var md = new SimpleMDE({ element: document.getElementById("body") });
    </script>
@endsection