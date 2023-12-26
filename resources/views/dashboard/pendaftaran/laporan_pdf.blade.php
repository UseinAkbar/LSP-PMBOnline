<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pendaftaran</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 7pt;
		}
	</style>
	<center>
		<h3>Laporan Pendaftaran Mahasiswa Baru</h3>
        <h3>Telkom University</h3>
        <h3>2023/2024</h3>
	</center>

	<table class='table table-bordered mt-3'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Alamat KTP</th>
				<th>Alamat Saat Ini</th>
                <th>Kecamatan</th>
				<th>Kabupaten</th>
				<th>Provinsi</th>
                <th>No Telepon</th>
                <th>No HP</th>
                <th>Email</th>
                <th>Kewarganegaraan</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Status Menikah</th>
                <th>Agama</th>
			</tr>
		</thead>
		<tbody>
        @forelse ($riwayat_pendaftaran as $item )
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->alamat_ktp }}</td>
                            <td>{{ $item->alamat_sekarang }}</td>
                            <td>{{ $item->kecamatan }}</td>
                            <td>{{ $item->kabupaten }}</td>
                            <td>{{ $item->provinsi }}</td>
                            @isset($p['noTelp'])
                            <td>{{ $item->noTelp }}</td>
                            @else
                            <td>-</td>
                            @endisset
                            <td>0{{ $item->noHp }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->kewarganegaraan }}</td>
                            <td>{{ $item->tgl_lahir }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->status_menikah }}</td>
                            <td>{{ $item->agama }}</td>
                        </tr>
                        @empty

                        @endforelse
		</tbody>
	</table>

</body>
</html>
