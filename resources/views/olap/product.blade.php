@extends('layouts.app')
@section('content')
    @include('layouts.olap')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Produk apa yang paling banyak terjual pada penjualan tertinggi? </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">
                                    Produk
                                </th>

                                <th class="text-center">
                                    Harga
                                </th>

                                <th class="text-center">
                                    Jumlah
                                </th>

                                <th class="text-center">
                                    Penjualan
                                </th>

                                <th class="text-center">
                                    Profit
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product as $index => $item)
                                <tr>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td>
                                        Rp {{ $item->ingredient + $item->production }}
                                    </td>
                                    <td>
                                        {{ $item->sale->count() }}
                                    </td>
                                    <td>
                                        Rp {{ $item->sale->sum('sale') }}
                                    </td>
                                    <td>
                                        Rp {{ $item->sale->sum('profit') }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div id="myfirstchart" style="height: 250px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        var hasil = <?php  echo $product ?>;
        var data = [

        ]
        // console.log(hasil.length)
        for (var i = 0 ; i < hasil.length ; i++){
            // console.log(hasil[i].name)
            // var total = 0;
            // for (var j = 0 ; j < hasil[i].sale.length ; j++){
            //     total = total + parseInt(hasil[i].sale[j].sale)
            //     console.log(total)
            // }
            data.push({
                name : hasil[i].name,
                value : hasil[i].sale.length
            })
        }
        console.log(data);
        new Morris.Bar({
            element: 'myfirstchart',
            data: data,
            xkey: 'name',
            ykeys: ['value'],
            labels: ['Value']
        });
    </script>
@endsection()