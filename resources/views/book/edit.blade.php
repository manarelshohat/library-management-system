@extends('layouts.default')
@section('content')
    <div class="content-wrapper" style="min-height: 1345.31px;">

        <div class="row">

            <div class="col-md-6">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Editing Form</h3>
                    </div>


                    <form action="{{ route('books.update', $book->id) }}" method="post" enctype="multipart/form-data">

                        @method('PUT')

                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputName">Name</label>
                                <input type="text" name="name" value="{{ old('name', $book->name) }}"
                                    class="form-control" id="exampleInputName" placeholder="Enter name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="form-group">
                                <label for="exampleInputImg">Img</label>
                                <input type="file" name="img" class="form-control" id="exampleInputImg">
                                <img src="{{ asset('img/' . $book->img) }}" alt="" width="50%" height="50%">
                                @error('img')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="exampleInputAuthor_id">Author </label>
                                <select name="author_id" id="author-dropdown" class="form-control">
                                    <option value="">-- Select Author --</option>
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}"
                                            {{ $author->id == old('author->id', $book->author->id) ? 'selected' : '' }}>
                                            {{ $author->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('author_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputCategory_id">Category </label>
                                <select name="category_id" id="category-dropdown" class="form-control">
                                    <option value="">-- Select Category --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == old('category_id', $book->category_id) ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="exampleInputDescription">Description</label>
                                <input type="text" name="description"
                                    value="{{ old('description', $book->description) }}" class="form-control"
                                    id="exampleInputName" placeholder="Enter description">
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="exampleInputPrice">Price</label>
                                <input type="text" name="price" value="{{ old('price', $book->price) }}"
                                    class="form-control" id="exampleInputPrice" placeholder="Enter Price">
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="exampleInputRate">Rate</label>
                                <input type="text" name="rate" value="{{ old('rate', $book->rate) }}"
                                    class="form-control" id="exampleInputRate" placeholder="Enter Rate">
                                @error('rate')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="exampleInputStatus">Status</label>
                                <input type="text" name="status" value="{{ old('status', $book->status) }}"
                                    class="form-control" id="exampleInputStatus" placeholder="Enter Status">
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>




                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add
                                    Book</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>

        </div>

    </div>
@endsection
