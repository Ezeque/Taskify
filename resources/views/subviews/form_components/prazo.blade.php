<div>
    <label for="prazo" class="fw-bold" style="color: #8332AC">Deadline:</label>
    <input @if (Route::currentRouteName() == 'Edit')value="{{ $task->prazo }}"@endif  
    type="date" name="prazo" id="prazo"class="form-control mb-3 w-100" autocomplete="off">
</div>