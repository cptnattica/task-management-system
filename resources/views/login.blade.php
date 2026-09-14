<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sign in — Taskflow</title>
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

                    <div class="mt-12">
                        <p class="text-sm font-semibold text-[#756cf1]">WELCOME BACK</p>
                        <h1 class="mt-3 text-3xl font-bold tracking-tight sm:text-4xl">Sign in to your workspace</h1>
                        <p class="mt-3 text-base leading-7 text-slate-500">Pick up where you left off and keep your work moving.</p>
                    </div>

                    <form method="POST" action="{{ route('login.store') }}" class="mt-9 grid gap-5">
                        @csrf

                        <div class="grid gap-2">
                            <label for="email" class="text-sm font-semibold text-slate-700">Email address</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required autofocus placeholder="you@company.com" class="w-full rounded-xl border px-4 py-3 text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-[#756cf1] focus:ring-4 focus:ring-indigo-100 @error('email') border-rose-400 @else border-slate-200 @enderror">
                            @error('email')
                                <p class="text-sm text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid gap-2">
                            <label for="password" class="text-sm font-semibold text-slate-700">Password</label>
                            <input id="password" name="password" type="password" autocomplete="current-password" required placeholder="Enter your password" class="w-full rounded-xl border px-4 py-3 text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-[#756cf1] focus:ring-4 focus:ring-indigo-100 @error('password') border-rose-400 @else border-slate-200 @enderror">
                            @error('password')
                                <p class="text-sm text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <label class="flex cursor-pointer items-center gap-3 text-sm text-slate-600">
                            <input name="remember" type="checkbox" value="1" class="size-4 rounded border-slate-300 text-[#756cf1] focus:ring-[#756cf1]">
                            Keep me signed in
                        </label>

                        <button type="submit" class="rounded-xl bg-[#756cf1] px-4 py-3.5 text-sm font-semibold text-white shadow-lg shadow-indigo-200 transition hover:bg-[#655bdd] focus:outline-none focus:ring-4 focus:ring-indigo-200">Sign in</button>
                    </form>

                    <p class="mt-6 text-center text-sm text-slate-500">New to Taskflow? <a href="{{ route('register') }}" class="font-semibold text-[#756cf1] hover:text-[#655bdd]">Create an account</a></p>
                    <p class="mt-8 text-center text-sm text-slate-500">Secure access to your team’s work, projects, and priorities.</p>
                </div>
            </section>

            <aside class="relative hidden overflow-hidden bg-[#1f2440] p-12 text-white lg:flex lg:flex-col lg:justify-between">
                <div class="absolute -right-24 -top-24 size-80 rounded-full bg-[#756cf1]/35 blur-3xl"></div>
                <div class="absolute -bottom-32 -left-24 size-96 rounded-full bg-sky-400/15 blur-3xl"></div>

                <div class="relative max-w-md">
                    <span class="inline-flex rounded-full border border-white/15 bg-white/10 px-3 py-1 text-xs font-semibold tracking-wide text-indigo-100">YOUR WORK, IN FLOW</span>
                    <h2 class="mt-7 text-4xl font-bold leading-tight tracking-tight">Clarity for every task that matters.</h2>
                    <p class="mt-5 text-lg leading-8 text-slate-300">Plan your day, align your team, and make steady progress on the work that moves things forward.</p>
                </div>

                <figure class="relative rounded-3xl border border-white/10 bg-white/10 p-6 shadow-2xl backdrop-blur-sm">
                    <div class="flex items-center gap-4">
                        <div class="grid size-11 place-items-center rounded-2xl bg-emerald-400 text-lg font-bold text-emerald-950">✓</div>
                        <div>
                            <p class="font-semibold">Your day is on track</p>
                            <p class="mt-1 text-sm text-slate-300">8 of 10 tasks completed this week</p>
                        </div>
                    </div>
                    <div class="mt-6 h-2 overflow-hidden rounded-full bg-white/15"><div class="h-full w-4/5 rounded-full bg-emerald-400"></div></div>
                    <figcaption class="mt-6 flex items-center gap-3 text-sm text-slate-300">
                        <span class="grid size-8 place-items-center rounded-full bg-gradient-to-br from-pink-300 to-violet-400 text-xs font-bold text-white">JD</span>
                        “Taskflow keeps our team focused.”
                    </figcaption>
                </figure>
            </aside>
        </main>
    </body>
</html>
