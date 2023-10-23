<x-app-layout>
    <form class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8" method="POST" enctype="multipart/form-data" action="{{ route('store.product') }}">
        @csrf

        <!-- Title -->
        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" class="block w-full mt-1" type="text" name="title" :value="old('title')" autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <!-- Description -->
        <div class="mt-4">
            <x-input-label for="description" :value="__('Description')" />
            <x-textarea id="description" class="block w-full mt-1" name="description" :value="old('description')" ></x-textarea>
        </div>

        <!-- Excerpt -->
        <div class="mt-4">
            <x-input-label for="excerpt" :value="__('Excerpt')" />
            <x-textarea id="excerpt" class="block w-full mt-1" name="excerpt" :value="old('excerpt')" ></x-textarea>
        </div>

        <!-- Feature Image -->
        <div class="mt-4">
            <x-input-label for="feature_image" :value="__('Feature Image')" />
            <x-text-input id="feature_image" class="block w-full mt-1" type="file" name="feature_image" :value="old('feature_image')" />
        </div>

        <!-- Regular Price -->
        <div class="mt-4">
            <x-input-label for="regular_price" :value="__('Regular Price')" />
            <x-text-input id="regular_price" class="block w-full mt-1" type="text" name="regular_price" :value="old('regular_price')" min="0" />
        </div>

        <!-- Sale Price -->
        <div class="mt-4">
            <x-input-label for="sale_price" :value="__('Sale Price')" />
            <x-text-input id="sale_price" class="block w-full mt-1" type="text" name="sale_price" :value="old('sale_price')" min="0" />
        </div>

        <!-- Quantity -->
        <div class="mt-4">
            <x-input-label for="quantity" :value="__('Quantity')" />
            <x-text-input id="quantity" class="block w-full mt-1" type="number" name="quantity" :value="old('quantity')" min="0" />
        </div>

        <x-primary-button class="mt-4">
            {{ __('Add Product') }}
        </x-primary-button>
    </form>
    {{--  <script>
        CKEDITOR.replace( 'description' );
        CKEDITOR.replace( 'excerpt' );
    </script>  --}}
    {{--  <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .then( description => {
                    console.log( description );
            } )
            .catch( error => {
                    console.error( error );
            } );
            ClassicEditor
                .create( document.querySelector( '#excerpt' ) )
                .then( excerpt => {
                        console.log( excerpt );
                } )
                .catch( error => {
                        console.error( error );
                } );
    </script>  --}}

</x-app-layout>
