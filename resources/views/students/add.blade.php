@extends('layouts.nav')
@section('content')
    <div class="card">
        <h5 class="card-header">Add Data Students</h5>
        <div class="card-body">
            <form method="POST" action="{{ route('students.store') }}">
                @csrf

                <div class="mb-2">
                    <label for="nim" class="form-label">Nim</label>
                    <input type="text" class="form-control" name="nim" id="nim" aria-describedby="emailHelp">
                </div>
                <div class="mb-2 ">
                    <label for="fullname" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="fullname" id="fullname" aria-describedby="emailHelp">
                </div>
                <div class="mb-2 ">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" id="address" aria-describedby="emailHelp">
                </div>
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" name="gender" id="gender" aria-label="Default select example">
                    <option selected>======</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                </select>
                <div class="mb-2">
                    <label for="emailaddress" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="emailaddress" id="emailaddress"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-2">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="phone" id="phone" aria-describedby="emailHelp">
                </div>
                <a href="{{ route('students.index') }}" class="btn btn-danger"> Batal</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
