@extends('layouts.default')
@section('content')
    <div class="content-wrapper" style="min-height: 1345.31px;">

        <div class="row">

            <div class="col-md-6">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Authors Form</h3>
                    </div>


                    <form action="{{ route('authors.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputName">Full Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                    id="exampleInputName" placeholder="Enter name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="exampleInputImage">Image</label>
                                <input type="file" name="img" value="{{ old('image') }}" class="form-control">
                                @error('img')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputBrief">Brief</label>
                                <input type="text" name="brief" value="{{ old('brief') }}" class="form-control"
                                    id="exampleInputBrief" placeholder="Brief">
                                @error('brief')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>




                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add
                                    Author</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection
