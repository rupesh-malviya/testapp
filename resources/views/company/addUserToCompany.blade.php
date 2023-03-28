@extends('layout.header')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 mt-3">
                    <h3>Add user to company</h3>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content mt-5">
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
                <div class="col-md-12">
                    <form action="{{route('add_user_to_company')}}" method="post">
                        <input type="hidden" name="company_id" value='{{$company_id}}'>
                        @csrf
                        <table>
                            <tbody>
                                @foreach($users as $key => $usersValue)
                                <tr>
                                    <td>
                                        <input type="hidden" name="hdn_user_id[{{$key}}]" value='{{$usersValue->id}}'>
                                        <input type="checkbox" name="chk[{{$key}}]">
                                    </td>
                                    <td>{{$usersValue->name}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <button class='btn btn-success btn-sm mt-3'>Save</button>
                    </form>
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