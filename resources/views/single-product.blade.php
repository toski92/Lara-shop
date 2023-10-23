<x-app-layout>
    <div class="container mx-auto">
        <div class="bg-white">
            <div class="max-w-2xl px-4 py-16 mx-auto sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            {{-- <h2 class="text-2xl font-bold tracking-tight text-gray-900">Customers also purchased</h2> --}}

            <div class="grid grid-cols-1 mt-6 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                {{-- @foreach ($products as $product) --}}
                <div class="relative group">
                    <div class="w-full overflow-hidden bg-gray-200 rounded-md aspect-h-1 aspect-w-1 lg:aspect-none group-hover:opacity-75 lg:h-80">
                        <img src="{{ env('APP_URL').str_replace('public/', 'storage/', $product->feature_image) }}" alt="{{ $product->title }}" class="object-cover object-center w-full h-full lg:h-full lg:w-full">
                    </div>
                    <div class="flex justify-between mt-4">
                        <div>
                        <h3 class="mt-1 text-sm text-gray-500">{{ $product->title }}</h3>
                        </div>
                        <p class="text-sm font-medium text-gray-900">{{ '$'.$product->sale_price }} <sup><del>{{ '$'.$product->regular_price }}</del></sup></p>
                    </div>
                </div>
                {{-- @endforeach --}}

                <!-- More products... -->
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
