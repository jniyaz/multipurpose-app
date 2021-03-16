@if(session('message'))
<div class="fixed inset-x-0 top-0 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end z-50">
    <div x-data="{ show: false }"
        x-init="() => { setTimeout(() => show = true, 100); setTimeout(() => show = false, 3000); }"
        x-show="show" 
        x-description="Notification panel, show/hide based on alert state." 
        @click.away="show = false" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
        class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto">
        <div class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
            {{-- Success --}}
            @if(session('type') == 'success')
            <div class="flex items-center justify-center w-12 bg-green-500">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"/>
                </svg>
            </div>
            @endif

            {{-- Error --}}
            @if(session('type') == 'error')
            <div class="flex items-center justify-center w-12 bg-red-500">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z"/>
                </svg>
            </div>
            @endif

            {{-- Warning --}}
            @if(session('type') == 'warning')
            <div class="flex items-center justify-center w-12 bg-yellow-400">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"/>
                </svg>
            </div>
            @endif

            {{-- Info --}}
            @if(session('type') == 'info')
            <div class="flex items-center justify-center w-12 bg-blue-500">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"/>
                </svg>
            </div>
            @endif

            
            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    {{-- Success --}}
                    @if(session('type') == 'success')
                    <span class="font-semibold text-green-500 dark:text-green-400">{{ ucfirst(session('type')) }}</span>
                    @endif
                    {{-- Error --}}
                    @if(session('type') == 'error')
                    <span class="font-semibold text-red-500 dark:text-red-400">Error</span>
                    @endif
                    {{-- Warning --}}
                    @if(session('type') == 'warning')
                    <span class="font-semibold text-yellow-400 dark:text-yellow-300">Warning</span>
                    @endif
                    {{-- Info --}}
                    @if(session('type') == 'info')
                    <span class="font-semibold text-blue-500 dark:text-blue-400">Info</span>
                    @endif

                    {{-- Message --}}
                    <p class="text-sm text-gray-600 dark:text-gray-200">{{ session('message') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endif