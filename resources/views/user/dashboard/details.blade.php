@extends('user.dashboard-master')
@section('title', 'My Account | Account Details')
@section('dashboard.content')
    <div class="card">
        <div class="card-header">
            <h5>Account Details</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-12">
                    <label>Name <span class="required">*</span></label>
                    <input required="" class="form-control square" value="{{$user->name}}"  name="name" type="text">
                </div>
                <div class="form-group col-md-12">
                    <label>Email Address <span class="required">*</span></label>
                    <input required="" class="form-control square" value="{{$user->email}}" name="email" type="email">
                </div>
                <div class="form-group col-md-12">
                    <label>Address <span class="required">*</span></label>
                    <input required="" class="form-control square" value="{{$user->address}}" name="address" type="text">
                </div>
                <div class="col-md-12">
                    <a  class="btn btn-fill-out submit" href="{{url('/user/profile')}}">Update</a>
                </div>
            </div>
        </div>
    </div>
@endsection
