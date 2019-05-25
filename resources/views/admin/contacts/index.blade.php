@extends('layouts.admin')

@section('content')
    <section>
        <h2 class="title is-2">Contact messages</h2>
        @include('admin._notification')
    </section>
    <section class="section">
        @foreach($contacts as $contact)
            <article class="media">
                <div class="media-content">
                    <div class="content">
                        <p><strong>{{ $contact->name }}</strong></p>
                        <p>{{ $contact->email }}</p>
                        <p>
                            Status: {{ $contact->status }}
                            @if($contact->isPending())
                                <span class="tag is-primary">Pending</span>
                            @elseif($contact->isSending())
                                <span class="tag is-warning">Sending</span>
                            @elseif($contact->isSent())
                                <span class="tag is-success">Sent</span>
                            @elseif($contact->isArchived())
                                <span class="tag is-success">Archived</span>
                            @elseif($contact->isProcessed())
                                <span class="tag is-success">Processed</span>
                            @endif
                        </p>
                        <p>
                            {{ $contact->created_at->toDateString() }}
                        </p>
                    </div>
                    <nav class="level is-media">
                        <a class="button is-success" href="{{ route('admin.contacts.show', $contact->getRouteKey()) }}">Show</a>
                        <a class="button is-danger" href="{{ route('admin.contacts.confirm', $contact->getRouteKey()) }}">Delete</a>
                    </nav>
                </div>
            </article>
        @endforeach
        <br><br>
        {{  $contacts->links('admin.pagination.bulma') }}
    </section>
@endsection