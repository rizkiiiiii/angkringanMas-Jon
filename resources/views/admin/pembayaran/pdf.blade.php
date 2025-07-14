<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Laporan Transaksi</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Status</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total_pendapatan = 0;
            @endphp
            @foreach($list_transaksi as $key => $order)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $order->nama_pelanggan }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ number_format($order->total, 0, ',', '.') }}</td>
                </tr>

                 @php
                    $total_pendapatan += $order->total;
                @endphp

            @endforeach
            <tr>
                <td colspan="2" style="text-align: right;"><strong>Total Pendapatan</strong></td>
                <td colspan="2"><strong>{{ number_format($total_pendapatan, 0, ',', '.') }}</strong></td>
            </tr>
        </tbody>
        
    </table>
    <p style="text-align: right; margin-top: 30px;">Dicetak pada: {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
</body>
</html>
