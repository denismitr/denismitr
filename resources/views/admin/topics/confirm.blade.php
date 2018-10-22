@extends('layouts.admin')

@section('content')
    <section>
        <article class="message is-large is-danger">
            <div class="message-header">
                <p>Delete topic</p>
            </div>
            <div class="message-body">
                Topic <strong>{{ $topic->name }}</strong> is about to be deleted. Confirm?
                <br><br>
                <form action="{{ route('admin.topics.delete', $topic->getRouteKey()) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="button is-danger" type="submit">Confirm and delete</button>
                    <a class="button is-success" href="{{ route('admin.topics.index') }}">Cancel</a>
                </form>
            </div>
        </article>
    </section>
@endsection