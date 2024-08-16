<!DOCTYPE html>
<html>
<head>
    <title>Inventory Report</title>
</head>
<body>

    <h1>JustKar Inventory Report</h1>
    <table>
        <thead>
            <tr>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Brand</th>
                <th>Size</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventories as $item)
            <tr>
                <td>{{ $item->product_code }}</td>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->category }}</td>
                <td>{{ $item->quantity }}</td>
                <td>
                    @if($item->quantity == 0)
                    <span class="badge bg-danger">Out of Stock</span>
                    @elseif($item->quantity <= $item->critical_level)
                    <span class="badge bg-warning">Low Stock</span>
                    @else
                    <span class="badge bg-success">In Stock</span>
                    @endif
                </td>
                <td>{{ $item->brand }}</td>
                <td>{{ $item->size }}</td>
                <!-- Display more attributes -->
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
