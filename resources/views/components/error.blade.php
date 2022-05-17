<div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <h2 style='color: red'>This errors has occured:</h2>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
