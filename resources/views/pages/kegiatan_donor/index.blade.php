@extends('layouts.app')

@section('title', 'Kegiatan Donor - DonorConnect')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kegiatan Donor</h1>
</div>

<div class="card shadow mb-4">

    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title mb-0">Data Kegiatan Donor</h5>

        <a href="{{ route('kegiatan-donor.create') }}" class="btn btn-primary">
            <span class="fa fa-plus-circle mr-2"></span>
            Tambah Kegiatan
        </a>
    </div>

    <div class="card-body">

        <table class="table table-striped table-hover datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kegiatan</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($kegiatan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->nama_kegiatan }}</td>

                        <td>
                            {{ $item->tanggal->format('d M Y') }}
                        </td>

                        <td>
                            {{ $item->waktu }}
                        </td>

                        <td>
                            {{ $item->lokasi }}
                        </td>

                        <td>
                            <a href="{{ route('kegiatan-donor.show', $item->id_kegiatan) }}"
                               class="btn btn-link text-secondary p-0 mx-2"
                               title="Detail">
                                <span class="fa fa-eye"></span>
                            </a>

                            <a href="{{ route('kegiatan-donor.edit', $item->id_kegiatan) }}"
                               class="btn btn-link p-0 mx-2"
                               title="Edit">
                                <span class="fa fa-edit"></span>
                            </a>

                            <a href="javascript:void(0)"
                               onclick="actionDestroy('{{ route('kegiatan-donor.destroy', $item->id_kegiatan) }}')"
                               class="btn btn-link text-danger p-0 mx-2"
                               title="Hapus">
                                <span class="fa fa-trash"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <form id="form-destroy" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>

    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet"
      href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}">
@endpush

@push('scripts')

<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script>
    $(function () {
        $('.datatable').DataTable();
    });

    function actionDestroy(url) {
        Swal.fire({
            title: 'Apakah kamu yakin ingin menghapus data ini?',
            text: 'Data yang dihapus tidak dapat dikembalikan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {

            if (result.isConfirmed) {
                $('#form-destroy')
                    .attr('action', url)
                    .submit();
            }

        });
    }
</script>

@endpush