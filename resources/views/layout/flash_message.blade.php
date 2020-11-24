@if(session()->has('message', 'message_type'))
    <div class="alert alert-{{ session('message_type') }} mt-4">
        {{ session('message') }}
    </div>
@endif
