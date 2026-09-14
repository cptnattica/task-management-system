<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Create an account — Taskflow</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-[#f7f8fc] font-sans text-slate-900 antialiased">
        <main class="min-h-screen lg:grid lg:grid-cols-2">
            <section class="flex items-center justify-center px-5 py-12 sm:px-8 lg:px-16 xl:px-24">
                <div class="w-full max-w-md">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-3 text-[#1f2440]">
                        <span class="grid size-10 place-items-center rounded-xl bg-[#756cf1] text-xl font-bold text-white">✓</span>
                        <span class="text-xl font-bold tracking-tight">taskflow</span>
                    </a>

                    <div class="mt-10">
                        <p class="text-sm font-semibold text-[#756cf1]">GET STARTED</p>
                        <h1 class="mt-3 text-3xl font-bold tracking-tight sm:text-4xl">Create your workspace</h1>
                        <p class="mt-3 text-base leading-7 text-slate-500">Bring your plans, projects, and people into one focused place.</p>
                    </div>

                    <form method="POST" action="{{ route('register.store') }}" class="mt-8 grid gap-5">
                        @csrf

                        <div class="grid gap-2 sm:grid-cols-2 sm:gap-4">
                            <div class="grid gap-2">
                                <label for="first_name" class="text-sm font-semibold text-slate-700">First name</label>
                                <input id="first_name" name="first_name" type="text" value="{{ old('first_name') }}" autocomplete="given-name" required autofocus placeholder="Jordan" class="w-full rounded-xl border px-4 py-3 text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-[#756cf1] focus:ring-4 focus:ring-indigo-100 @error('first_name') border-rose-400 @else border-slate-200 @enderror">
                                @error('first_name')
                                    <p class="text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid gap-2">
                                <label for="last_name" class="text-sm font-semibold text-slate-700">Last name</label>
                                <input id="last_name" name="last_name" type="text" value="{{ old('last_name') }}" autocomplete="family-name" required placeholder="Davis" class="w-full rounded-xl border px-4 py-3 text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-[#756cf1] focus:ring-4 focus:ring-indigo-100 @error('last_name') border-rose-400 @else border-slate-200 @enderror">
                                @error('last_name')
                                    <p class="text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid gap-2">
                            <label for="email" class="text-sm font-semibold text-slate-700">Work email</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required placeholder="you@company.com" class="w-full rounded-xl border px-4 py-3 text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-[#756cf1] focus:ring-4 focus:ring-indigo-100 @error('email') border-rose-400 @else border-slate-200 @enderror">
                            @error('email')
                                <p class="text-sm text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid gap-2">
                            <label for="password" class="text-sm font-semibold text-slate-700">Password</label>
                            <input id="password" name="password" type="password" autocomplete="new-password" required placeholder="At least 8 characters" class="w-full rounded-xl border px-4 py-3 text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-[#756cf1] focus:ring-4 focus:ring-indigo-100 @error('password') border-rose-400 @else border-slate-200 @enderror">
                            @error('password')
                                <p class="text-sm text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid gap-2">
                            <label for="password_confirmation" class="text-sm font-semibold text-slate-700">Confirm password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required placeholder="Repeat your password" class="w-full rounded-xl border border-slate-200 px-4 py-3 text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-[#756cf1] focus:ring-4 focus:ring-indigo-100">
                        </div>

                        <button type="submit" class="rounded-xl bg-[#756cf1] px-4 py-3.5 text-sm font-semibold text-white shadow-lg shadow-indigo-200 transition hover:bg-[#655bdd] focus:outline-none focus:ring-4 focus:ring-indigo-200">Create account</button>
                    </form>

                    <p class="mt-6 text-center text-sm text-slate-500">Already have an account? <a href="{{ route('login') }}" class="font-semibold text-[#756cf1] hover:text-[#655bdd]">Sign in</a></p>
                </div>
            </section>

            <aside class="relative hidden overflow-hidden bg-[#1f2440] p-12 text-white lg:flex lg:flex-col lg:justify-between">
                <div class="absolute -left-24 -top-24 size-80 rounded-full bg-[#756cf1]/35 blur-3xl"></div>
                <div class="absolute -bottom-32 -right-24 size-96 rounded-full bg-sky-400/15 blur-3xl"></div>

                <div class="relative max-w-md">
                    <span class="inline-flex rounded-full border border-white/15 bg-white/10 px-3 py-1 text-xs font-semibold tracking-wide text-indigo-100">START WITH CLARITY</span>
                    <h2 class="mt-7 text-4xl font-bold leading-tight tracking-tight">Make room for meaningful progress.</h2>
                    <p class="mt-5 text-lg leading-8 text-slate-300">From your first task to your next big launch, Taskflow helps every detail stay visible and moving.</p>
                </div>

                <div class="relative grid gap-4 sm:grid-cols-2">
                    <div class="rounded-3xl border border-white/10 bg-white/10 p-5 backdrop-blur-sm">
                        <p class="text-3xl font-bold text-emerald-300">10k+</p>
                        <p class="mt-2 text-sm leading-6 text-slate-300">tasks completed by focused teams</p>
                    </div>
                    <div class="rounded-3xl border border-white/10 bg-white/10 p-5 backdrop-blur-sm">
                        <p class="text-3xl font-bold text-indigo-200">1 place</p>
                        <p class="mt-2 text-sm leading-6 text-slate-300">for plans, progress, and priorities</p>
                    </div>
                </div>
            </aside>
        </main>
    </body>
</html>
