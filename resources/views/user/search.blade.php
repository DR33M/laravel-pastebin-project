@extends('layout.master')

@section('title', 'Searching your own pastes for: ' . $keyword ?? '')

@section('content')
    <div class="page">
        <div class="content__title -search">
            <span class="search__container">
                <form class="search-form" name="search" method="get" action="{{ route('search-self') }}">
                    <input class="search__input-self" type="text" name="q" size="5" value="" placeholder="search your own pastes...">
                </form>
            </span>
            Your pastes matching keyword: <u>{{ $keyword ?? '' }}</u>
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
                            There are no pastes matching your query.
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
