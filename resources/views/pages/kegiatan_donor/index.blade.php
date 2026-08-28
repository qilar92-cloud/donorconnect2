@extends('layouts.app')

@section('title', 'Kegiatan Donor - DonorConnect')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <h1 class="h3 mb-1 text-gray-800">Kegiatan Donor</h1>
        <p class="mb-0 text-muted">
            Kelola data kegiatan donor yang tersedia.
        </p>
    </div>

    <a href="{{ route('kegiatan-donor.create') }}" class="btn btn-primary">
        <i class="fas fa-plus-circle mr-2"></i>
        Tambah Kegiatan
    </a>
</div>


<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger">
            Data Kegiatan Donor
        </h6>
    </div>


    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}

                <button type="button"
                        class="close"
                        data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        @endif


        <div class="table-responsive">

            <table class="table table-bordered table-hover datatable">

                <thead class="thead-light">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Lokasi</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>


                <tbody>

                    @forelse($kegiatan as $item)

                        <tr>

                            <td class="text-center">
                                {{ $loop->iteration }}
                            </td>


                            <td>
                                {{ $item->nama_kegiatan }}
                            </td>


                            <td>
                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                            </td>


                            <td>
                                {{ $item->waktu }}
                            </td>


                            <td>
                                {{ $item->lokasi }}
                            </td>


                            <td class="text-center">

                                {{-- Detail --}}
                                <a href="{{ route('kegiatan-donor.show', $item->id_kegiatan) }}"
                                   class="btn btn-sm btn-info"
                                   title="Lihat Detail">

                                    <i class="fas fa-eye"></i>

                                </a>


                                {{-- Edit --}}
                                <a href="{{ route('kegiatan-donor.edit', $item->id_kegiatan) }}"
                                   class="btn btn-sm btn-warning"
                                   title="Edit">

                                    <i class="fas fa-edit"></i>

                                </a>


                                {{-- Hapus --}}
                                <button type="button"
                                        class="btn btn-sm btn-danger"
                                        title="Hapus"
                                        onclick="actionDestroy('{{ route('kegiatan-donor.destroy', $item->id_kegiatan) }}')">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6"
                                class="text-center text-muted py-4">

                                <i class="fas fa-calendar-times fa-2x mb-2"></i>

                                <br>

                                Belum ada data kegiatan donor.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Form hapus --}}
        <form id="form-destroy"
              method="POST"
              style="display: none;">

            @csrf

            @method('DELETE')

        </form>

    </div>

</div>

@endsection


@push('styles')

<link rel="stylesheet"
      href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}">

<style>

    .table th {
        vertical-align: middle;
        white-space: nowrap;
    }

    .table td {
        vertical-align: middle;
    }

    .btn-sm {
        margin: 1px;
    }

</style>

@endpush


@push('scripts')

<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>


<script>

    $(document).ready(function () {

        $('.datatable').DataTable({

            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                zeroRecords: "Data tidak ditemukan",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                infoEmpty: "Tidak ada data",
                infoFiltered: "(difilter dari _MAX_ total data)",
                paginate: {
                    first: "Awal",
                    last: "Akhir",
                    next: "Berikutnya",
                    previous: "Sebelumnya"
                }
            }

        });

    });


    function actionDestroy(url) {

        Swal.fire({

            title: 'Hapus kegiatan donor?',

            text: 'Data yang dihapus tidak dapat dikembalikan.',

            icon: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#d33',

            cancelButtonColor: '#6c757d',

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