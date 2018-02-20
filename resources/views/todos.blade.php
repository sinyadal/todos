 @extends('layouts.app') @section('content')

<div class="uk-section uk-section-default" uk-height-viewport="offset-top: true">
    <div class="uk-container uk-container-small uk-position-relative">

        <button class="uk-button uk-button-default uk-float-right uk-margin-remove-adjacent" type="button" uk-toggle="target: #create-todo; cls: uk-section-overlap">
            <span uk-icon="plus"></span>
        </button>

        <h1 class="uk-margin-medium">To-dos</h1>

        <div class="uk-grid-match uk-child-width-1-3@m" uk-grid>

            @foreach($todos as $todo)
            <div>
                <div class="uk-card uk-card-primary uk-card-small">
                    <div class="uk-card-header">
                        <div class="uk-float-left">
                            @if(!$todo->status)
                            <a href="{{ route('todo.status', $todo->id) }}" uk-icon="icon: check" class="uk-icon-link"></a>
                            @else
                            <a href="{{ route('todo.status', $todo->id) }}">
                                <span class="uk-badge">Completed</span>
                            </a>
                            @endif
                        </div>
                        <div class="uk-float-right">
                            <a href="" class="uk-icon-link" uk-icon="icon: pencil" uk-toggle="target: #update-todo-{{ $todo->id }};"></a>
                            <button type="submit" class="uk-icon-link" uk-icon="trash" onclick="event.preventDefault();document.getElementById('delete-todo-form-{{ $todo->id }}').submit();"></button>
                            <form id="delete-todo-form-{{ $todo->id }}" method="POST" action="{{ route('todo.destroy', $todo->id) }}">
                                @csrf {{ method_field('DELETE') }}
                            </form>
                        </div>
                    </div>
                    <div class="uk-card-body">
                        <p>{{ $todo->list }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- This is the modal -->

<div id="create-todo" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <h2 class="uk-modal-title">Create New Todos</h2>
        <div class="uk-margin">
            <form id="create-todo-form" action="{{ route('todo.create') }}" method="POST">
                @csrf
                <input class="uk-input" type="text" name="list" autofocus>
            </form>
        </div>
        <p class="uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary" type="submit" onclick="event.preventDefault();
            document.getElementById('create-todo-form').submit();">Save</button>
        </p>
    </div>
</div>

@foreach($todos as $todo)
<div id="update-todo-{{ $todo->id }}" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <h2 class="uk-modal-title">Update Todos</h2>
        <div class="uk-margin">
            <form id="update-todo-form-{{ $todo->list }}" action="{{ route('todo.update', $todo->id) }}" method="POST">
                @csrf {{ method_field('PATCH') }}
                <input class="uk-input" type="text" name="list" value="{{ $todo->list }}" autofocus>
            </form>
        </div>
        <p class="uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary" type="submit" onclick="event.preventDefault();
                document.getElementById('update-todo-form-{{ $todo->list }}').submit();">Save</button>
        </p>
    </div>
</div>
@endforeach

<script>
    @if(Session::has('success'))
        UIkit.notification("<span uk-icon='icon: check'></span> {{ Session::get('success') }}");
    @endif
</script>

@endsection