@extends('layouts.guest')
@section('title')
Login | SRMS
@endsection
@section('content')
<style>
    table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #000;
    }

    th, td {
        border: 1px solid #000;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
    .NotFound{

        border: 1px solid white;
    }
</style>
<form  action="{{ route('account.search') }}"  method="GET">
    @csrf
    <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-0 xl:my-0">
        <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
            <img alt="" class="-intro-x w-30 mx-auto" src="{{asset('img/logo.png')}}">
            <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-center">
                Search Account
            </h2>

            <div class="flex">
            <x-validation-errors class="intro-x mt-4 mx-auto" />
                @if (session('status'))
                    <div class="mb-4 font-medium text-lg text-green-700">
                        {{ session('status') }}
                    </div>
                @endif

                @if (session('error_message'))
                    <div class="mb-4 font-medium text-lg text-red-700">
                        {{ session('error_message') }}
                    </div>
                @endif
            </div>


            <div class="intro-x mt-8 flex">
                <input type="text" class="intro-x login__input input input--lg border border-gray-300 block" name="account_no" placeholder="Search Account Number">
                {{-- <button type="submit" class="button button--xl text-white bg-theme-1 w-32 mt-1 ml-2">Search</button> --}}

            </div>

            <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left" style="display: flex; justify-content: space-between;">
                <a href="{{route('login')}}" class="button button--lg w-32 text-white bg-theme-9 xl:mr-3">Login</a>
                <button type="submit" class="button button--lg w-32 text-white bg-theme-1 xl:mr-3">Submit Search</button>

            </div>




            <div class="intro-x mt-8">
                <table>
                    <thead>
                        <tr>
                            @if (request()->filled('account_no') && count($accounts) > 0)
                                <th>Account Number</th>
                                <th>Account Name</th>
                                <th>Login Approval</th>
                            @elseif (request()->filled('account_no') && count($accounts) === 0)


                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @if (request()->filled('account_no') && count($accounts) > 0)
                            @foreach ($accounts as $account)
                                <tr>
                                    <td>{{ $account->account_no }}</td>
                                    <td>{{ $account->name }}</td>

                                    @if($account->verification == '1')
                                       <td><p  style="color: green;">Approved</p></td>
                                    @elseif($account->verification == '0')
                                        <td><p style="color: red;">Not Approved</p></td>
                                    @endif
                                </tr>
                            @endforeach
                        @elseif (request()->filled('account_no') && count($accounts) === 0)
                            <tr>
                                <td  class="NotFound" ><p style="color: red; text-align:center;">No Account Found.</p></td>
                            </tr>
                        @endif

                    </tbody>
                </table>

            </div>

            {{-- <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                <a href="{{route('register')}}" class="button button--lg w-full xl:w-32 text-white bg-theme-9 xl:mr-3 align-top w-100 float-left">Register</a>
                <button class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3 align-top w-100 float-right">Login</button>

            </div> --}}




        </div>
    </div>
</form>


@endsection
