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
                            <form action="{{route('admin.role.update',$role->id)}}" method="post">
                                @csrf
                                @method("PATCH")
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Role Title</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Role Title" value="{{$role->name}}">
                                        </div>
                                    </div>
                                          <div class="form-group col-lg-4">
                                            <label for="">Super admin</label>
                                            <div class="col-md-12">
                                                <div class="col-md-8">
                                                    @foreach($permissions as $permission)
                                                    @if($permission->for == 'superAdmin')
                                                    {{-- <div class="checkbox"> --}}
                                                      <label for="">
                                                        <input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                                                        @foreach($role->permissions as $role_permit)
                                                          @if($role_permit->id ==$permission->id)
                                                            checked
                                                          @endif
                                                        @endforeach
                                                        >&nbsp;{{ $permission->name }}
                                                      </label>
                                                    {{-- </div> --}}
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                          </div>
                                          <div class="form-group col-lg-4">
                                            <label for="">User</label>
                                            <div class="col-md-12">
                                                <div class="col-md-8">
                                                    @foreach($permissions as $permission)
                                                    @if($permission->for == 'user')
                                                    {{-- <div class="checkbox"> --}}
                                                    <label for="">
                                                        <input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                                                        @foreach($role->permissions as $role_permit)
                                                        @if($role_permit->id ==$permission->id)
                                                            checked
                                                        @endif
                                                        @endforeach
                                                        >&nbsp;{{ $permission->name }}
                                                    </label>
                                                    {{-- </div> --}}
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                          </div>
                                          <div class="form-group col-lg-4">
                                            <label for="">other</label>
                                            <div class="col-md-12">
                                                <div class="col-md-8">
                                                    @foreach($permissions as $permission)
                                                    @if($permission->for == 'other')
                                                    {{-- <div class="checkbox"> --}}
                                                    <label for="">
                                                        <input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                                                        @foreach($role->permissions as $role_permit)
                                                        @if($role_permit->id ==$permission->id)
                                                            checked
                                                        @endif
                                                        @endforeach
                                                        >&nbsp;{{ $permission->name }}
                                                    </label>
                                                    {{-- </div> --}}
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                          </div>
                                           <div class="form-group col-lg-12">
                                           {{-- @foreach($roles as $role)
                                            <div class="col-lg-4">
                                             <div class="checkbox">
                                               <label for=""><input type="checkbox" value="{{ $role->id }}" name="role[]">{{ $role->name }}</label>
                                             </div>
                                             </div>
                                           @endforeach --}}
                                          </div>

                                           <div class="form-group">
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                          <a href="{{ route('admin.role.index') }}" class="btn btn-warning">Back</a>
                                        </div>
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
