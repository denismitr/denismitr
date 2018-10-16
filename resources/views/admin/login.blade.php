@extends('layouts.admin')

@section('content')
    <br><br>
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-half is-offset-one-quarter">
                    <div class="card">
                        <form action="{{ route('login') }}" class="card-content" method="POST">
                            @csrf

                            <div class="field">
                                <label class="label">Email</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input{{  $errors->first('email') ? ' is-danger' : '' }}" name="email" type="email" placeholder="Email" value="{{ old('email') }}">
                                    <p class="icon is-small is-left">
                                        <i class="fas fa-envelope"></i>
                                    </p>
                                    @if($errors->has('email'))
                                        <p class="icon is-small is-right">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </p>
                                    @endif
                                </div>
                                @if($errors->has('email'))
                                    <p class="help is-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>

                            <div class="field">
                                <label class="label" for="password">Password</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input id="password" name="password" class="input{{  $errors->first('password') ? ' is-danger' : '' }}" type="password">
                                    <p class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </p>
                                    @if($errors->has('password'))
                                        <p class="icon is-small is-right">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </p>
                                    @endif
                                </div>
                                @if($errors->has('password'))
                                    <p class="help is-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </div>

                            <div class="w-full mb-2">
                                <button type="submit" class="button is-primary">
                                    Войти
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection