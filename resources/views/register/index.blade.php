@extends('layouts.default')

@section('content')
    <div class="content-wrapper" style="min-height: 1302.12px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 justify-content-around">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-2 ">
                        <a href="{{ route('registers.create') }}" class="btn btn-block btn-outline-success btn-lg">Add
                            Register </a>
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
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Birthday</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Code</th>
                                            <th scope="col">Delete</th>
                                            <th scope="col">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($registers as $register)
                                            <tr>
                                                <td>{{ $register->id }}</td>
                                                <td>{{ $register->name }}</td>
                                                <td>{{ $register->email }}</td>
                                                <td>{{ $register->phone }}</td>
                                                <td>{{ $register->birthday }}</td>
                                                <td>{{ $register->gender }}</td>
                                                <td>{{ $register->address }}</td>
                                                <td>{{ $register->code }}</td>
                                                <td>
                                                    <form action="{{ route('registers.delete', $register->id) }}"
                                                        method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit"
                                                            class="btn btn-block btn-outline-danger btn-lg">Delete</button>
                                                    </form>
                                                </td>
                                                <td><a href="{{ route('registers.edit', $register->id) }}"
                                                        class="btn btn-block btn-outline-info btn-lg">Edit</td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    {{ $registers->links() }}

                                </ul>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </section>

    </div>
@endsection
