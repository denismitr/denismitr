@if(session()->has('success') || session()->has('error'))
    <br><br>
    <div class="notification {{ session()->has('success') ? 'is-success' : 'is-danger' }}">
        {{ session()->get('success') }}
        {{ session()->get('error') }}
    </div>
@endif