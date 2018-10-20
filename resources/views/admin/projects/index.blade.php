@extends('layouts.admin')

@section('content')
    <section>
        <h2 class="h2">Projects</h2>
    </section>
    <section class="section">
        @foreach($projects as $project)
            <article class="media">
                <div class="media-content">
                    <div class="content">
                        <p><strong>{{ $project->name }}</strong></p>
                        <p>{{ $project->url }}</p>
                    </div>
                    <nav class="level is-media">
                        <a class="button is-warning" href="{{ route('admin.projects.edit', $project->getRouteKey()) }}">Edit</a>
                        <a class="button is-danger" href="{{ route('admin.projects.confirm', $project->getRouteKey()) }}">Delete</a>
                    </nav>
                </div>
            </article>
        @endforeach
        <br><br>
        {{  $projects->links('admin.pagination.bulma') }}
    </section>
@endsection