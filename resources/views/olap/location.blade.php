@extends('layouts.app')
@section('content')
    @include('layouts.olap')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dimana lokasi penjualan tertinggi?</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">
                                   Provinsi
                                </th>

                                <th class="text-center">
                                    Negara
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
                                @foreach($location as $index => $item)
                                   <tr>
                                       <td>
                                           {{ $item->province }}
                                       </td>
                                       <td>
                                           {{ $item->country }}
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

        var hasil = <?php  echo $location ?>;
        var data = [

         ]
        // console.log(hasil.length)
         for (var i = 0 ; i < hasil.length ; i++){
             console.log(hasil[i].province)
             var total = 0;
            for (var j = 0 ; j < hasil[i].sale.length ; j++){
                 total = total + parseInt(hasil[i].sale[j].sale)
                console.log(total)
            }
             data.push({
                 provinsi : hasil[i].province,
                 value : total
             })
         }
        console.log(data);
        new Morris.Bar({
            element: 'myfirstchart',
            data: data,
            xkey: 'provinsi',
            ykeys: ['value'],
            labels: ['Value']
        });
    </script>
@endsection()