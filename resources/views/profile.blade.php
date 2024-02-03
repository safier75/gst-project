@extends('layout.app')

@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title font-weight-bold"> User Profile </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!--Include alert file-->
                    @include('include.alert')

                    <h4 class="header-title text-uppercase">User Profile Info</h4>
                    <hr>
                    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        <img src="assets/images/users/{{ Session::get('image') }}">
        @endif

                    <form action="{{ route('update_profile',$user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>User Name</label>
                                    <input type="name" name="name" class="form-control border-bottom" id="validationCustom02" value="{{$user->name}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Please Select Profile Picture</label>
                                    <input type="file" name="image" class="form-control border-bottom" id="validationCustom02">
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                          
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <h4 class="header-title text-uppercase">Profile Details</h4>
                                <hr>
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{$user->email}}" class="form-control border-bottom" id="validationCustom02">
                                </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Mobile</label>
                                    <input type="integer" name="mobile" value="8745088888" class="form-control border-bottom" id="validationCustom02">
                                </div>
                        </div>
                        </div>
                  

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="declaration" class="form-control border-bottom" id="validationCustom05" placeholder="Declaration">
                                </div>

                                <button type="submit" class="btn btn-primary float-right mb-2">UPDATE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
