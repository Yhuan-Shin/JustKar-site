<!DOCTYPE html>
<html>
<head>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>JustKar Receipt</title>
</head>
<body>
   
    <div class="container text-center">
        <h1 class="text-center">JustKar - Receipt</h1>
        <p class="text-center">Tandoc Street Pecson Ville Subdivision,
            San Jose del Monte, Philippines</p>
        <p>Phone: 09123456789</p>
        <p class="text-center">TIN: 123456789</p>
        <hr>
        @foreach ($sales as $item)
            <p>{{ $item->product_name }} - price per pc - {{ $item->price }} - {{$item->size}} x {{$item->quantity}}</p>
            <hr>    
            
        @endforeach
        @php
            $total = DB::table('order_items')->sum('total_price');
        @endphp
            <p>Total Price: {{ $total }}</p>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
