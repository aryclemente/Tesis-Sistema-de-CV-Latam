@extends('auth.layout')

@section('content')
    <div class="min-h-screen bg-gradient-to-r from-cyan-500 to-sky-500 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div
                class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-sky-500 shadow-xl transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-6 py-10 bg-white shadow-xl sm:rounded-3xl sm:p-16">
                <form action="{{ route('verify.email') }}" method="POST">
                    @csrf
                    <div class="grid gap-8 md:grid-cols-2 mt-6">
                        <div class="w-full">
                            <label for="password" class="block mb-2 text-sm font-medium text-slate-700">Contraseña</label>
                            <div class="relative">
                                <input type="password" id="password" name="password"
                                    class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500
                                @error('password') border-red-500 @else border-slate-300 @enderror transition duration-200 ease-in-out hover:bg-gray-50"
                                    placeholder="Contraseña" />

                                <button type="button" id="togglePassword"
                                    class="absolute inset-y-0 right-3 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-md focus:outline-none focus:text-blue-600">
                                    <i id="eye-icon" class="fas fa-eye-slash"></i>
                                </button>
                            </div>

                            @error('password')
                                <small class="text-red-500 mt-2 text-sm block">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>

                        <div class="w-full">
                            <label for="password_confirmation"
                                class="block mb-2 text-sm font-medium text-slate-700">Confirmar
                                Contraseña</label>
                            <div class="relative">
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500
                                @error('password_confirmation') border-red-500 @else border-slate-300 @enderror transition duration-200 ease-in-out hover:bg-gray-50"
                                    placeholder="Repite tu contraseña" />

                                <button type="button" id="toggleConfirmPassword"
                                    class="absolute inset-y-0 right-3 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-md focus:outline-none focus:text-blue-600">
                                    <i id="eye-icon-confirm-password" class="fas fa-eye-slash"></i>
                                </button>
                            </div>

                            @error('password_confirmation')
                                <small class="text-red-500 mt-2 text-sm block">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>

            </div>

            </form>
        </div>
    </div>
    </div>
@endsection
