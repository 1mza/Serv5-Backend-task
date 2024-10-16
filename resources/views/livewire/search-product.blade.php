<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <form class="form-inline">
        <div class="input-group input-group-sm">
            <input
                    wire:model.live="search"
                    class="form-control form-control-navbar"
                    name="search"
                    type="search"
                    placeholder="Search a product..."
                    aria-label="Search">
        </div>
    </form>
    @if($products)
        <div class="search-results mt-2">
            <ul class="list-group">
                @foreach($products as $product)
                    <a href="{{route('products.show',$product)}}">
                        <li class="list-group-item">
                            <strong>{{ $product['title'] }}</strong> - ${{ $product['price'] }}<br>
                            <span>{{ $product['details'] }}</span>
                        </li>
                    </a>
                @endforeach
            </ul>
        </div>
    @endif
</div>


