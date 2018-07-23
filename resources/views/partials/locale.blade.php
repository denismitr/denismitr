<span class="dropdown">
    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="locale" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ app()->getLocale() }}
    </button>
    <span class="dropdown-menu" aria-labelledby="locale">
        <form action="{{ route('locale.change.russian') }}" method="POST">
            @csrf
            <button class="dropdown-item" type="submit">ru</button>
        </form>
        <form action="{{ route('locale.change.english') }}" method="POST">
            @csrf
            <button class="dropdown-item" type="submit">en</button>
        </form>
    </span>
</span>