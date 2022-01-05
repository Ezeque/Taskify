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
            <h1 class="text-dark">Hello <span style="color: #8332AC">{{ $request->user()->name }}</span></h1>
            <h4 class="text-dark">Ready to be productive today?</h4>
            <div class="d-flex flex-column align-items-lg-start">
            <h5 class="text-dark">You have a total of 
                <span style="color: #8332AC">{{$request->user()->tasks()->count()}}
                </span> pending tasks.</h5>
            </div>
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
                    <span class="text-dark">Deadline:</span> <span id="prazo{{$task->id}}" style="color: #8332AC">
                        {{ $task->prazo }} 
                    </span>
                </div>
            </a>
            <script>
                data = '{{$task->prazo}}'
                $('#prazo{{$task->id}}').html(data.replace(/-/g,'/'))
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
                @include('subviews.form_components.botao')
            </div>
        </form>
    @endif

</div>
