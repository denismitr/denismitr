@extends('layouts.admin')

@section('content')
<div class="container mx-auto">
    <div class="w-full flex justify-center items-center h-screen">
        <form action="{{ route('auth.login') }}" class="bg-white max-w-xs shadow-md p-8 mb-4" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-grey-darker text-sm font-bold mb-2">
                    Email
                </label>
                <input type="email" id="email" name="email" class="shadow appearance-none border rounded py-2 px-3 text-grey-darker leading-tight focus:shadow-outline focus:outline-none" placeholder="Email" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-grey-darker text-sm font-bold mb-2">
                    Пароль
                </label>
                <input type="password" id="password" name="password" class="shadow appearance-none border rounded py-2 px-3 text-grey-darker leading-tight focus:shadow-outline focus:outline-none" placeholder="Email" required>
            </div>

            <div class="w-full mb-2">
                <button type="submit" class="block w-full bg-teal hover:bg-teal-dark border-teal hover:border-teal-dark text-sm text-white py-1 px-2 border-4 rounded">
                    Войти
                </button>
            </div>
        </form>
    </div>
</div>
@endsection