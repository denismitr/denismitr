@extends('layouts.admin')

@section('content')
    <section>
        <div class="card">
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="card-content">
                <p class="title">Create project</p>

                @include('admin._notification')

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