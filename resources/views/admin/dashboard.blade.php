@extends('layouts.admin')

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
@endsection

@section('content')
    <div class="card">
        <form action="{{ route('admin.business.update') }}" method="POST" class="card-content">
            @csrf
            @method('PUT')

            <p class="title">Business details</p>

            @if(session()->has('business.updated.success'))
                <div class="notification is-success">
                    {{ session()->get('business.updated.success') }}
                </div>
            @endif

            <div class="field">
                <label class="label">First name (ru)</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input{{  $errors->first('first_name_ru') ? ' is-danger' : '' }}" name="first_name_ru" type="text" value="{{ old('first_name_ru', $business->first_name_ru) }}">
                    <p class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                    </p>
                    @if($errors->has('first_name_ru'))
                        <p class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </p>
                    @endif
                </div>
                @if($errors->has('first_name_ru'))
                    <p class="help is-danger">{{ $errors->first('first_name_ru') }}</p>
                @endif
            </div>

            <div class="field">
                <label class="label">First name (ru)</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input{{  $errors->first('last_name_ru') ? ' is-danger' : '' }}" name="last_name_ru" type="text" value="{{ old('last_name_ru', $business->last_name_ru) }}">
                    <p class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                    </p>
                    @if($errors->has('last_name_ru'))
                        <p class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </p>
                    @endif
                </div>
                @if($errors->has('last_name_ru'))
                    <p class="help is-danger">{{ $errors->first('last_name_ru') }}</p>
                @endif
            </div>

            <div class="field">
                <label class="label">First name (en)</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input{{  $errors->first('first_name_en') ? ' is-danger' : '' }}" name="first_name_en" type="text" value="{{ old('first_name_en', $business->first_name_en) }}">
                    <p class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                    </p>
                    @if($errors->has('first_name_en'))
                        <p class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </p>
                    @endif
                </div>
                @if($errors->has('first_name_en'))
                    <p class="help is-danger">{{ $errors->first('first_name_en') }}</p>
                @endif
            </div>

            <div class="field">
                <label class="label">Last name (en)</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input{{  $errors->first('last_name_en') ? ' is-danger' : '' }}" name="last_name_en" type="text" value="{{ old('last_name_en', $business->last_name_en) }}">
                    <p class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                    </p>
                    @if($errors->has('last_name_en'))
                        <p class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </p>
                    @endif
                </div>
                @if($errors->has('last_name_en'))
                    <p class="help is-danger">{{ $errors->first('last_name_en') }}</p>
                @endif
            </div>

            <div class="field">
                <label class="label">Email</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input{{  $errors->first('email') ? ' is-danger' : '' }}" name="email" type="email" value="{{ old('email', $business->email) }}">
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
                <label class="label">Twitter</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input{{  $errors->first('twitter') ? ' is-danger' : '' }}" name="twitter" type="text" value="{{ old('twitter', $business->twitter) }}">
                    <p class="icon is-small is-left">
                        <i class="fab fa-twitter"></i>
                    </p>
                    @if($errors->has('twitter'))
                        <p class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </p>
                    @endif
                </div>
                @if($errors->has('twitter'))
                    <p class="help is-danger">{{ $errors->first('twitter') }}</p>
                @endif
            </div>

            <div class="field">
                <label class="label">Facebook</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input{{  $errors->first('facebook') ? ' is-danger' : '' }}" name="facebook" type="text" value="{{ old('facebook', $business->facebook) }}">
                    <p class="icon is-small is-left">
                        <i class="fab fa-facebook"></i>
                    </p>
                    @if($errors->has('facebook'))
                        <p class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </p>
                    @endif
                </div>
                @if($errors->has('facebook'))
                    <p class="help is-danger">{{ $errors->first('facebook') }}</p>
                @endif
            </div>

            <div class="field">
                <label class="label">About ru</label>
                <input id="about_ru" value="{{ old('about_ru', $business->about_ru ?? null) }}" type="hidden" name="about_ru">
                @if($errors->has('about_ru'))
                    <p class="help is-danger">{{ $errors->first('about_ru') }}</p>
                @endif
            </div>

            <div class="field">
                <label class="label">About ru</label>
                <input id="about_en" value="{{ old('about_en', $business->about_en ?? null) }}" type="hidden" name="about_en">
                @if($errors->has('about_en'))
                    <p class="help is-danger">{{ $errors->first('about_en') }}</p>
                @endif
            </div>

            <div>
                <button type="submit" class="button is-primary">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

    <script>
        const mdRu = new SimpleMDE({ element: document.getElementById("about_ru") });
        const mdEn = new SimpleMDE({ element: document.getElementById("about_en") });
    </script>
@endsection