@extends('layouts.dashboard.app')

@section('title', 'User Profile')

@section('content')
    <div class="card">
        <div class="card-header">
            User Profile
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-12">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" readonly
                            value="{{ $user->name }}">
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" readonly
                            value="{{ $user->email }}">
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            Ubah Password
                        </div>
                        <div class="card-body">
                            <form action="{{route('change-password')}}" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="new_password">New Password</label>
                                            <input type="password" name="new_password" id="new_password"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="confirm_password">Confirm New Password</label>
                                            <input type="password" name="confirm_password" id="confirm_password"
                                                class="form-control" required>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <button class="btn-primary btn">Ubah Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
@endsection

@push('plugin-css')
    <!-- swiper css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}">
@endpush

@push('plugin-script')
    <!-- swiper js -->
    <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>

    <!-- profile init js -->
    <script src="{{ asset('assets/js/pages/profile.init.js') }}"></script>
@endpush
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var newPasswordInput = document.getElementById('new_password');
        var confirmPasswordInput = document.getElementById('confirm_password');
        var form = document.querySelector('form');

        confirmPasswordInput.addEventListener('input', function () {
            var newPassword = newPasswordInput.value;
            var confirmPassword = confirmPasswordInput.value;

            if (newPassword !== confirmPassword) {
                // Jika password tidak sesuai, tambahkan pesan kesalahan
                confirmPasswordInput.setCustomValidity("Password confirmation does not match.");
            } else {
                // Jika password sesuai, hapus pesan kesalahan
                confirmPasswordInput.setCustomValidity("");
            }
        });

        form.addEventListener('submit', function (event) {
            // Cek kembali sebelum mengirim formulir
            var newPassword = newPasswordInput.value;
            var confirmPassword = confirmPasswordInput.value;

            if (newPassword !== confirmPassword) {
                // Jika password tidak sesuai, hentikan pengiriman formulir
                event.preventDefault();
                // Tampilkan pesan kesalahan atau lakukan sesuatu yang sesuai dengan kebutuhan Anda
                alert("Password confirmation does not match. Please check your passwords.");
            }
        });
    });
</script>
