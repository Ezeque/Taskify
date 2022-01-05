@if (Route::currentRouteName() == 'Create')
    <button class="btn text-light w-100" style="background:#8332AC">
        Submit
    </button>
@endif

@if (Route::currentRouteName() == 'Edit')
    <div>
        <a href="delete"><button class="btn btn-danger text-light w-100">
            Delete
        </button></a>
        <button class="btn text-light w-100" style="background:#8332AC">
            Edit
        </button>
    </div>
@endif
