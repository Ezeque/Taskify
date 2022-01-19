<div id="painel_principal" class="py-4 d-flex flex-column align-items-center">
    <nav class="w-100 d-flex justify-content-equal mb-5">
        <ul class="w-100 d-flex justify-content-around">@auth
                <li>
                    <a href="/Profile"><img class="nav_icon" src="{{ url('/images/icons/user_icon.png') }}"><br>
                        <span class="roboto" style="color: #8332AC; font-weight: 900;">Profile</span>
                    </a>
                </li>
            @endauth

            <li>
                <a href="/Tasks"><img class="nav_icon" src="{{ url('/images/icons/taskify_icon.png') }}"><br>
                    <span class="roboto" style="color: #8332AC; font-weight: 900;">Taskify</span>
                </a>
            </li>

            <li>
                <a href="/Rank"><img class="nav_icon" src="{{ url('/images/icons/rank_icon.png') }}"><br>
                    <span class="roboto" style="color: #8332AC; font-weight: 900;">Rank</span>
                </a>
            </li>

        </ul>
    </nav>

    {{-- LÓGICA DASHBOARD --}}
    @if (Route::currentRouteName() == 'dashboard')
        @guest
            <h1 class="text-dark">Nothing to see here...</h3>
                <h4 class="text-dark"><a href="/login" style="color: #8332AC">Log-in</a> to have access to your
                    dashboard.
            </h1>
        @endguest
        @auth
            <div class="border border-dark" style="background-color:#551974; background-image: url({{ $request->user()->profile_photo_url }});
                   background-size: cover; background-position: center; border-radius: 50%; width:200px; height:200px;">
            </div>
            <h1 class="text-dark">
                Hello
                <span style="color: #8332AC">{{ $request->user()->name }}</span>,
                <em class="text-dark">The <span style="color: #8332AC">{{ $request->user()->title }}</em></span>
            </h1>
            <h4 class="text-dark">Ready to be productive today?</h4>
            <div class="d-flex justify-content-around w-100 mt-5">
                <div class="d-flex flex-column align-items-start" style="width:30%">
                    <h5 class="text-dark">You have a total of
                        <span style="color: #8332AC">{{ $tasks->count() }}
                        </span> pending tasks.
                    </h5>
                    <h5 class="text-dark">Your total rank position is
                        <span style="color: #8332AC">#{{ $request->user()->rank->position }}
                        </span>.
                    </h5>
                </div>
                <div class="d-flex flex-column align-items-start" style="width:30%">
                    <h5 class="text-dark">You are currently at level
                        <span style="color: #8332AC">{{ $request->user()->level }}
                        </span> !
                    </h5>
                    <h5 class="text-dark">Your total experience is
                        <span style="color: #8332AC">{{ $request->user()->xp }}
                        </span>.
                    </h5>
                </div>
            </div>
            @if (!$task == null)
            <div class="text-dark d-flex flex-column align-items-center mt-4 w-100">
                <em>
                    <h2 class="display-5 text-dark">Your most urgent task:</h2>
                </em>

                <a href="/Tasks/{{ $task->id }}"
                    class="w-75 border border-dark py-2 d-flex justify-content-around flex-column align-items-center">
                    <div class="d-flex flex-column align-items-center">
                        <h3 class="mb-3" style="color: #8332AC">{{ $task->nome }}</h3>
                        <div class="d-flex  justify-content-around">
                            <div class="fw-bold mb-2 w-25">
                                <span style="color: #8332AC">Deadline:</span>
                                <span class="text-dark" id="prazo{{ $task->id }}">{{ $task->prazo }}</span>
                            </div>
                            <div class="fw-bold w-50">
                                <span style="color: #8332AC">Description:</span>
                                <span class="text-dark">{{ $task->descricao }}</span>
                            </div>
                        </div>
                    </div>
                </a>

            </div>
            <script>
                data = '{{ $task->prazo }}'
                $('#prazo{{ $task->id }}').html(data.replace(/-/g, '/'))
            </script>
            @endif
            
        @endauth
    @endif

    {{-- LÓGICA TASKIFY --}}
    @if (Route::currentRouteName() == 'Taskify')
        @foreach ($tasks as $task)
            <a href="/Tasks/{{ $task->id }}"
                class="w-100 py-3 border-top border-dark PL-5 d-flex justify-content-around">
                <div style="color: #8332AC" class="fw-bold w-25">
                    <span class="text-dark">Name:</span> {{ $task->nome }}
                </div>
                <div class="fw-bold w-25">
                    <span class="text-dark">Deadline:</span> <span id="prazo{{ $task->id }}"
                        style="color: #8332AC">
                        {{ $task->prazo }}
                    </span>
                </div>
            </a>
            <script>
                data = '{{ $task->prazo }}'
                $('#prazo{{ $task->id }}').html(data.replace(/-/g, '/'))
            </script>
        @endforeach
        <div class="w-100 d-flex flex-column align-items-center justify-content-center border-dark border-top pt-2">
            <a href="/Tasks/Create">
                <h4 style="color: #8332AC" class="m-0">Click here to add a Task</h4>
            </a>
        </div>
    @endif

    {{-- LÓGICA CREATE --}}
    @if (Route::currentRouteName() == 'Create' || Route::currentRouteName() == 'Edit')
        <form class="d-flex w-100 justify-content-around" method="post">
            @csrf
            <div class="form-groups" style="width: 40%">

                {{-- NOME --}}
                @include('subviews.form_components.nome')

                {{-- DESCRIÇÃO --}}
                @include('subviews.form_components.descricao')
            </div>
            <div class="form-groups d-flex flex-column justify-content-between" style="width: 40%">

                {{-- PRAZO --}}
                @include('subviews.form_components.prazo')

                {{-- BOTÃO --}}
                @if (Route::currentRouteName() == 'Edit')
                    @include('subviews.form_components.botao', ['task' => $task])
                    @else
                    @include('subviews.form_components.botao')
                @endif
                
            </div>
        </form>
    @endif

</div>
