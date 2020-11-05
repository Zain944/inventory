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
                            <li class="breadcrumb-item active">Create User</li>
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
                                <h3 class="card-title">Create User</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form action="{{route('admin.users.store')}}" method="post">
                                @csrf
                                {{-- @method("PATCH") --}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">User Name</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="User Name" value="{{ old('name') }}">
                                          </div>
                                          <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="email" placeholder="Email">
                                          </div>

                                          <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                          </div>

                                          {{-- <div class="form-group">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="password_confirmation">
                                          </div> --}}
                                          <div class="form-group">
                                            <label for="Phone">Phone</label>
                                            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" id="phone" placeholder="Enter Your Phone Number">
                                          </div>
                                          <div class="form-group">
                                            <label for="status">Status</label>
                                            <div>
                                                <label for=""><input type="checkbox" @if (old('status') == 1)
                                                    checked
                                                    @endif value="1" name="status"> Active</label>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                              <label for="">Assign Role</label><br>
                                              @foreach($roles as $role)
                                              <input type="checkbox" name="role[]" value="{{$role->id}}">&nbsp;{{$role->name}}
                                              @endforeach
                                          </div>

                                          <div class="card-footer">
                                              <a href="{{route('admin.users.index')}}" class="btn btn-danger float-right">Back</a>
                                              <button type="submit" class="btn btn-primary float-right mr-2">Submit</button>
                                          </div>
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
