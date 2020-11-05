@extends('layouts.backend.app')

@section('title', 'Create Permissions')

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
                            <li class="breadcrumb-item active">Create Roles</li>
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
                                <h3 class="card-title">Create Roles</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form role="form" action="{{ route('admin.role.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Role Title</label>
                                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Role">
                                            </div>
                                        </div>
                                            <div class="form-group col-lg-4">
                                                <label for="">Super Admin Permissions</label>
                                                <div class="col-md-12">
                                                    <div class="col-md-8">
                                                        @foreach($permissions as $permission)
                                                        @if($permission->for == 'superAdmin')
                                                    <label><input type="checkbox" name="permission[]" value="{{$permission->id}}">&nbsp;{{$permission->name}}</label>
                                                    @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                              </div>
                                              <div class="form-group col-lg-4">
                                                <label for="">Users Permissions</label>
                                                <div class="col-md-12">
                                                    <div class="col-md-8">
                                                        @foreach($permissions as $permission)
                                                        @if($permission->for == 'user')
                                                    <label><input type="checkbox" name="permission[]" value="{{$permission->id}}">&nbsp;{{$permission->name}}</label>
                                                    @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                              </div>
                                              <div class="form-group col-lg-4">
                                                <label for="">Other Permissions</label>
                                                <div class="col-md-12">
                                                    <div class="col-md-8">
                                                        @foreach($permissions as $permission)
                                                        @if($permission->for == 'other')
                                                    <label><input type="checkbox" name="permission[]" value="{{$permission->id}}">&nbsp;{{$permission->name}}</label>
                                                    @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                              </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <a href="{{route('admin.permission.index')}}" class="btn btn-danger float-right">Back</a>
                                    <button type="submit" class="btn btn-primary float-right mr-2">Submit</button>
                                </div>
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
