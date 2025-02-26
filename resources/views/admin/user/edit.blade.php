@extends('layout_admin.index')

@section('content')
    <main id="main" class="main">
        <h1 class="mb-4">Edit Pengguna</h1>

        <form action="{{ route('users.update', $user->id) }}" method="POST" class="container">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama:</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" required>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Role:</label>
                <select name="role" class="form-control" id="role" required>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password (Kosongkan jika tidak diubah):</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary ms-2">Kembali</a>
        </form>
    </main>
@endsection
