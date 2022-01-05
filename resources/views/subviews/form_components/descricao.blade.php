<label for="descricao" class="fw-bold" style="color: #8332AC">Description:</label>
<textarea name="descricao" id="descricao" rows="5" style="display:block; resize:none"
    class="text-dark px-2 border-0 w-100">@if (Route::currentRouteName() == 'Edit'){{ $task->descricao }}@endif 
</textarea>
