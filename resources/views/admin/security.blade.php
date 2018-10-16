@extends('layouts.admin')

@section('content')
    <div class="card">
        <form action="{{ route('admin.security.update') }}" method="POST" class="card-content">
            @csrf
            @method('PUT')

            <p class="title">Security details</p>

            @if(session()->has('security.updated.success'))
                <div class="notification is-success">
                    {{ session()->get('security.updated.success') }}
                </div>
            @endif



            <div class="field">
                <label class="label">Old password</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input{{  $errors->first('old_password') ? ' is-danger' : '' }}" name="old_password" type="password">
                    <p class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </p>
                    @if($errors->has('old_password'))
                        <p class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </p>
                    @endif
                </div>
                @if($errors->has('old_password'))
                    <p class="help is-danger">{{ $errors->first('old_password') }}</p>
                @endif
            </div>

            <div class="field">
                <label class="label">New password (optional)</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input{{  $errors->first('new_password') ? ' is-danger' : '' }}" name="new_password" type="text" value="{{ old('new_password') }}">
                    <p class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </p>
                    @if($errors->has('new_password'))
                        <p class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </p>
                    @endif
                </div>
                @if($errors->has('new_password'))
                    <p class="help is-danger">{{ $errors->first('new_password') }}</p>
                @endif
            </div>

            <div class="field">
                <label class="label">Password confirmation (required with new password)</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input{{  $errors->first('new_password_confirmation') ? ' is-danger' : '' }}" name="new_password_confirmation" type="text" value="{{ old('new_password_confirmation') }}">
                    <p class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </p>
                    @if($errors->has('new_password_confirmation'))
                        <p class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </p>
                    @endif
                </div>
                @if($errors->has('new_password_confirmation'))
                    <p class="help is-danger">{{ $errors->first('new_password_confirmation') }}</p>
                @endif
            </div>

            <div class="field">
                <label class="label">Email</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input{{  $errors->first('email') ? ' is-danger' : '' }}" name="email" type="email" value="{{ old('email', $user->email) }}">
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

            <br><br>

            <div class="field">
                Auth groups:
            </div>

            <div>
                <ul>
                    @foreach($groups as $group)
                        <li><span class="tag is-info">{{ $group->name }}</span></li>
                    @endforeach
                </ul>
            </div>

            <br><br>

            <div>
                <button type="submit" class="button is-primary">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection