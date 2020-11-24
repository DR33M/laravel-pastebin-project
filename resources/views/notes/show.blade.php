@extends('layout.master')

@section('title', 'View Note')

@section('content')
<div class="post-view">
    <div class="details">
        <div class="user-icon">
            <img src="/{{ $note->owner->avatar }}">
        </div>
        <div class="info-bar">
            <div class="info-top">
                <span class="{{ strtolower($note->status->name) }}" title="Unlisted paste, only people with this link can see this paste."></span>
                <h1>{{ $note->title }}</h1>
            </div>
            <div class="info-bottom">
                <div class="username">
                    <a href="/user/{{ $note->owner->name }}">{{ $note->owner->name }}</a>
                </div>
                <div class="date">
                    <span class="date-text" title="{{ $note->created_at }}">{{ $note->created_at }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="highlighted-code">
        <div class="top-buttons">
            <div class="left d-flex align-items-center">
                <a href="/archive/{{ $note->syntax->name }}" class="btn mr-1">{{ $note->syntax->name }}</a>
                <div class="file-size">{{ round(mb_strlen($note->body, '8bit') / 1024, 2) }} KB</div>
            </div>
            <div class="right d-flex align-items-center">
                <a href="/raw/{{ $note->token }}" class="btn">raw</a>
                <a href="/download/{{ $note->token }}" class="btn">download</a>
                <a href="/clone/{{ $note->token }}" class="btn">clone</a>
                <a href="/edit/{{ $note->token }}" class="btn">edit</a>
                <form method="POST" action="/delete/{{ $note->token }}">
                    @method('DELETE')
                    @csrf
                    <button class="btn" onclick="return confirm('Are you sure you want to permanently delete this paste? There is no undo!')">delete</button>
                </form>
            </div>
        </div>
        <div id="editor" class="editor">{{ $note->body }}</div>
    </div>
    <div class="content__title -no-border">RAW Paste Data</div>
    <textarea class="textarea" readonly>{{ $note->body }}</textarea>
</div>
@endsection

@push('scripts')
    <script src="{{ asset("/js/editor.js") }}"></script>
    <script>
        editor.session.setMode("ace/mode/{{ strtolower($note->syntax->mode_name) }}");
    </script>
@endpush
