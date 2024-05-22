<x-app-layout>
    <x-slot name="header">
        @include('includes.header')
    </x-slot>

    <div class="container my-12 mx-auto px-4">
        <div class="flex flex-wrap -mx-1 lg:-mx-4">
            @if ($places->count() == 0)
                <div class="flex items-center p-4 text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300 w-full"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">لاتوجد أماكن تحت هذا التصنيف</span>
                    </div>
                </div>
            @endif
            @foreach ($places as $place)
                <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                    <article class="overflow-hidden rounded-lg shadow-lg bg-white">
                        <a href="{{ route('place.show', [$place->id, $place->slug]) }}">
                            <img alt="Placeholder" class="block h-auto w-full" src="{{ $place->image }}">
                        </a>
                        <header class="items-center justify-between leading-tight p-2 md:p-4">
                            <h1 class="text-base mb-3">
                                <a class="no-underline hover:underline text-black"
                                    href="{{ route('place.show', [$place->id, $place->slug]) }}">
                                    {{ $place->name }}
                                </a>
                            </h1>
                            <h4 class="text-xs"> {{ $place->address }}</h4>
                        </header>
                    </article>
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
