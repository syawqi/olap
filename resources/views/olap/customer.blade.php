@extends('layouts.app')
@section('content')
    @include('layouts.olap')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">  Tipe pelanggan seperti apa (siapa) yang mendapat penjualan tertinggi?  </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">
                                    Pelanggan
                                </th>

                                <th class="text-center">
                                    Penjualan
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customer as $index => $item)
                                <tr>
                                    <td>
                                        {{ $item->description }}
                                    </td>
                                    <td>
                                        Rp {{ $item->sale->sum('sale') }}
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

        var hasil = <?php  echo $customer ?>;
        var data = [

        ]
        // console.log(hasil.length)
        for (var i = 0 ; i < hasil.length ; i++){
            // console.log(hasil[i].name)
            var total = 0;
            for (var j = 0 ; j < hasil[i].sale.length ; j++){
                total = total + parseInt(hasil[i].sale[j].sale)
                console.log(total)
            }
            data.push({
                name : hasil[i].description,
                value : total
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