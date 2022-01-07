@if (Route::currentRouteName() == 'Create')
    <button class="btn text-light w-100" style="background:#8332AC">
        Submit
    </button>
@endif

@if (Route::currentRouteName() == 'Edit')
    <div class="d-flex flex-column justify-content-between">
            <button formaction="/complete" type="submit" class="btn text-light w-100" style="background:#8332AC">Complete!</button>
        <a class="mb-1" href="delete"><button class="btn btn-danger text-light w-100">
                Delete
            </button></a>
        <button type="button" class="btn text-light w-100 btn-primary">
            Edit
        </button>
    </div>
@endif
