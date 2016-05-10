@if (session('msg'))
    <div class="alert alert-info">
        <i class="icon-hand-right"></i>

        {{ session('msg') }}
        <button class="close" data-dismiss="alert">
            <i class="icon-remove"></i>
        </button>
    </div>
@endif

@if (count($errors) > 0)
    <div class="alert alert-info">
        <i class="icon-hand-right"></i>
            @foreach ($errors->all() as $error)
               {{ $error }}
            @endforeach
        <button class="close" data-dismiss="alert">
            <i class="icon-remove"></i>
        </button>
    </div>

@endif