@extends('layouts.admin')

@section('content')
    <section>
        <div class="card">
            <form action="{{ route('admin.topics.update', $topic->slug) }}" method="POST" class="card-content">
                <p class="title">Edit the topic</p>

                @include('admin._notification')

                @csrf
                @method('PUT')

                <input type="hidden" name="_id" value="{{ $topic->id }}">

                <div class="field">
                    <label class="label">Name</label>
                    <div class="control has-icons-right">
                        <input class="input{{  $errors->first('name') ? ' is-danger' : '' }}" name="name" type="text" value="{{ old('name', $topic->name) }}">
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

                <div class="field">
                    <label class="label">Slug</label>
                    <div class="control has-icons-right">
                        <input class="input{{  $errors->first('slug') ? ' is-danger' : '' }}" name="slug" type="text" value="{{ old('slug', $topic->slug) }}">
                        @if($errors->has('slug'))
                            <p class="icon is-small is-right">
                                <i class="fas fa-exclamation-triangle"></i>
                            </p>
                        @endif
                    </div>
                    @if($errors->has('slug'))
                        <p class="help is-danger">{{ $errors->first('slug') }}</p>
                    @endif
                </div>

                <br>

                <div>
                    <a href="{{ route('admin.topics.index') }}" class="button is-warning">Back</a>
                    <button type="submit" class="button is-primary">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection