<tr>
    <td>
        <span class="status -{{ strtolower($note->status->name) }}"></span>
        <a href="/{{ $note->token }}">{{ $note->title }}</a>
    </td>
    <td class="td_smaller">{{ $note->created_at->format('M jS, Y') }}</td>
    <td class="td_smaller">
        <a href="/archive/{{ $note->syntax->name }}">{{ $note->syntax->name }}</a>
    </td>
    <td class="td_right">
        @if($note->owner->isOwner())
            <div class="d-flex">
                <a href="/edit/{{ $note->token }}">
                    <span class="edit" title="Edit Paste"></span>
                </a>
                <form method="POST" action="/delete/{{ $note->token }}">
                    @method('DELETE')
                    @csrf
                    <button style="display: block; border: none; background: transparent; outline: none"
                            onclick="return confirm('Are you sure you want to permanently delete this paste? There is no undo!')">
                        <span class="delete" title="Delete Paste"></span>
                    </button>
                </form>
            </div>
        @else
            &nbsp;
        @endif
    </td>
</tr>
