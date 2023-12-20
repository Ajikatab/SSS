@extends('user.layouts.main')

@section('container')
    <h1 class="font-semibold text-1x">Profile Update</h1>
    <div class="flex">
        <div class="w-full lg:w-1/2"></div>
        <div class="bg-white p-6 rounded-lg shadow-md w-1/2">
        @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="post">
                @method('PUT')
                @csrf

                <!-- Bagian Edit Username -->
                <div class="mb-4">
                    <label for="username" class="block text-gray-700">Username:</label>
                    <input type="text" id="username" name="username" value="{{ old('username') }}" class="form-input mt-1 block w-full" />
                </div>

                <!-- Bagian Edit Password -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password:</label>
                    <input type="password" id="password" name="password" class="form-input mt-1 block w-full" />
                </div>

                <!-- Tombol submit -->
                <div>
                    <button type="submit" class="bg-white-500 text-black px-4 py-2 rounded">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
@endsection
