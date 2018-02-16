 @extends('layouts.app') @section('content')

    <div class="uk-card uk-card-default uk-card-body uk-width-1-2@m">
        @foreach($todos as $todo) 
            {{ $todo->list }}
            <br> 
        @endforeach
    </div>

@endsection