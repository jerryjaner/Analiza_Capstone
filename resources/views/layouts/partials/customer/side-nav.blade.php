@php
  $unseen_message = \App\Models\ChMessage::where('from_id', '3')
                                         ->where('to_id', Auth::user()->id)
                                         ->where('seen', '0')
                                         ->count();
@endphp
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
            <a href="{{route('request.request_form')}}" class="side-menu {{(!request()->routeIs('request.request_form'))?'bg-theme-1':'bg-blue-500'}}">
                <div class="side-menu__icon"> <i data-feather="calendar"></i> </div>
                <div class="side-menu__title"> Submit Request </div>
            </a>
        </li>
        <li>
            <a href="{{route('request.service_status')}}" class="side-menu {{(!request()->routeIs('request.service_status'))?'bg-theme-1':'bg-blue-500'}}">
                <div class="side-menu__icon"> <i data-feather="align-left"></i> </div>
                <div class="side-menu__title"> Service Status </div>
            </a>
        </li>
        <li>
            <a href="{{route('request.request_log')}}" class="side-menu {{(!request()->routeIs('request.request_log'))?'bg-theme-1':'bg-blue-500'}}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Request Log </div>
            </a>
        </li>
        <li>
            <a href="/chatify/3" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="message-circle"></i> </div>
                <div class="side-menu__title"> Message </div>

                @if($unseen_message > 0)
                    <span class="badge right" style="background-color:yellow; padding:3px 10px; border-radius:10%; margin-right:10px;    color:black;" title="Unseen Message">{{$unseen_message}}</span>
                @endif
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
