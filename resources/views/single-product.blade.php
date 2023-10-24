<x-app-layout>
    <div class="container mx-auto">
        <div class="bg-white">
            <div class="max-w-2xl px-4 py-16 mx-auto sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            {{-- <h2 class="text-2xl font-bold tracking-tight text-gray-900">Customers also purchased</h2> --}}

            <div class="grid grid-cols-1 mt-6 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-2 xl:gap-x-8">
                {{-- @foreach ($products as $product) --}}
                <div class="relative group">
                    <div class="relative w-full overflow-hidden bg-gray-200 rounded-md aspect-h-1 aspect-w-1 lg:aspect-none group-hover:opacity-75 lg:h-80">
                        <img src="{{ env('APP_URL').str_replace('public/', 'storage/', $product->feature_image) }}" alt="{{ $product->title }}" class="object-cover object-center w-full h-full lg:h-full lg:w-full">
                        @if (($product->quantity!==null) && ($product->quantity!=0) && ($product->quantity!=''))
                        <span @style(['top: 90%','margin-left:3%']) class="absolute inline-flex items-center px-2 py-1 text-xs font-medium text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-600/20">{{ $product->quantity }} in Stock</span>
                        @else
                        <span @style(['top: 90%','margin-left:3%']) class="absolute inline-flex items-center px-2 py-1 text-xs font-medium text-red-700 rounded-md bg-red-50 ring-1 ring-inset ring-red-600/10">Out of Stock</span>
                        @endif



                        <div class="relative inline-block text-left">
                            <div>
                              <button type="button" class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                Options
                                <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                  <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                              </button>
                            </div>

                            <!--
                              Dropdown menu, show/hide based on menu state.

                              Entering: "transition ease-out duration-100"
                                From: "transform opacity-0 scale-95"
                                To: "transform opacity-100 scale-100"
                              Leaving: "transition ease-in duration-75"
                                From: "transform opacity-100 scale-100"
                                To: "transform opacity-0 scale-95"
                            -->
                            <div class="absolute right-0 z-10 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                              <div class="py-1" role="none">
                                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">Edit</a>
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1">Duplicate</a>
                              </div>
                              <div class="py-1" role="none">
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-2">Archive</a>
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-3">Move</a>
                              </div>
                              <div class="py-1" role="none">
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-4">Share</a>
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-5">Add to favorites</a>
                              </div>
                              <div class="py-1" role="none">
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-6">Delete</a>
                              </div>
                            </div>
                          </div>

                    </div>
                    <div class="flex justify-between mt-4">
                        <div>
                        <h3 class="mt-1 text-sm text-gray-500">{{ $product->title }}</h3>
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
                </div>
                {{-- @endforeach --}}

                <!-- More products... -->
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
