@extends('layouts.default')

@section('content')
    <div class="content-wrapper" style="min-height: 1302.12px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 justify-content-around">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-2 ">
                        <a href="{{ route('authors.create') }}" class="btn btn-block btn-outline-success btn-lg">Add
                            Author </a>
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
                                <h3 class="card-title">Registers Table</h3>
                            </div>

                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Brief</th>
                                            <th scope="col">Delete</th>
                                            <th scope="col">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($authors as $author)
                                            <tr>
                                                <td>{{ $author->id }}</td>
                                                <td>{{ $author->name }}</td>
                                                <td> <img src="{{ asset('img/' . $author->img) }}" alt=""
                                                        width="50%" height="50%"></td>
                                                <td>{{ $author->brief }}</td>

                                                <td>
                                                    <form action="{{ route('authors.delete', $author->id) }}"
                                                        method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit"
                                                            class="btn btn-block btn-outline-danger btn-lg">Delete</button>
                                                    </form>
                                                </td>
                                                <td><a href="{{ route('authors.edit', $author->id) }}"
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
