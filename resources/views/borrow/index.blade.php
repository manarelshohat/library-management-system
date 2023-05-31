@extends('layouts.default')

@section('content')
    <div class="content-wrapper" style="min-height: 1302.12px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 justify-content-around">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-2 ">
                        <a href="{{ route('borrows.create') }}" class="btn btn-block btn-outline-success btn-lg">Add
                            Borrow </a>
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
                                <h3 class="card-title">Borrows Table</h3>
                            </div>

                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Registers </th>
                                            <th scope="col">Book </th>
                                            <th scope="col">Borrow Date</th>
                                            <th scope="col">Actual Return Date</th>
                                            <th scope="col">Deadline Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($borrows as $borrow)
                                            <tr>
                                                <td>{{ $borrow->id }}</td>
                                                <td>{{ $borrow->register->name }}</td>
                                                <td>{{ $borrow->book->name }}</td>
                                                <td>{{ $borrow->borrow_date }}</td>
                                                <td>{{ $borrow->actal_return_date }}</td>
                                                <td>{{ $borrow->deadline_date }}</td>


                                                <td>
                                                    <form action="{{ route('borrows.return', $borrow->id) }}"
                                                        method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('POST') }}
                                                        <button type="submit"
                                                            class="btn btn-block btn-outline-danger btn-lg">Return</button>
                                                    </form>
                                                </td>
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
