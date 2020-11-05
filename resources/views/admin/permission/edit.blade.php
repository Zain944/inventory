@extends('layouts.backend.app')

@section('title', 'Create User')

@push('css')

@endpush

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 offset-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit User</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit User</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form role="form" action="{{ route('admin.permission.update',$permission->id) }}" method="post">
                                @csrf
                                @method('PATCH')

                               <div class="box-body">
                                   <div class="col-lg-12">
                                       <div class="form-group">
                                   <label for="name">Permission</label>
                                   <input type="text" class="form-control" name="name" id="name" placeholder="permission Title" value="{{ $permission->name }}">
                                 </div>
                                 <div class="form-group">
                                   <label for="name">Permission For</label>
                                   <select name="for" id="for" class="form-control">
                                       <option selected disabled value="">Select Permission</option>
                                       <option value="superadmin">Super Admin</option>
                                       <option value="user">User</option>
                                       <option value="other">Other</option>
                                   </select>
                                 </div>
                                 <div class="card-footer">
                                    <a href="{{route('admin.permission.index')}}" class="btn btn-danger float-right">Back</a>
                                    <button type="submit" class="btn btn-primary float-right mr-2">Submit</button>
                                </div>
                                   </div>
                               </div>

                               <!-- /.box-body -->
                             </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

@push('js')

@endpush
