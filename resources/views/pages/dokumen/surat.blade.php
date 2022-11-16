<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Jalan | Monitoring LPG</title>

    <link rel="stylesheet" href="{{ asset('dist/assets/css/bootstrap.min.css') }}">
</head>

<body>


    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Distribusi LPG</h2>
                <p>Kode Transaksi : &nbsp; <strong>{{$distribusi->kode_trx}}</strong></p>
            </div>
            <p>Tanggal : &nbsp; <strong>test</strong></p>
            <div class="col-12 pt-5 mx-auto">
                <div class="position-absolute mt-5 start-50 translate-middle">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="5%">No.</th>
                                <th width=15%>Pangkalan</th>
                                <th width="5%">Qty</th>
                                <th width="15%">Paraf</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $item->pangkalan->nama }}</td>
                                <td>{{ $item->qty }}</td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.print()
    </script>
</body>

</html>