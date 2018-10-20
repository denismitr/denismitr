@extends('layouts.admin')

@section('content')
    <section>
        <div class="card">
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="card-content">
                <p class="title">Create project</p>

                @if(session()->has('project.success'))
                    <div class="notification is-success">
                        {{ session()->get('project.success') }}
                    </div>
                @endif

                @csrf

                @include('admin.projects._form')

                <br>

                <div>
                    <button type="submit" class="button is-primary">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection