@extends('layout.header')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content mt-5" >
        <div class="container-fluid">
            <!-- left column -->
            <!-- /resources/views/post/create.blade.php -->


            @if ($errors->any())
            <!-- <div class="alert alert-danger"> -->
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <!-- </div> -->

            @endif
            <div class="row">
                <!-- Create Post Form -->
                <div class="col-md-6 offset-md-3">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit User</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('/user_update')}}" method='post' id="add_form_data"
                            data-parsley-validate>
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="hidden" name="hdnID" value='{{$user[0]->id}}'>
                                    <input type="text" class="form-control" id="name"
                                        placeholder="Enter user name" name='name'
                                        data-parsley-required-message="Please enter  name" required="" value='{{$user[0]->name}}'>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="exampleInputPassword1">Slug</label>
                                    <input type="text" class="form-control" id="slugs" placeholder="Enter slug"
                                        name='slugs' data-parsley-required-message="Please enter slug" required="">
                                </div> -->

                                <!-- <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name='status'>
                                    <label class="form-check-label" for="exampleCheck1">Status</label>
                                </div> -->
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
@endsection