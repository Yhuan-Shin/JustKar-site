<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JustKar Tire Supply Receipt</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        table {
            border: solid 1px black;
        }
        th {
            text-align: center;
            vertical-align: middle;
            font-weight: bold;
            border: solid 1px black;
        }
        td{
            text-align: center;
            vertical-align: middle;
            border: solid 1px black;
        }
    </style>
</head>

<body>

<div class="container py-8">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="text-gray-700 font-semibold text-lg ml-4">JustKar Tire Supply</div>
                </div>
                <div class="text-gray-700">
                    <div class="font-bold text-xl mb-2 uppercase">This receipt is not official, for sales tracking only</div>
                    <div class="text-sm">Date: {{ date('d/m/Y') }}</div>
                    <div class="text-sm">TIN: 274-162-585-00000</div>
                    <div class="text-sm">BIR ATP: OCN 25BAAU20230000007</div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="text-gray-700 font-bold uppercase">Ref. No</th>
            <th class="text-gray-700 font-bold uppercase">Product Code</th>
            <th class="text-gray-700 font-bold uppercase">Product Name</th>
            <th class="text-gray-700 font-bold uppercase">Product Type</th>
            <th class="text-gray-700 font-bold uppercase">Quantity</th>
            <th class="text-gray-700 font-bold uppercase">Price</th>
            <th class="text-gray-700 font-bold uppercase">Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($sales as $item)
            <tr>
                <td>{{ $item->ref_no }}</td>
                <td>{{ $item->product_code }}</td>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->product_type }}</td>
                <td>{{ $item->quantity }}</td>
                <td>₱{{ number_format($item->price, 2) }}</td>
                <td>₱{{ number_format($item->total_price, 2) }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="6" style="text-align: right;"><strong>Total Price:</strong></td>
            <td>
                @php
                    $total = DB::table('order_items')->sum('total_price');
                @endphp
                ₱{{ number_format($total, 2) }}
            </td>
        </tr>
        </tbody>
    </table>
    <div class="text-center">
        <p style="margin: 0 0 5px 0;">Tandoc Street Pecson Ville<br>Subdivision,</p>
        <p style="margin: 0 0 5px 0;">San Jose del Monte, Philippines</p>
        <p style="margin: 0 0 5px 0;">Phone: 09123456789</p>
    </div>
</div>

</body>
</html>
