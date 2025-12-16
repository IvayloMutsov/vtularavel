<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Shop - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Zoo Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">

                    <!-- Public Links -->
                    <li class="nav-item">
                        <x-nav-link 
                            :href="route('animals.list')" 
                            :active="request()->routeIs('animals.list')" 
                            wire:navigate
                        >
                            {{ __('Animals') }}
                        </x-nav-link>
                    </li>

                    <li class="nav-item">
                        <x-nav-link 
                            :href="route('dashboard')" 
                            :active="request()->routeIs('dashboard')" 
                            wire:navigate
                        >
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    </li>

                    <!-- Admin Links -->
                    <li class="nav-item">
                        <x-nav-link 
                            :href="route('admin.animal-types.index')" 
                            :active="request()->routeIs('admin.animal-types.*')" 
                            wire:navigate
                        >
                            {{ __('Animal Types') }}
                        </x-nav-link>
                    </li>

                    <li class="nav-item">
                        <x-nav-link 
                            :href="route('admin.animals.index')" 
                            :active="request()->routeIs('admin.animals.*')" 
                            wire:navigate
                        >
                            {{ __('Animals (Admin)') }}
                        </x-nav-link>
                    </li>

                    <li class="nav-item">
                        <x-nav-link 
                            :href="route('admin.breeds.index')" 
                            :active="request()->routeIs('admin.breeds.*')" 
                            wire:navigate
                        >
                            {{ __('Breeds') }}
                        </x-nav-link>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
