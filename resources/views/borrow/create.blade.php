@extends('layouts.default')
@section('content')
    <div class="content-wrapper" style="min-height: 1345.31px;">

        <div class="row">

            <div class="col-md-12">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Borrows Form</h3>
                    </div>


                    <form action="{{ route('borrows.store') }}" method="post">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputregister_name">Registers </label>

                                <select name="register_id" id="register-dropdown" class="form-control">
                                    <option value="">-- Select Register --</option>
                                    @foreach ($registers as $register)
                                        <option @if ($register->id == old('register_id')) @selected(true) @endif
                                            value="{{ $register->id }}">
                                            {{ $register->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('register_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>


                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputbook_name">Books</label>
                                <select name="book_id" id="book-dropdown" class="form-control">
                                    <option value="">-- Select Book --</option>
                                    @foreach ($books as $book)
                                        <option @if ($book->id == old('book_id')) @selected(true) @endif
                                            value="{{ $book->id }}"> {{ $book->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('book_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>



                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputdeadline_date">Deadline Date</label>
                                <input type="date" name="deadline_date" value="{{ old('deadline_date') }}"
                                    class="form-control" id="exampleInputdeadline_date" placeholder="Enter deadline_date">
                                @error('deadline_date')
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
