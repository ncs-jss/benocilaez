@if (session('msg'))
    <div class="alert {{ session('class') }}">
        {{ session('msg') }}
    </div>
@endif