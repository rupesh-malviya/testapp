@extends('layout.header')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 mt-3">
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Company-user-list</h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-bordered data-table">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Company Name</th>
                                        <th>User Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($comanduser as $key => $value)
                                        <tr>
                                            <th>{{$key+1}}</th>
                                            <th>{{$value->company->name}}</th>
                                            <th>{{$value->user->name}}</th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection