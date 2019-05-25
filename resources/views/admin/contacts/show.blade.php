@extends('layouts.admin')

@section('content')
    <section>
        @include('admin._notification')
    </section>
    <section>
        <div class="card">
            <div class="card-content">
                <div class="content is-large">
                    <h3>Status: {{ $contact->status }}</h3>
                    <h5 class="is-5">{{ $contact->email }}</h5>
                    <h5 class="is-5">{{ $contact->name }}</h5>
                    <p class="is-text">{{ $contact->body }}</p>

                    @if($contact->isSpam())
                        <h3 class="tag is-large is-danger">Is Spam!!!</h3>
                    @endif
                </div>
            </div>
            <div class="card-footer">
                <div class="card-footer-item">
                    <form action="{{ route('admin.contacts.spam', $contact->getRouteKey()) }}" method="POST">
                        @csrf
                        @method("PUT")
                        <button class="button is-warning">Mark as spam</button>
                    </form>
                </div>
                <div class="card-footer-item">
                    <form action="{{ route('admin.contacts.archive', $contact->getRouteKey()) }}" method="POST">
                        @csrf
                        @method("PUT")
                        <button class="button is-primary">Mark as archived</button>
                    </form>
                </div>
                <div class="card-footer-item">
                    <a class="button is-danger" href="{{ route('admin.contacts.confirm', $contact->getRouteKey()) }}">Delete</a>
                </div>
            </div>
        </div>
    </section>
@endsection