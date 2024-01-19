@extends('layouts.adminlayout')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<div class="head-title">
	<div class="left">
		<h1>{{ $title }}</h1>
	</div>
</div>


<ul class="box-info">
	<li>
		<i class='bx bxs-calendar-check'></i>
		<span class="text">
			<h3>{{ $totalOrder }}</h3>
			<p>Total Order</p>
		</span>
	</li>
	<li>
		<i class='bx bxs-dollar-circle'></i>
		<span class="text">
			<h3>{{ 'Rp ' . number_format($totalKeuntungan, 0, ',', '.') }}</h3>
			<p>Total Keuntungan</p>
		</span>
	</li>
	<li>
		<i class='bx bxs-group'></i>
		<span class="text">
			<h3>{{ $lunasOrder }}</h3>
			<p>Lunas</p>
		</span>
	</li>

</ul>




<div class="table-data">
	<div class="order">
		<div class="head">
			<h3>Grafik Penjualan</h3>
			<i class='bx bx-search'></i>
			<i class='bx bx-filter'></i>
		</div>
		<canvas id="myChart"></canvas>


	</div>
</div>
<div class="table-data">
	<div class="order">
		<div class="head">
			<h3>Transaksi Terbaru</h3>
			<i class='bx bx-search'></i>
			<i class='bx bx-filter'></i>
		</div>
		<table>
			<thead>
				<tr>
					<th>User</th>
					<th>Date Order</th>

				</tr>
			</thead>
			<tbody>
				@foreach($transaksiModels as $transaksi)
				<tr>
					<td>

						<p>{{ $transaksi->user->name }}</p>
					</td>
					<td>{{ $transaksi->tanggal_pesan }}</td>

				</tr>
				@endforeach
			</tbody>
		</table>
		<a href="{{ route('laporan.admin') }}"><button type="button" class="btn btn-outline-primary">Lihat
				Selenkapnya</button></a>
	</div>
</div>

<script>
	// Ambil data untuk grafik dari PHP dan konversi menjadi JavaScript
	var data = {!! json_encode($grafikData)!!};

	// Inisialisasi Chart.js
	var ctx = document.getElementById('myChart').getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'line', // Ganti tipe grafik sesuai kebutuhan (line, bar, dll.)
		data: {
			labels: data.labels,
			datasets: [{
				label: 'Penjualan',
				data: data.values,
				borderColor: 'rgba(75, 192, 192, 1)',
				borderWidth: 1,
				fill: false
			}]
		},
		options: {
			// Konfigurasi tambahan dapat ditambahkan di sini
		}
	});
</script>



@endsection