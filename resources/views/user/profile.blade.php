@extends('layout.master')

@section('title', $user->name)

@section('content')
    <div class="user-view">
        <div class="details">
            <div class="user-icon">
                <img src="/{{ $user->avatar }}" alt="#">
            </div>
            <div class="info-bar">
                <div class="info-top">
                    <h1>{{ $user->name }}</h1>
                </div>
                <div class="info-bottom">
                    <div class="date">
                        <span class="date-text">{{ $user->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
            @if ($user->isOwner() && !$notes->isEmpty())
                <div class="search-box">
                    <form class="search-form" name="search" method="get" action="{{ route('search-self') }}">
                        <input class="search-input" type="text" name="q" size="5" value="" placeholder="search your own pastes...">
                    </form>
                </div>
            @endif
        </div>

        @if (isset($notes) && !$notes->isEmpty())
            <table class="maintable">
                <thead>
                <tr class="top">
                    <th scope="col"><a href="#">Name / Title</a></th>
                    <th scope="col"><a href="#">Added</a></th>
                    <th scope="col"><a href="#">Syntax</a></th>
                    <th scope="col" class="td_right">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                    @each('notes.notes_item', $notes, 'note')
                </tbody>
            </table>
        <div class="mt-3">
            {{ $notes->links("pagination::bootstrap-4") }}
        </div>
        @else
            <div class="page">
                <div class="content__text">
                    <div class="notice">
                        @if ($user->isOwner())
                            Your pastebin is empty.
                            <a href="/" style="color: #ff0000">Create your first paste</a>.
                        @else
                            {{ $user->name }} has no public pastes.
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
