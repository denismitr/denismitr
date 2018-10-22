@isset($post)
    <input type="hidden" name="_id" value="{{ $post->id }}">
@endisset

<div class="field">
    <label class="label">Name</label>
    <div class="control has-icons-right">
        <input class="input{{  $errors->first('name') ? ' is-danger' : '' }}" name="name" type="text" value="{{ old('name', $post->name ?? null) }}">
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
    <label class="label">Slug</label>
    <div class="control has-icons-right">
        <input class="input{{  $errors->first('slug') ? ' is-danger' : '' }}" name="slug" type="text" value="{{ old('slug', $post->slug ?? null) }}">
        @if($errors->has('slug'))
            <p class="icon is-small is-right">
                <i class="fas fa-exclamation-triangle"></i>
            </p>
        @endif
    </div>
    @if($errors->has('slug'))
        <p class="help is-danger">{{ $errors->first('slug') }}</p>
    @endif
</div>

<div>
    <label class="label">Post body</label>
    <input id="body" value="{{ old('body', $post->body ?? null) }}" type="hidden" name="body">
    @if($errors->has('body'))
        <p class="help is-danger">{{ $errors->first('body') }}</p>
    @endif
</div>

<div class="field">
    <label class="label">Language</label>
    <div class="control has-icons-right">
        <div class="select{{  $errors->first('lang') ? ' is-danger' : '' }}">
            <select name="lang">
                <option value="ru" {{ old('lang', $post->lang ?? null) === 'ru' ? 'selected' : null }}>RU</option>
                <option value="en" {{ old('lang', $post->lang ?? null) === 'en' ? 'selected' : null }}>EN</option>
            </select>
        </div>
        @if($errors->has('lang'))
            <p class="icon is-small is-right">
                <i class="fas fa-exclamation-triangle"></i>
            </p>
        @endif
    </div>
    @if($errors->has('lang'))
        <p class="help is-danger">{{ $errors->first('lang') }}</p>
    @endif
</div>
<br>
<div class="field">
    <label class="label">Part</label>
    <div class="control has-icons-right">
        <input class="input{{  $errors->first('part') ? ' is-danger' : '' }}" name="part" type="number" value="{{ old('part', $post->part ?? 1) }}">
        @if($errors->has('part'))
            <p class="icon is-small is-right">
                <i class="fas fa-exclamation-triangle"></i>
            </p>
        @endif
    </div>
    @if($errors->has('part'))
        <p class="help is-danger">{{ $errors->first('part') }}</p>
    @endif
</div>

<div class="field">
    <label class="label">Parent</label>
    <div class="control has-icons-right">
        <div class="select{{  $errors->first('parent_id') ? ' is-danger' : '' }}">
            <select name="parent_id">
                <option value="">No parent post</option>
                @foreach($posts as $parentPost)
                    <option value="{{ $parentPost->id }}" {{ old('parent_id', $post->parent_id ?? null) === $parentPost->id ? 'selected' : null }}>{{ $parentPost->name }}</option>
                @endforeach
            </select>
        </div>
        @if($errors->has('parent_id'))
            <p class="icon is-small is-right">
                <i class="fas fa-exclamation-triangle"></i>
            </p>
        @endif
    </div>
    @if($errors->has('parent_id'))
        <p class="help is-danger">{{ $errors->first('parent_id') }}</p>
    @endif
</div>
<br><br>

<div class="field">
    <label class="label">Post topics</label>
    <div class="control has-icons-right">
        <div class="select is-block is-multiple{{ $errors->first('parent_id') ? ' is-danger' : '' }}">
            <select multiple size="10" name="topics[]">
                @foreach($topics as $topic)
                    <option
                            value="{{ $topic->id }}"
                            {{ in_array($topic->id, old('topics', $post->topic_ids ?? [])) ? 'selected' : null }}
                    >{{ $topic->name }}</option>
                @endforeach
            </select>
        </div>
        @if($errors->has('parent_id'))
            <p class="icon is-small is-right">
                <i class="fas fa-exclamation-triangle"></i>
            </p>
        @endif
    </div>
    @if($errors->has('parent_id'))
        <p class="help is-danger">{{ $errors->first('parent_id') }}</p>
    @endif
</div>
