@extends('layouts.admin')

@section('content')
    <section>
        <article class="message is-large is-danger">
            <div class="message-header">
                <p>Delete project</p>
            </div>
            <div class="message-body">
                Project {{ $project->name }} is about to be deleted. Confirm?
                <br><br>
                <form action="{{ route('admin.projects.delete', $project->getRouteKey()) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="button is-danger" type="submit">Confirm and delete</button>
                    <a class="button is-success" href="{{ route('admin.projects.index') }}">Cancel</a>
                </form>
            </div>
        </article>
    </section>
@endsection