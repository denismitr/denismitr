@extends('layouts.admin')

@section('content')
    <section>
        <div class="card">
            <form action="{{ route('admin.topics.store') }}" method="POST" class="card-content">
                <p class="title">Create a topic</p>

                @include('admin._notification')

                @csrf

                <div class="field">
                    <label class="label">Name</label>
                    <div class="control has-icons-right">
                        <input class="input{{  $errors->first('name') ? ' is-danger' : '' }}" name="name" type="text" value="{{ old('name') }}">
                        @if($errors->has('name'))
                            <p class="icon is-small is-right">
                                <i class="fas fa-exclamation-triangle"></i>
                            </p>
                        @endif
                    </div>
                    @if($errors->has('name'))
                        <p class="help is-danger">{{ $errors->first('name') }}</p>
                    @endif
                </div>

                <br>

                <div>
                    <button type="submit" class="button is-primary">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </section>
    <section class="section">
        @foreach($topics as $topic)
            <article class="media">
                <div class="media-content">
                    <div class="content">
                        <p><strong>{{ $topic->name }}</strong></p>
                        <p>{{ $topic->slug }}</p>
                    </div>
                    <nav class="level is-media">
                        <a class="button is-warning" href="{{ route('admin.topics.edit', $topic->slug) }}">Edit</a>
                        <a class="button is-danger" href="{{ route('admin.topics.confirm', $topic->slug) }}">Delete</a>
                    </nav>
                </div>
            </article>
        @endforeach
        <br><br>
        {{  $topics->links('admin.pagination.bulma') }}
    </section>
@endsection