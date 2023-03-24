@extends('layouts.app')
@section('title', 'User Profile ')

@section('content')
    <div class="py-5 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h4>User Profile</h4>
                    <div class="underline mb-4"></div>
                </div>
                <div class="col-md-10">
                    <div class="card-shadow">
                        @if(session('mesage'))
                            <p class="alert alert-success">{{session('message')}}</p>
                        @endif
                           @if($errors->any())
                            <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li class="text-danger">{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif

                        <div class="car-header bg-primary">
                            <h4 class="mb-0 text-white">User Details</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('user.profile')}}" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Username</label>
                                            <input type="text" name="name" value="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Email Address</label>
                                            <input type="text"  value="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Phone  Number</label>
                                            <input type="text" name="phone" value="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label> Zip/Pin Code</label>
                                            <input type="text" name="zip_code" value="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Address</label>
                                            <textarea type="text" name="address" value="" class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Save Data</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
