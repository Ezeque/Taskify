@if (Route::currentRouteName() == 'Create')
    <button class="btn text-light w-100" style="background:#8332AC">
        Submit
    </button>
@endif

@if (Route::currentRouteName() == 'Edit')
    <div class="d-flex flex-column justify-content-between">
        <button formaction="/complete/{{$task->id}}" type="submit" class="btn text-light w-100"
            style="background:#8332AC">Complete!</button>
        <button formaction="/delete/{{$task->id}}" class="btn btn-danger text-light w-100">
            Delete
        </button>
        <button type="button" class="btn text-light w-100 btn-primary">
            Edit
        </button>
    </div>
@endif
