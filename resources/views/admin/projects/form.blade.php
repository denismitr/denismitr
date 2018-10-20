<form action="{{ route('admin.projects.store') }}" method="POST" class="card-content">
    <p class="title">Create a topic</p>

    @if(session()->has('topic.success'))
        <div class="notification is-success">
            {{ session()->get('topic.success') }}
        </div>
    @endif

    @csrf

    <div class="field">
        <label class="label">Name</label>
        <div class="control has-icons-right">
            <input class="input{{  $errors->first('name') ? ' is-danger' : '' }}" name="name" type="text" value="{{ old('name') }}">
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

    <br>

    <div>
        <button type="submit" class="button is-primary">
            Create
        </button>
    </div>
</form>