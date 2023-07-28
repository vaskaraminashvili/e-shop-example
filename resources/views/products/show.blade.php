<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <h1>Hello, world!</h1>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Product :product Details', ['product' => $product->name]) }}
    </h2>


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <form action="{{ route('products.show', $product->slug) }}" method="GET">
                    @foreach($attributes as $id => $name)
                        @if(isset($options[$id]))
                            <div class="mb-4">
                                <label class="text-xl text-gray-600"> {{ $name }} </label>
                                <select name="attributes[{{ $id }}]"
                                        class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                                        required>
                                    @foreach($options[$id] as $option)
                                        <option value="{{ $option['id'] }}"
                                            @selected(request()->query('attributes') && $option['id'] == request()->query('attributes', '')[$id])>
                                            {{ $option['value'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    @endforeach

                    <div class="mb-4">
                        <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Find price
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@if($price)
<div class="mt-4">
    @if($price['found'])
        <p>
            <span class="text-xl font-bold">Price</span>
            <span>${{ number_format($price['price'], 2) }}</span><br/>
            <small>{{ $price['sku'] }}</small>
        </p>
    @else
        <p>We could not find a price for this combination</p>
    @endif
</div>
@endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>

