@props(['messages'])
@foreach($messages as $message)
    <div class="flash-message flash-alert">
        <p>{{ $message }}</p>
    </div>
@endforeach
