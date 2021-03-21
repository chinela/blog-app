<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title . ' - ' . config('app.name') }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @yield('css')
</head>
<body>

    <section id="mobile__wrapper" class="h-screen w-full flex">
        <div class=" w-96 bg-white px-6 py-7 ml-auto">
            <div class="text-right"><i id="close__mobile__menu" class="fa cursor-pointer hover:text-red-500 fa-times font-thin text-xl text-gray-500"></i></div>
            <div class="mt-6">
            </div>
            <div class="mt-14">
                <ul id="sidebar__menu">
                    <li><a href="{{ route('admin.dashboard') }}" class="text-gray-500 text-sm font-medium {{ Request::segment(2) == '' || Request::segment(2) == 'posts' ? 'active' : '' }}"><i class="fa w-6 fa-tachometer-alt"></i> Dashboard</a></li>
                    <li><a href="{{ route('admin.users') }}" class="text-gray-500 text-sm font-medium {{ Request::segment(2) == 'users' ? 'active' : '' }}"><i class="fa w-6 fa-tachometer-alt"></i> Users</a></li>
                    <li><a href="{{ route('admin.categories') }}" class="text-gray-500 text-sm font-medium {{ Request::segment(2) == 'categories' ? 'active' : '' }}"><i class="fa w-6 fa-tachometer-alt"></i> Categories</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="text-gray-500 text-sm font-medium"><i class="fa w-6 fa-sign-out-alt"></i> Logout</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
    </section>
    <div id="sidebar__wrapper" class="pt-6">
        <div class="flex justify-center">
            <img src="/images/fake-logo.png" alt="" class=" w-40">
        </div>

        <div class="mt-14">
            <ul id="sidebar__menu">
                <li><a href="{{ route('admin.dashboard') }}" class="text-gray-500 font-medium  {{ Request::segment(2) == '' || Request::segment(2) == 'posts' ? 'active' : '' }}"><i class="fa w-8 fa-tachometer-alt"></i> Posts</a></li>
                <li><a href="{{ route('admin.users') }}" class="text-gray-500 font-medium  {{ Request::segment(2) == 'users' ? 'active' : '' }}"><i class="fa w-8 fa-tachometer-alt"></i> Users</a></li>
                <li><a href="{{ route('admin.categories') }}" class="text-gray-500 font-medium  {{ Request::segment(2) == 'categories' ? 'active' : '' }}"><i class="fa w-8 fa-tachometer-alt"></i> Categories</a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form2').submit();" class="text-gray-500 font-medium"><i class="fa w-8 fa-sign-out-alt"></i> Logout</a></li>
                <form id="logout-form2" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
        </div>
    </div>
    <div id="dashboard__container" class="">
        <div id="dashboard__header" class="py-6 px-6 border-gray-200">
            <div class="flex justify-between items-center">
                <div class="ash__asy__dd">
                </div>
                <div class="asa__ays__rt">
                    <img src="/images/fake-logo.png" alt="" class=" w-16">
                </div>
                <div class="flex items-center pr-6" id="klp__sayY">
                    
                    <div class=" text-gray-600 text-sm">Hello {{ auth()->user()->fullName }}</div>
                    <div class="ml-5 flex items-center cursor-pointer" id="avatar__ctt">
                        <img src="/images/avatar.png" alt="">
                        <i class="fa fa-chevron-down text-xs text-gray-600 font-bold ml-2"></i>
                    </div>
                    <div class="bg-white shadow w-48 absolute hidden" id="DropDown__Menu">
                        <ul class="dd__drp__menu">
                            <li><a href=""><i class="fa fa-ticket-alt"></i> Create Ticket</a></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form3').submit();"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
                            <form id="logout-form3" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </div>
                <div id="hamburger-menu" class="">
                    <i class="fa fa-bars text-blue-200 text-2xl leading-none font-thin"></i>
                </div>
            </div>
        </div>
        <main class="p-6" id="app">
            @yield('content')
        </main>
    </div>
    
    <script src="/js/app.js"></script>
    <script>
        const dropdown_trigger = document.getElementById('avatar__ctt');
        const dropdownMenu = document.getElementById('DropDown__Menu');

        
        document.addEventListener('click', e => {
            e.stopPropagation()
            if(e.target == dropdown_trigger || e.target.parentElement == dropdown_trigger || e.target.classList.contains('Dropdown-separator') || e.target.classList.contains('dd__drp__menu')) {
                dropdownMenu.classList.remove('hidden')
            } else {
                dropdownMenu.classList.add('hidden')
            }
        })
        document.getElementById('hamburger-menu').addEventListener('click', function() {
            document.getElementById('mobile__wrapper').style.transform = 'scale(1)'
        })

        document.getElementById('close__mobile__menu').addEventListener('click', function() {
            document.getElementById('mobile__wrapper').style.transform = 'scale(0)'
        })
    </script>
    @yield('scripts')
</body>
</html>