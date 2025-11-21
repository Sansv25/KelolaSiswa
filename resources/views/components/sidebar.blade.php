@props([
    'menuItems' => [
        [
            'route' => 'dashboard',
            'label' => 'Dashboard',
            'icon' => '<i class="fa-solid fa-chart-pie"></i>',
            'badge' => null,
        ],
        [
            'route' => 'table',
            'label' => 'Table Siswa',
            'icon' => '<i class="fa-solid fa-table"></i>',
            'badge' => null,
        ],
        [
            'route' => 'Sekolah',
            'label' => 'Sekolah',
            'icon' => '<i class="fa-solid fa-school-circle-check"></i>',
            'badge' => null,
        ],
        [
            'route' => 'Provinsi',
            'label' => 'Provinsi',
            'icon' => '<i class="fa-solid fa-earth-asia"></i>',
            'badge' => null,
        ],
    ],
    'activeRoute' => null, // Route aktif, bisa di-pass dari controller atau auto-detect
])

{{-- Tombol toggle untuk mobile --}}
<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="text-heading bg-transparent box-border border border-transparent hover:bg-neutral-secondary-medium focus:ring-4 focus:ring-neutral-tertiary font-medium leading-5 rounded-base ms-3 mt-3 text-sm p-2 focus:outline-none inline-flex sm:hidden">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h10"/>
    </svg>
</button>

{{-- Sidebar --}}
<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-full transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-neutral-primary-soft border-e border-default flex flex-col">
        {{-- Logo --}}
        <a href="/" class="flex items-center ps-2.5 mb-5">
            <img src="{{ asset('storage/asset/logo.png') }}" class="h-6 me-3" alt="Logo" />
            <span class="self-center text-lg text-heading font-semibold whitespace-nowrap">Kelola Siswa</span>
        </a>

        {{-- Menu items dengan perulangan --}}
        <ul class="space-y-2 font-medium flex-1">
            @foreach($menuItems as $item)
                <li>
                    <a href="{{ route($item['route']) }}" 
                       class="flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand group 
                              {{ request()->routeIs($item['route']) ? 'bg-neutral-tertiary text-fg-brand' : '' }}">
                        {!! $item['icon'] !!}
                        <span class="ms-3">{{ $item['label'] }}</span>
                        @if($item['badge'])
                            <span class="bg-neutral-secondary-medium border border-default-medium text-heading text-xs font-medium px-1.5 py-0.5 rounded-sm ms-2">{{ $item['badge'] }}</span>
                        @endif
                    </a>
                </li>
            @endforeach
        </ul>

        {{-- Bagian Profile di bawah --}}
        @if(Auth::check())
            <div class="mt-auto pt-4 border-t border-default">
                <div x-data="{ profileOpen: false }" class="relative">
                    <button @click="profileOpen = !profileOpen" class="w-full flex items-center px-2 py-2 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand focus:outline-none transition ease-in-out duration-150">
                        <div class="flex-1 text-left">{{ Auth::user()->name }}</div>
                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4 transition-transform duration-150" :class="{'rotate-180': profileOpen}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>

                    {{-- Dropdown Content --}}
                    <div x-show="profileOpen" @click.away="profileOpen = false" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute bottom-full left-0 w-full mb-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md shadow-lg z-50">
                        <div class="py-1">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                                {{ __('Profile') }}
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</aside>