<div class="field">
    @isset($project)
        <input type="hidden" name="_id" value="{{ $project->id }}">
    @endisset

    <label class="label">Name</label>
    <div class="control has-icons-right">
        <input class="input{{  $errors->first('name') ? ' is-danger' : '' }}" name="name" type="text" value="{{ old('name', $project->name ?? null) }}">
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

<div class="field">
    <label class="label">Description RU</label>
    <div class="control has-icons-right">
        <textarea
                class="textarea{{  $errors->first('description_ru') ? ' is-danger' : '' }}"
                name="description_ru" type="text"
        >{{ old('description_ru', $project->description_ru ?? null) }}</textarea>
        @if($errors->has('description_ru'))
            <p class="icon is-small is-right">
                <i class="fas fa-exclamation-triangle"></i>
            </p>
        @endif
    </div>
    @if($errors->has('description_ru'))
        <p class="help is-danger">{{ $errors->first('description_ru') }}</p>
    @endif
</div>

<div class="field">
    <label class="label">Description EN</label>
    <div class="control has-icons-right">
        <textarea
                class="textarea{{  $errors->first('description_en') ? ' is-danger' : '' }}"
                name="description_en" type="text"
        >{{ old('description_en', $project->description_en ?? null) }}</textarea>
        @if($errors->has('description_en'))
            <p class="icon is-small is-right">
                <i class="fas fa-exclamation-triangle"></i>
            </p>
        @endif
    </div>
    @if($errors->has('description_en'))
        <p class="help is-danger">{{ $errors->first('description_en') }}</p>
    @endif
</div>

<div class="field">
    <label class="label">URL</label>
    <div class="control has-icons-right">
        <input class="input{{  $errors->first('url') ? ' is-danger' : '' }}" name="url" type="url" value="{{ old('url', $project->url ?? null) }}">
        @if($errors->has('url'))
            <p class="icon is-small is-right">
                <i class="fas fa-exclamation-triangle"></i>
            </p>
        @endif
    </div>
    @if($errors->has('url'))
        <p class="help is-danger">{{ $errors->first('url') }}</p>
    @endif
</div>

<div class="field">
    <label class="label">Color</label>
    <div class="control has-icons-right">
        <input class="input{{  $errors->first('color') ? ' is-danger' : '' }}" name="color" type="color" value="{{ old('color', $project->color ?? null) }}">
        @if($errors->has('color'))
            <p class="icon is-small is-right">
                <i class="fas fa-exclamation-triangle"></i>
            </p>
        @endif
    </div>
    @if($errors->has('color'))
        <p class="help is-danger">{{ $errors->first('color') }}</p>
    @endif
</div>

<div class="field">
    <br>
    <label class="label">Picture</label>
    @isset($project)
        <small>Currently</small>
        <figure class="image is-128x128">
            <img src="{{ $project->getPicture() }}">
        </figure>
    @endisset
    <div class="control has-icons-right">
        <input class="input{{  $errors->first('picture') ? ' is-danger' : '' }}" name="picture" type="file" value="{{ old('picture', $project->picture ?? null) }}">
        @if($errors->has('picture'))
            <p class="icon is-small is-right">
                <i class="fas fa-exclamation-triangle"></i>
            </p>
        @endif
    </div>
    @if($errors->has('picture'))
        <p class="help is-danger">{{ $errors->first('picture') }}</p>
    @endif
</div>

<div class="field">
    <label class="label">Priority</label>
    <div class="control has-icons-right">
        <input class="input{{  $errors->first('priority') ? ' is-danger' : '' }}" name="priority" type="number" value="{{ old('priority', $project->priority ?? null) }}">
        @if($errors->has('priority'))
            <p class="icon is-small is-right">
                <i class="fas fa-exclamation-triangle"></i>
            </p>
        @endif
    </div>
    @if($errors->has('priority'))
        <p class="help is-danger">{{ $errors->first('priority') }}</p>
    @endif
</div>

<br><br>
<label class="checkbox">
    <input type="checkbox" name="publish" {{ old('publish', $post->published_at ?? null) ? 'checked' : null }}>
    Published
</label>
@if($errors->has('publish'))
    <p class="help is-danger">{{ $errors->first('publish') }}</p>
@endif
<br><br>