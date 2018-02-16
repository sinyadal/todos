 @extends('layouts.app') @section('content')

<div uk-height-viewport="expand: true">
    @foreach($todos as $todo) {{ $todo->list }}
    <br> @endforeach
</div>

@endsection