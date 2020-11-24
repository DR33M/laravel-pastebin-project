<div class="sidebar d-none d-lg-block">
    @if(!$userNotes->isEmpty())
        <div class="sidebar__title">
            <a href="{{ url('/user', \Illuminate\Support\Facades\Auth::user()->name) }}">{{ __('My Pastes') }}</a>
        </div>
        <ul class="sidebar__menu">
            @include('layout.sidebar_item', ['notes' => $userNotes])
        </ul>
    @endif

    @if(!$publicNotes->isEmpty())
        <div class="sidebar__title">
            <a href="{{ url('/archive') }}">{{ __('Public Pastes') }}</a>
        </div>
        <ul class="sidebar__menu">
            @include('layout.sidebar_item', ['notes' => $publicNotes])
        </ul>
    @endif
</div>

