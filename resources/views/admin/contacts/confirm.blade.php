@extends('layouts.admin')

@section('content')
    <section>
        <article class="message is-large is-danger">
            <div class="message-header">
                <p>Delete contact message</p>
            </div>
            <div class="message-body">
                Contact <strong>{{ $contact->name }}</strong> is about to be deleted. Confirm?
                <br><br>
                <form action="{{ route('admin.contacts.destroy', $contact->getRouteKey()) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="button is-danger" type="submit">Confirm and delete</button>
                    <a class="button is-success" href="{{ route('admin.contacts.index') }}">Cancel</a>
                </form>
            </div>
        </article>
    </section>
@endsection