<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
</head>
<body>
    <h1>JustKar - Receipt</h1>
    <table>
        <thead>
            <tr>
                <th>Ref No.</th>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Size</th>
                <th>Price</th>
                <th>Total Price</th>
                <th>Cashier Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $item)
            <tr>
                <td>{{ $item->ref_no}}</td>
                <td>{{ $item->product_code }}</td>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->size }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->total_price }}</td>
                <td>{{ $item->cashier_name }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
</body>
</html>
