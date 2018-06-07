@extends('layouts.app')
@section('content')
    @include('layouts.olap')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Daftar query untuk menjawab pertanyaan analisis berikut ini</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">
                                   Tahun
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
                                @foreach($sale as $index => $item)
                                   <tr>
                                       <td>
                                           {{ $item['year'] }}
                                       </td>
                                       <td>
                                           Rp {{ $item['total'] }}
                                       </td>
                                       <td>
                                           Rp {{ $item['profit'] }}
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
        var hasil = <?php  echo $sale ?>;
         var data = [

         ]
        console.log(hasil.length)
         for (var i = 0 ; i < hasil.length ; i++){
             data.push({
                 year : hasil[i]['year'],
                 value : hasil[i]['total']
             })
         }
        console.log(data);
        new Morris.Bar({
            element: 'myfirstchart',
            data: data,
            xkey: 'year',
            ykeys: ['value'],
            labels: ['Value']
        });
    </script>
@endsection()