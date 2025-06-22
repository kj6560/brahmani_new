@extends('layouts.dashboard')
@section('content')
<div class="container">
    <h2>Create New User</h2>

    {{-- Display validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- User creation form --}}
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        <input type="hidden" name="id" value="{{ isset($user) ? $user->id : '' }}"> {{-- Default to User role --}}
        {{-- Name --}}
        <div class="mb-3">
            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
            <textarea name="name" id="name" class="form-control" rows="2" required>{{ old('name', isset($user) ? $user->name : '') }}</textarea>
        </div>

        {{-- Email --}}
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ isset($user->email) ? $user->email : old('email') }}">
        </div>

        {{-- Password --}}
        <div class="mb-3">
            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
            <input type="password" name="password" id="password"  class="form-control" required>
        </div>

        {{-- User Role --}}
        <div class="mb-3">
            <label for="user_role" class="form-label">User Role</label>
            <select name="user_role" id="user_role" class="form-select">
                <option value="2" {{ old('user_role', isset($user) ? $user->user_role : '') == 2 ? 'selected' : '' }}>Admin</option>
                <option value="1" {{ old('user_role', isset($user) ? $user->user_role : '') == 1 ? 'selected' : '' }}>User</option>
            </select>
        </div>

        {{-- Submit Button --}}
        <button type="submit" class="btn btn-primary">Create User</button>
    </form>
</div>
@endsection
