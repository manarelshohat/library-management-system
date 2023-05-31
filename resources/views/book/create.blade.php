@extends('layouts.default')
@section('content')
    <div class="content-wrapper" style="min-height: 1345.31px;">

        <div class="row">

            <div class="col-md-12">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Books Form</h3>
                    </div>


                    <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputName">Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                    id="exampleInputName" placeholder="Enter name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="exampleInputImage">Image</label>
                                <input type="file" name="img" value="{{ old('img') }}" class="form-control"
                                    id="exampleInputImage">
                                @error('img')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="exampleInputauthor_id">Author</label>

                                <select name="author_id" id="author-dropdown" class="form-control">
                                    <option value="">-- Select Author --</option>
                                    @foreach ($authors as $author)
                                        <option @if ($author->id == old('author_id')) @selected(true) @endif
                                            value="{{ $author->id }}">
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
                                        <option @if ($category->id == old('category_id')) @selected(true) @endif
                                            value="{{ $category->id }}">
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
                                <input type="text" name="description" value="{{ old('description') }}"
                                    class="form-control" id="exampleInputDescription" placeholder="Enter description">
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="exampleInputPrice">Price</label>
                                <input type="text" name="price" value="{{ old('price') }}" class="form-control"
                                    id="exampleInputPrice" placeholder="Enter Price">
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="exampleInputRate">Rate</label>
                                <input type="text" name="rate" class="form-control" id="exampleInputRate"
                                    placeholder="Enter Rate">
                                @error('rate')
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
    @endsection
