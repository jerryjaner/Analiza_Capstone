<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img class="w-12" src="{{asset('img/logo.png')}}" style="border-radius:30px;">
        <span class="hidden xl:block text-white text-lg ml-3">SRMS</span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="{{url('home')}}" class="side-menu {{(!request()->routeIs('home'))?'bg-theme-1':'bg-blue-500'}}">
                <div class="side-menu__icon"> <i data-feather="user"></i> </div>
                <div class="side-menu__title"> Profile </div>
            </a>
        </li>
        <li>
            <a href="{{route('workorder.index')}}" class="side-menu {{(!request()->routeIs('workorder.index'))?'bg-theme-1':'bg-blue-500'}}">
                <div class="side-menu__icon"> <i data-feather="calendar"></i> </div>
                <div class="side-menu__title"> Work Order </div>
            </a>
        </li>
        <li>
            <a href="{{route('workorder.request.pending')}}" class="side-menu {{(!request()->routeIs('workorder.request.pending'))?'bg-theme-1':'bg-blue-500'}}">
                <div class="side-menu__icon"> <i data-feather="align-left"></i> </div>
                <div class="side-menu__title"> Requests </div>
            </a>
        </li>
        <li>
            <a href="{{route('asset.index')}}" class="side-menu {{(!request()->routeIs('asset.index'))?'bg-theme-1':'bg-blue-500'}}">
                <div class="side-menu__icon"> <i data-feather="database"></i> </div>
                <div class="side-menu__title"> Assets </div>
            </a>
        </li>
        <li>
            <a href="/chatify" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="message-circle"></i> </div>
                <div class="side-menu__title"> Messages </div>
            </a>
        </li>
        <li>
            <a href="{{route('profile.show_changepw')}}" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="key"></i> </div>
                <div class="side-menu__title"> Change Password </div>
            </a>
        </li>
        <li>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="#" onclick="event.preventDefault();this.closest('form').submit();" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="log-out"></i> </div>
                <div class="side-menu__title"> Logout</div>
            </a>
        </form>
        </li>
    </ul>
</nav>