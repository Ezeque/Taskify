<label for="name" class="fw-bold" style="color: #8332AC">Task Name:</label>
<input @if (Route::currentRouteName() == 'Edit')value="{{ $task->nome }}"@endif type="text" name="name" id="name" class="form-control mb-3" autocomplete="off"
    class="text-dark">
