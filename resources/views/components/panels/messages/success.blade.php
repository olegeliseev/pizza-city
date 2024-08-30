@props(['messages'])
@foreach($messages as $message)
    <div class="flash-message flash-success">
        <p>{{ $message }}</p>
    </div>
@endforeach
