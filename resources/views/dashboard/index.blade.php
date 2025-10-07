@extends('layouts.app')

@section('content')
    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- Basic scroll table start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Basic Table Scroll</h5>
                    <small>This example shows how Scroller for DataTables can be initialised, when the Scroller Javascript
                        file is included, by
                        simply setting the scroller option to true.
                    </small>
                </div>
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="basic-scroller" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>ZIP / Post code</th>
                                    <th>Country</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic Scroll table end -->

    </div>
    <!-- [ Main Content ] end -->
@endsection
