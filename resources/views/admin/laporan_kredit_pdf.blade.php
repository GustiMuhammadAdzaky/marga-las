<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kredit</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #F9E1E3;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #FFCECD;
        }

        .container {
            text-align: center;
        }

        .container .title {
            margin: auto;
        }

        hr {
            height: 4px;
            background-color: #000;
            width: 100%;
            border: none;
        }

        .right {
            text-align: right;
        }

        #margalas {
            color: #044CB2;

        }

        .text-center {
            text-align: center;
        }

        h3 {
            margin: 0;
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <div class="title">

                <h3 class="text-center" id="margalas" style="font-size: 25pt;">Marga Las</h3>


                <h3 class="text-center" style="font-size: 15pt;">
                    Laporan Kredit Jasa Service dan penjualan
                </h3>

                <h4>
                    @if(empty($tanggalAwal) && empty($tanggalAkhir))
                    Seluruh Data
                    @else
                    Periode {{ $tanggalAwal }} Sampai dengan {{ $tanggalAkhir }}
                    @endif
                </h4>

                <p tyle="font-size: 30pt;">Jalan 28 Oktober No.18b</p>
            </div>
            <hr>
        </div>



        <div class="right">
            @php date_default_timezone_set('Asia/Jakarta'); @endphp
            <p>Dicetak pada {{ date("Y-m-d H:i:s") }} </p>
        </div>
    </header>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Id Transaksi</th>
                <th>Hari</th>
                <th>Nama Pelanggan</th>
                <th>Komponen Jasa</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>

            @php
            $no = 1;
            $totalKeuntungan = 0;
            @endphp


            @foreach($laporan as $lpr)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $lpr->id }}</td>
                <td>{{ $lpr->tanggal_pesan }}</td>
                <td>{{ $lpr->user->name }}</td>
                <td>{{ $lpr->transaksi_data }}</td>
                <td>{{ 'Rp ' . number_format($lpr->total_harga, 0, ',', '.') }}</td>
                @php
                $totalKeuntungan += $lpr->total_harga;
                @endphp
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"></td>
                <td class="text-end"><strong>Total Keuntungan:</strong></td>
                <td>{{ 'Rp ' . number_format($totalKeuntungan, 0, ',', '.') }}</td>

                <td></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>