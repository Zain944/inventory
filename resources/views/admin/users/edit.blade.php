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
                            <form role="form" action="{{ route('admin.users.update',$user->id) }}" method="post">
                                @csrf
                                @method('PUT')

                               <div class="box-body">
                                   <div class="col-lg-12">

                                   <div class="form-group">
                                   <label for="name">Name</label>
                                   <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name" value=" @if(old('name')){{old('name')}}@else{{ $user->name }}@endif">
                                 </div>

                                 <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email" value="@if(old('email')){{old('email')}}@else{{ $user->email }}@endif">
                                  </div>

                                 <div class="form-group">
                                   <label for="phone">Phone</label>
                                   <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone here" value="@if(old('name')){{old('phone')}}@else{{ $user->phone }}@endif">
                                 </div>
                                  <div class="form-group">
                                   {{-- <label for="status">Status</label> --}}
                                   {{-- <div class="checkbox"> --}}
                                     <label ><input type="checkbox" name="status"
                                     @if (old('status')==1 || $user->status == 1)
                                       checked
                                     @endif value="1"> &nbsp; Status</label>
                                   {{-- </div> --}}
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-12">
                                         <label for="">Assign Role</label><br>
                                        @foreach ($roles as $role)
                                            <label ><input type="checkbox" name="role[]" value="{{ $role->id }}"
                                            @foreach ($user->roles as $user_role)
                                              @if ($user_role->id == $role->id)
                                                checked
                                              @endif
                                            @endforeach> {{ $role->name }}</label>
                                            @endforeach
                                        </div>
                                  </div>


                                  <div class="card-footer">
                                    {{-- <button type="submit" class="btn btn-danger float-right">Back</button> --}}
                                  <a href="{{route('admin.users.index')}}" class="btn btn-danger float-right">Back</a>
                                    <button type="submit" class="btn btn-primary float-right mr-2">Submit</button>
                                </div>
                                   </div>


                               </div>

                               <!-- /.box-body -->




                             </form>                        </div>
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
