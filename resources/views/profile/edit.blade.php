@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-white py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Pengaturan Profil</h1>
                    <p class="mt-2 text-sm text-gray-600">Kelola informasi akun dan keamanan Anda</p>
                </div>
            </div>
        </div>

        <!-- Profile Cards Container -->
        <div class="space-y-6">
            <!-- Profile Information Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="p-6">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="p-6">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="p-6">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection