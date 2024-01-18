@extends('layouts.nav')
@section('content')
    <h3>Data Student</h3>
    <div class="card">
        <div class="card-header">

            <a class="btn btn-primary mb-2" href="{{ route('students.create') }}">
                <i class="fas fa-plus-circle"></i> Add Student
            </a>
        </div>
        <div class="card-body">
            <table class="table table-sm table-striped table-bordered pd-2 text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nim</th>
                        <th>Fullname</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>Email Address</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row['nim'] }}</td>
                            <td>{{ $row['fullname'] }}</td>
                            <td>{{ $row['address'] }}</td>
                            <td>{{ $row['gender' == 'M'] ? 'Female' : 'Male' }}</td>
                            <td>{{ $row['emailaddress'] }}</td>
                            <td>{{ $row['phone'] }}</td>
                            <td>
                                <a href="{{ route('students.edit', $row['nim']) }}" class="btn btn-warning"><i
                                        class="fas fa-edit"></i></a> |
                                <form action="{{ route('students.destroy', $row['nim']) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete?')"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
@endsection
