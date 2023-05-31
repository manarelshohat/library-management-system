@extends('layouts.default')
@section('content')
    <div class="content-wrapper" style="min-height: 1345.31px;">

        <div class="row">

            <div class="col-md-6">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Borrows Form</h3>
                    </div>


                    <form action="{{ route('borrows.store') }}" method="post">
                        <div class="card-body">

                            <div class="card-body">


                                <div class="form-group">
                                    <label for="exampleInputregister_name">Registers Name</label>
                                    <input type="text" name="register_name"
                                        value="{{ old('register_name', $borrow->register_name) }}" class="form-control"
                                        id="exampleInputregister_name" placeholder="Enter register_name">
                                    @error('register_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>


                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputBook_name">Book Id</label>
                                    <input type="text" name="book_id" value="{{ old('book_id', $borrow->book_id) }}"
                                        class="form-control" id="exampleInpuBbook_id" placeholder="Enter book_id">
                                    @error('book_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>



                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputissue_date">Borrow Date</label>
                                    <input type="date" name="borrow_date"
                                        value="{{ old('borrow_date', $borrow->borrow_date) }}" class="form-control"
                                        id="exampleInputborrow_date" placeholder="Enter borrow_date">
                                    @error('borrow_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>


                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputreturn_date">Return Date</label>
                                    <input type="date" name="return_date"
                                        value="{{ old('return_date', $borrow->return_date) }}" class="form-control"
                                        id="exampleInputreturn_date" placeholder="Enter return_date">
                                    @error('return_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Add
                                        Borrow</button>
                                </div>
                            </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection
