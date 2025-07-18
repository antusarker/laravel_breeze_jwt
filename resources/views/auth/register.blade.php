@extends('layouts.guestLayout')
@section('title', 'Registration')
@section('content')
<div class="authincation-content">
    <div class="row no-gutters">
        <div class="col-xl-12">
            <div class="auth-form">
                <h4 class="text-center mb-4">User registration</h4>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label><strong>User Type *</strong></label>
                        <select id="inputState" class="form-control" name="role_id">
                            <option selected="" disabled>Choose...</option>
                            <option value="2">Employer</option>
                        </select>
                        @error('role_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label><strong>Name *</strong></label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                        
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label><strong>Email *</strong></label>
                        <input type="email" class="form-control" name="email" value="{{old('email')}}">
                    
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label><strong>Password *</strong></label>
                        <input type="password" class="form-control" value="" name="password">
                        
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label><strong>Confirm Password *</strong></label>
                        <input type="password" class="form-control" value="" name="password_confirmation">
                        
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                </form>
                <div class="new-account mt-3">
                    <p>Don't have an account? <a class="text-primary" href="{{route('login')}}">Already registered</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
