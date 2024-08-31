<!DOCTYPE html>
<html>
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JustKar Receipt</title>
</head>

<body>
    
    <div style="width: 100%; max-width: 800px; margin: 0 auto; padding: 20px; box-sizing: border-box;">
        <h1 style="margin: 0 0 10px 0; font-size: 24px;">Just<span style="color:red;">Kar</span> - Receipt</h1>
        <div style="text-align: left;">
            <p style="margin: 0 0 5px 0;">TIN: 274-162-585-00000</p>
            <p style="margin: 0 0 5px 0;">BIR ATP: OCN 25BAAU20230000007</p>
        </div>
        <div style="text-align: right;">
            <p style="margin: 0 0 5px 0;">Tandoc Street Pecson Ville<br>Subdivision,</p>
            <p style="margin: 0 0 5px 0;">San Jose del Monte, Philippines</p>
            <p style="margin: 0 0 5px 0;">Phone: 09123456789</p>
        </div>
        <hr style="border: none; border-top: 1px solid black; margin: 20px 0;">
    </div>
    <hr>
    <table style="width: 100%; border-collapse: collapse; text-align: center;">
        <tr>
            <th style="border: 1px solid #ddd; padding: 8px;">Product Name</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Quantity</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Price</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Total</th>
        </tr>
        @foreach ($sales as $item)
        <tr>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->product_name }}</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->quantity }}</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->price }}</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->total_price }}</td>
        </tr>
        @endforeach
        <tr>
            @php
                $total = DB::table('order_items')->sum('total_price');
            @endphp
            <td colspan="3" style="text-align: right; border: 1px solid #ddd; padding: 8px;"><strong>Total Price:</strong></td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $total }}</td>
        </tr>
    </table>

</body>
</html>
