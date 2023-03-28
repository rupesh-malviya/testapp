@extends('layout.header')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 mt-3">
                    <!-- <h3>User-list</h3> -->
                    <a href="{{route('/adduser')}}" class='btn btn-sm btn-success'>Add User</a>
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
                            <h3 class="card-title">All Users-list</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-bordered data-table">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user as $key => $value)
                                        <tr>
                                            <th>{{$key+1}}</th>
                                            <th>{{$value->name}}</th>
                                            <th><a href="{{url('user_edit/'.$value->id)}}" class='btn btn-sm btn-warning'>Edit</a></th>
                                            <th><a href="{{url('user_delete/'.$value->id)}}" class='btn btn-sm btn-danger'>Delete</a></th>
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