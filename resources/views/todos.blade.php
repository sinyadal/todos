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
                            <a href="" uk-icon="icon: check"></a>
                        </div>
                        <div class="uk-float-right">
                            <a href="" uk-icon="icon: pencil"></a>
                            <a href="" uk-icon="icon: trash" uk-toggle="target: #delete-todo-{{ $todo->id }};"></a>
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
            <form id="create-todo-form" action="{{ route('todo.create') }}" method="post">
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
<div id="delete-todo-{{ $todo->id }}" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <h2 class="uk-modal-title">Confirm Deletion?</h2>
        <div class="uk-margin">
            <p>Are you sure to delete "{{ $todo->list }}"?</p>
        </div>
        <p class="uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary" type="button">Delete</button>
        </p>
    </div>
</div>
@endforeach @endsection