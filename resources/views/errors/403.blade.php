<x-app-layout>
    <x-slot name="header">
        @include('includes.header')
    </x-slot>

    <div class="container my-12 mx-auto px-4">
        <div class="mt-4 bg-white text-center py-6 shadow-xl">
            403
            <div class="mt-4">
                {{ $exception->getMessage() }}
            </div>
        </div>
    </div>

</x-app-layout>
