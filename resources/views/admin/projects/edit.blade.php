@extends('layouts.admin')

@section('content')
    <section>
        <div class="card">
            <form action="{{ route('admin.projects.update', $project->getRouteKey()) }}" method="POST" enctype="multipart/form-data" class="card-content">
                <p class="title">Edit project</p>

                @if(session()->has('project.success'))
                    <div class="notification is-success">
                        {{ session()->get('project.success') }}
                    </div>
                @endif

                @csrf
                @method('PUT')

                @include('admin.projects._form')

                <br>

                <div>
                    <button type="submit" class="button is-primary">
                        Update
                    </button>
                    <a href="{{ route('admin.projects.index') }}" class="button is-danger">
                        Back
                    </a>
                </div>
            </form>
        </div>
    </section>
@endsection