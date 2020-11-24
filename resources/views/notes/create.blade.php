@extends('layout.master')

@section('title', 'Create Note')

@section('content')
    <form action="{{ route('create-note') }}" method="POST">
        @csrf

        <div class="content__title">
            New Paste
        </div>
        <div class="form-group field-postform-text required">
            <textarea id="postform-text" class="textarea @error('body') is-invalid @enderror" name="body"  style="overflow: hidden; overflow-wrap: break-word; min-height: 300px;">{{ $note->body ?? old('body') }}</textarea>
            @error('body')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="content__title">
            Optional Paste Settings
        </div>
        <div class="post-form__bottom">
            <div class="post-form__left">
                <div class="form-group field-postform-format d-flex">
                    <label class="control-label col-sm-3" for="postform-format">Syntax Highlighting:</label>
                    <div class="col-sm-9 field-wrapper">
                        <select id="postform-format" class="postform-format form-control @error('syntax_id') is-invalid @enderror" name="syntax_id">
                            @foreach($syntax as $item)
                                <option value="{{ $item->id }}" {{ isset($note) ? ($note->status_id == $item->id ? 'selected' : '') : '' }}>{{ ucfirst($item->name) }}</option>
                            @endforeach
                        </select>
                        @error('syntax_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group field-postform-status d-flex">
                    <label class="control-label col-sm-3" for="postform-status">Paste Exposure:</label>
                    <div class="col-sm-9 field-wrapper">
                        <select id="postform-status" class="postform-status form-control @error('status_id') is-invalid @enderror" name="status_id">
                            @foreach($status as $item)
                                <option value="{{ $item->id }}" {{ isset($note) ? ($note->status_id == $item->id ? 'selected' : '') : '' }}>{{ ucfirst($item->name) }}</option>
                            @endforeach
                        </select>
                        @error('status_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group field-postform-name d-flex">
                    <label class="control-label col-sm-3" for="postform-name">Paste Name / Title:</label>
                    <div class="col-sm-9 field-wrapper">
                        <input type="text" id="postform-name" class="postform-name form-control @error('title') is-invalid @enderror" name="title" value="{{ $note->title ?? old('title') }}" maxlength="255">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group form-btn-container d-flex">
                    <button type="submit" class="btn -big">Create New Paste</button>
                </div>
            </div>
        </div>
    </form>
@endsection
