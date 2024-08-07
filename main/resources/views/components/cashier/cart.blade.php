
    <!-- Cart Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Orders</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if($orderItems->count() > 0)
                        @foreach($orderItems as $item)
                            <div class="row mb-4">
                                {{-- <div class="col-md-3">
                                    <img src="{{ asset('uploads/product_images/'.$item->product->product_image) }}" class="img-fluid">
                                </div> --}}
                                <div class="col-md-6">
                                    <h5>{{ $item->product_name }}</h5>
                                    <p>Price: {{ $item->price }}</p>
                                    <p>Size: {{ $item->size }}</p>
                                    {{-- edit quantity --}}
                                    <form action="{{ route('order.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <label for="quantity">Quantity:</label>
                                        <input type="number" class="form-control mb-2" min="1" name="quantity" value="{{ $item->quantity }}">
                                        {{-- delete from the cart    --}}
                                        <form action="{{route('order.destroy', $item->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>

                                        </form>
                                        
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h4>Your cart is empty</h4>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Checkout</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </di