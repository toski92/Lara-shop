<x-app-layout>
    <div class="container mx-auto">
        <div class="bg-white max-w-2xl px-4 py-4 mx-auto sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <div>
                @if ($products->count())
                    <h2 class="text-2xl font-bold tracking-tight text-gray-900">Customers also purchased</h2>

                    <div class="grid grid-cols-1 mt-6 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                        @foreach ($products as $product)
                        <a href="{{ route('product.id',['id'=>$product->id]) }}" class="relative group">
                            <div class="relative w-full overflow-hidden bg-gray-200 rounded-md aspect-h-1 aspect-w-1 lg:aspect-none group-hover:opacity-75 lg:h-80">
                                <img src="{{ env('APP_URL').str_replace('public/', 'storage/', $product->feature_image) }}" alt="{{ $product->title }}" class="object-cover object-center w-full h-full lg:h-full lg:w-full">
                                @if (($product->quantity!==null) && ($product->quantity!=0) && ($product->quantity!=''))
                                <span @style(['top: 90%','margin-left:3%']) class="absolute inline-flex items-center px-2 py-1 text-xs font-medium text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-600/20">{{ $product->quantity }} in Stock</span>
                                @else
                                <span @style(['top: 90%','margin-left:3%']) class="absolute inline-flex items-center px-2 py-1 text-xs font-medium text-red-700 rounded-md bg-red-50 ring-1 ring-inset ring-red-600/10">Out of Stock</span>
                                @endif
                            </div>
                            <div class="flex justify-between mt-4">
                                <div>
                                    <h3 class="text-sm text-gray-700">
                                        <span class="mt-1 text-sm text-gray-500">{{ $product->title }}</span>
                                    </h3>
                                </div>
                                <p class="text-sm font-medium text-gray-900">
                                    @if (!empty($product->sale_price))
                                    {{ '$'.$product->sale_price }}
                                    @endif

                                    @if (!empty($product->regular_price))
                                        @if (empty($product->sale_price))
                                        {{ '$'.$product->regular_price }}
                                        @else
                                        <sup><del>{{ '$'.$product->regular_price }}</del></sup>
                                        @endif
                                    @else
                                    {{ $product->regular_price }}
                                    @endif
                                </p>
                            </div>
                        </a>
                        @endforeach

                        <!-- More products... -->
                    </div>
                @else
                <div>No Products are Available</div>
                @endif
            </div>
            <div class="pt-10">
            {{ $products->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
