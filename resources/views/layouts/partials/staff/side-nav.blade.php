@php
     $customer_not_approved = \App\Models\User::where('role','0')->where('verification', '0')->count();

     $pending_request = \App\Models\ServiceRequest::where('status','Pending')->count();
     $inprocess_request = \App\Models\ServiceRequest::where('status','Inprocess')->count();
      $unseen_message = \App\Models\ChMessage::where('from_id', '!=', '3')->where('seen','0')->count();
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
            <a href="{{route('customers.add_customer')}}" class="side-menu {{(!request()->routeIs('customers.add_customer'))?'bg-theme-1':'bg-blue-500'}}">
                <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                <div class="side-menu__title"> Customers </div>
                @if($customer_not_approved > 0)
                    <span class="badge right" style="background-color:yellow; padding:3px 10px; border-radius:10%; margin-right:10px;    color:black;" title="Not Approved Customer">{{$customer_not_approved}}</span>
                @endif
            </a>
        </li>
        <li>
            <a href="{{route('workorder.index')}}" class="side-menu {{(!request()->routeIs('workorder.index'))?'bg-theme-1':'bg-blue-500'}}">
                <div class="side-menu__icon"> <i data-feather="calendar"></i> </div>
                <div class="side-menu__title"> Work Order </div>

                @if($inprocess_request > 0)
                  <span class="badge right" style="background-color:yellow; padding:3px 10px; border-radius:10%; margin-right:10px;    color:black;" title="Not Approved Customer">{{$inprocess_request}}</span>
                @endif
            </a>
        </li>
        <li>
            <a href="{{route('workorder.request.pending')}}" class="side-menu {{(!request()->routeIs('workorder.request.pending'))?'bg-theme-1':'bg-blue-500'}}">
                <div class="side-menu__icon"> <i data-feather="align-left"></i> </div>
                <div class="side-menu__title"> Requests </div>

                @if($pending_request > 0)
                   <span class="badge right" style="background-color:yellow; padding:3px 10px; border-radius:10%; margin-right:10px;    color:black;" title="Not Approved Customer">{{$pending_request}}</span>
                 @endif
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
