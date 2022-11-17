<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan | Monitoring LPG</title>

    <link rel="stylesheet" href="{{ asset('dist/assets/css/bootstrap.min.css') }}">
</head>

<body>

    <div class="container">
        <div class="row pt-5">
            <div class="col">
                <h2>Distribusi LPG</h2>
                <p>Laporan Bulanan Periode : &nbsp; <strong>{{ Carbon\Carbon::parse($periode)->format('M Y')
                        }}</strong>
                </p>
                <div class="card-body">
                    <div class="pt-5 mx-auto">
                        <div class="position-absolute mt-5 start-50 translate-middle">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="5%">No.</th>
                                        <th width=15%>Kode Transaksi</th>
                                        <th width="10%">Tujuan</th>
                                        <th width="5%">Qty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($distribusi as $data)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $data->kode_trx }}</td>
                                        <td>{{ $data->item->count() }}</td>
                                        <td>{{ $data->item->sum('qty') }}</td>
                                    </tr>
                                    @empty
                                    <td colspan="4" class="text-center">No record</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        window.print()
    </script>
</body>

</html>