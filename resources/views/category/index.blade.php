@extends('layouts.default')

@section('content')
    <div class="content-wrapper" style="min-height: 1302.12px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 justify-content-around">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-2 ">
                        <a href="{{ route('categories.create') }}" class="btn btn-block btn-outline-success btn-lg">Add
                            Category </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Categories Table</h3>
                            </div>

                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Books'Number</th>
                                            <th scope="col">Delete</th>
                                            <th scope="col">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->books_num }}</td>

                                                <td>
                                                    <form action="{{ route('categories.delete', $category->id) }}"
                                                        method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit"
                                                            class="btn btn-block btn-outline-danger btn-lg">Delete</button>
                                                    </form>
                                                </td>
                                                <td><a href="{{ route('categories.edit', $category->id) }}"
                                                        class="btn btn-block btn-outline-info btn-lg">Edit</td>
                                            </tr>
                                        @endforeach
                                    <tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    @endsection
