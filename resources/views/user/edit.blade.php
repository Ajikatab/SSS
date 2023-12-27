@extends('user.layouts.main')

@section('container')
    <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100vh;">
        <div style="max-width: 800px; width: 100%; padding: 2rem; box-sizing: border-box;">
            <h1 style="font-weight: 600; font-size: 1.5rem; margin-bottom: 1rem; text-align: center;">Profile Update</h1>
            @if (session('success'))
                <div
                    style="padding: 1rem; border: 1px solid #d1d5db; border-radius: 0.375rem; background-color: #f0fff4; color: #00a854; text-align: center;">
                    <strong>Success!</strong> {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="post"
                style="display: flex; flex-direction: column; gap: 1rem;">
                @method('PUT')
                @csrf

                <!-- Bagian Edit Username -->
                <div>
                    <label for="username"
                        style="color: #374151; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.5rem;">Username:</label>
                    <input type="text" id="username" name="username" value="{{ old('username') }}"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.375rem;">
                </div>

                <!-- Bagian Edit Password -->
                <div>
                    <label for="password"
                        style="color: #374151; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.5rem;">Password:</label>
                    <input type="password" id="password" name="password"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.375rem;">
                </div>

                <!-- Tombol submit -->
                <div>
                    <button type="submit"
                        style="background-color: #ffffff; color: #000000; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.375rem; cursor: pointer;">Update
                        Profile</button>
                </div>
            </form>
        </div>
    </div>
@endsection
