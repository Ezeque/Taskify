<div id="painel_principal" class="py-4 d-flex flex-column align-items-center">
    <nav class="w-100 d-flex justify-content-equal mb-5">
        <ul class="w-100 d-flex justify-content-around">@auth
                <li>
                    <a href="unfinished.html"><img class="nav_icon" src="images/icons/user_icon.png"><br>
                        <span class="roboto" style="color: #8332AC; font-weight: 900;">Profile</span>
                    </a>
                </li>
            @endauth

            <li>
                <a href="/Tasks"><img class="nav_icon" src="images/icons/taskify_icon.png"><br>
                    <span class="roboto" style="color: #8332AC; font-weight: 900;">Taskify</span>
                </a>
            </li>

            <li>
                <a href="unfinished.html"><img class="nav_icon" src="images/icons/rank_icon.png"><br>
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
        @endauth
    @endif
    {{-- LÓGICA TASKIFY --}}
    @if (Route::currentRouteName() == 'Taskify')
        @foreach ($request->user()->Tasks() as $Task)
            {{$Task->name}}
        @endforeach
        <div class="w-100 d-flex flex-column align-items-center border-dark border-top pt-2">
            <a href="/Task/Create"><h4 style="color: #8332AC">Click here to add a Task</h4></a>
        </div>
    @endif

</div>
