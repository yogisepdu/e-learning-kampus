@extends('layouts.app')
@section('title', 'Materi')
@section('content')
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard/index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">DataTable</a></li>
                        <li class="breadcrumb-item" aria-current="page">{{ $title }}</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">{{ $title }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->

    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- Zero config table start -->
        <div class="col-sm-12">
            <div class="card">
                <div class=" d-flex flex-wrap gap-2 justify-content-between align-items-center">
                    <div class="card-header ">
                        <h5>{{ $title }}</h5>
                        <small>{{ $description }}</small>
                    </div>
                    <!-- [ link-button ] start -->
                    <div class="card-header">
                        <a class="btn btn-primary" role="button" href="{{ route('materials.create') }}">Create
                            Course</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Mata Kuliah</th>
                                    <th>Judul Materi</th>
                                    <th>File Materi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($materi as $data)
                                    <tr>
                                        {{-- <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->description }}</td>
                                        <td class="text-wrap card-body pc-component">
                                            <a type="button" class="btn btn-light-primary"
                                                href="{{ route('courses.edit', $data->id) }}">Edit</a>
                                            <form action="{{ route('courses.destroy', $data->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-light-danger">Hapus</button>
                                            </form>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Mata Kuliah</th>
                                    <th>Judul Materi</th>
                                    <th>File Materi</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Zero config table end -->
    </div>
    <!-- [ Main Content ] end -->
@endsection

@section('script')
    <!-- [Page Specific JS] start -->
    <!-- datatable Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        // [ Zero Configuration ] start
        $('#simpletable').DataTable();

        // [ Default Ordering ] start
        $('#order-table').DataTable({
            order: [
                [3, 'desc']
            ]
        });

        // [ Multi-Column Ordering ]
        $('#multi-colum-dt').DataTable({
            columnDefs: [{
                    targets: [0],
                    orderData: [0, 1]
                },
                {
                    targets: [1],
                    orderData: [1, 0]
                },
                {
                    targets: [4],
                    orderData: [4, 0]
                }
            ]
        });

        // [ Complex Headers ]
        $('#complex-dt').DataTable();

        // [ DOM Positioning ]
        $('#DOM-dt').DataTable({
            dom: '<"top"i>rt<"bottom"flp><"clear">'
        });

        // [ Alternative Pagination ]
        $('#alt-pg-dt').DataTable({
            pagingType: 'full_numbers'
        });

        // [ Scroll - Vertical ]
        $('#scr-vrt-dt').DataTable({
            scrollY: '200px',
            scrollCollapse: true,
            paging: false
        });

        // [ Scroll - Vertical, Dynamic Height ]
        $('#scr-vtr-dynamic').DataTable({
            scrollY: '50vh',
            scrollCollapse: true,
            paging: false
        });

        // [ Language - Comma Decimal Place ]
        $('#lang-dt').DataTable({
            language: {
                decimal: ',',
                thousands: '.'
            }
        });
    </script>
    <!-- [Page Specific JS] end -->
@endsection
