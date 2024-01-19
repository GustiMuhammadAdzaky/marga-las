<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 10px;
        }

        .lokasi {
            float: left;
        }

        .right {
            float: right;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .left,
        .right {
            margin-top: 20px;
        }

        .left p,
        .right p {
            margin: 0;
        }

        .left {
            float: left;
        }
    </style>
    <title>Invoice</title>
</head>

<body>
    <div class="container">
        <div class="lokasi">
            <p>Marga Las</p>
            <p>Jalan 28 Oktober No.18b</p>
        </div>
        <div class="right">
            @php date_default_timezone_set('Asia/Jakarta'); @endphp
            <p>Pontianak, {{ date('d-m-Y') }}</p>
            <p>Kepada Yth : </p>
            <p>{{ $data["nama_customer"] }}</p>
        </div>
        <br>
        <br>
        <br>
        <br>
        <table>
            <tr>
                <th>No. Invoice</th>
                <th>Tipe Pembayaran</th>
                <th>Nama Layanan</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            <tr>
                <td>{{ $data["no_invoice"] }}</td>
                <td>{{ $data["tipe_pembayaran"] }}</td>
                <td>{{ $data["nama_layanan"] }}</td>
                <td>{{ $data["quantity"] }}</td>
                <td>{{ $data["total"] }}</td>
            </tr>
        </table>
        <div class="left">
            <p>Tanda Terima</p>
            <br>
            <br>
            <br>
            (<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>)
        </div>

        <div class="right">
            <p>Hormat Kami</p>
            <br>
            <br>
            <br>
            (<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>)
        </div>
    </div>

</body>

</html>