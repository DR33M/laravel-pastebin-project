@for ($i = 0; $i < min(config('constants.max_notes_sidebar'), $notes->count()); $i++)
    <li class="sidebar__item -{{ strtolower($notes[$i]->status->name) }}">
        <a href="/{{ $notes[$i]->token }}">{{ $notes[$i]->title }}</a>
        <div class="details">{{ $notes[$i]->created_at->format('Y-m-d') }}</div>
    </li>
@endfor
