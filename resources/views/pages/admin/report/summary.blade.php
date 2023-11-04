@extends('../../layouts.admin')

@section('title')
Service List
@endsection

@section('breadcrumbs')
Service
@endsection

@section('content')
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
        <h2 class="intro-y text-lg font-medium mr-5 text-center">Service Management</h2>

        <div class="hidden md:block mx-auto text-gray-600"></div>

        <form method="GET">
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            {{-- <div class="w-full xl:w-56 relative text-gray-700 dark:text-gray-300">
                <input type="text" name="search" value="{{ request()->get('search') }}" pattern="[A-Za-z]{3}" class="input w-full xl:w-56 box pr-10 placeholder-theme-13" style="padding:10px; border-radius: 20px;" placeholder="Search...">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            </div> --}}
        </div>
        </form>
    </div>
</div>
<div class="col-span-12 lg:col-span-6">
    <div class="intro-y overflow-auto xxxl:overflow-visible sm:mt-8">
        <table class="table table-report sm:mt-2">
            <thead>
                <tr>
                    <th class="bg-theme-1 text-xs text-white" style="border-top-left-radius: 20px;">Location</th>
                    <th class="bg-theme-1 text-xs text-white" style="border-top-right-radius: 20px;">Count of Complaints</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usersByBarangay as $barangay => $count)
                    @include('components.brgy-row', [
                            'brgy' => $barangay,
                            'count' => $count,
                        ])
                @endforeach
            </tbody>
        </table>
        @if($pagination <> true)
        {!! $usersByBarangay->links() !!}
        @endif
    </div>
</div>
@endsection
@push('custom-scripts')
<script src="{{asset('js/html2canvas.js')}}"></script>
@endpush
