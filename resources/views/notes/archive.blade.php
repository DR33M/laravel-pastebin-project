@extends('layout.master')

@section('title', 'Archive Notes')

@section('content')
<div class="page page-archive">
    <div class="content__title">Pastes Archive</div>
    <div class="content__text">
        <div class="notice">
            This page contains the most recently created 'public' pastes
            @isset($notesSyntax)
                with syntax '{{ $notesSyntax->name }}'
                [ <a href="/archive" style="color: #ff0000">show full archive</a> ]
            @endisset
        </div>
    </div>
    @if (!$notes->isEmpty())
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
    @endif
</div>
@endsection
