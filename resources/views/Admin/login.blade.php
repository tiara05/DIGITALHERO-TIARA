@extends('Layout.main')

@section('content')
<div class="container d-flex justify-content-center align-items-center mt-4">
    <div class="card p-4 shadow" style="width: 400px;">
        <h3 class="text-center mb-4">Admin Login</h3>
        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</div>
@endsection
