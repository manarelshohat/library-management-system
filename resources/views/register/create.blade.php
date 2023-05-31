@extends('layouts.default')
@section('content')
    <div class="content-wrapper" style="min-height: 1345.31px;">

        <div class="row">

            <div class="col-md-12">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Registration Form</h3>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('registers.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName">Full Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                    id="exampleInputName" placeholder="Enter name">

                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" value="{{ old('email') }}"class="form-control"
                                    id="exampleInputEmail1" placeholder="Enter email">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPhone">Phone</label>
                                <input type="string" name="phone" value="{{ old('phone') }}" class="form-control"
                                    id="exampleInputPhone" placeholder="Enter phone">
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="exampleInputBirthday">Birthday</label>
                                <input type="date" name="birthday" value="{{ old('birhday') }}"class="form-control"
                                    id="exampleInputBirthday" placeholder="Enter birthday">
                                @error('birthday')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="form-group">
                                <label for="exampleInputAddress">Address</label>
                                <input type="text" name="address" value="{{ old('address') }}"class="form-control"
                                    id="exampleInputAddress" placeholder="Enter address">
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="form-group">
                                <label for="exampleInputCode">Code</label>
                                <input type="integer" name="code" value="{{ old('code') }}" class="form-control"
                                    id="exampleInputCode" placeholder="Code">
                                @error('code')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">


                                <label for="gender">Gender:</label><br>
                                <input type="radio" name="gender" value="male"> Male
                                <input type="radio" name="gender" value="female"> Female <br>
                                @error('gender')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add
                                    Register</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    @endsection
