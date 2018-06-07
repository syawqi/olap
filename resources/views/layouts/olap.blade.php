<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Daftar query untuk menjawab pertanyaan analisis berikut ini</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>
                                <a href="{{ url('olap/tahun') }}">Tunjukan hasil penjualan setiap tahun?</a>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <a href="{{ url('olap/month') }}"> Pada tahun 2002, bulan apa penjualan tertinggi? </a>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <a href="{{ url('olap/location') }}">  Dimana lokasi penjualan tertinggi?  </a>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <a href="{{ url('olap/product') }}"> Produk apa yang paling banyak terjual pada penjualan tertinggi? </a>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <a href="{{ url('olap/customer') }}"> Tipe pelanggan seperti apa (siapa) yang mendapat penjualan tertinggi? </a>
                            </th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>