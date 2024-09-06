<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JustKar Receipt</title>
    <style>
        /* Basic reset */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            box-sizing: border-box;
        }

        .header-address-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }   

        .header, .address {
            flex: 1;
        }

        .header {
            text-align: left;
        }

        .address {
            text-align: right;
        }

        hr {
            border: none;
            border-top: 1px solid black;
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header-address-container">
            {{-- header --}}
            <div class="header">
                <h1 style="margin: 0 0 10px 0; font-size: 24px;">Just<span style="color:red;">Kar</span> - Receipt</h1>
                <p style="margin: 0 0 5px 0;">TIN: 274-162-585-00000</p>
                <p style="margin: 0 0 5px 0;">BIR ATP: OCN 25BAAU20230000007</p>
            </div>
            {{-- address --}}
            <div class="address">
                <p style="margin: 0 0 5px 0;">Tandoc Street Pecson Ville<br>Subdivision,</p>
                <p style="margin: 0 0 5px 0;">San Jose del Monte, Philippines</p>
                <p style="margin: 0 0 5px 0;">Phone: 09123456789</p>
            </div>
        </div>
        <hr>
        <table>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
            @foreach ($sales as $item)
            <tr>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->total_price }}</td>
            </tr>
            @endforeach
            <tr>
                @php
                    $total = DB::table('order_items')->sum('total_price');
                @endphp
                <td colspan="3" style="text-align: right;"><strong>Total Price:</strong></td>
                <td>{{ $total }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
