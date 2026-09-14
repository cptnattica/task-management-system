@php
    $currentUser = auth()->user();
    $firstName = $currentUser?->first_name ?? '';
    $lastName = $currentUser?->last_name ?? '';
    $displayName = trim($firstName.' '.$lastName) ?: ($currentUser?->name ?? 'Guest');
    $initials = strtoupper(substr($firstName, 0, 1).substr($lastName, 0, 1)) ?: 'G';
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Taskflow — Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#f7f8fc] font-sans text-slate-900 antialiased">

    <div class="min-h-screen lg:grid lg:grid-cols-[250px_1fr]">

        {{-- Sidebar --}}
        <aside class="flex flex-col bg-[#1f2440] px-5 py-6 text-slate-300 lg:min-h-screen">

            {{-- Logo --}}
            <a
                href="{{ route('dashboard') }}"
                class="flex items-center gap-3 text-white"
            >
                <span
                    class="grid size-9 place-items-center rounded-xl bg-[#756cf1] text-lg font-bold"
                >
                    ✓
                </span>

                <span class="text-xl font-bold tracking-tight">
                    taskflow
                </span>
            </a>

            {{-- Main Navigation --}}
            <nav
                class="mt-10 space-y-1"
                aria-label="Main navigation"
            >
                <a
                    href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 rounded-xl bg-white/10 px-3 py-2.5 text-sm font-semibold text-white"
                >
                    <span>▦</span>
                    <span>Dashboard</span>
                </a>

                <a
                    href="{{ route('task') }}"
                    class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition hover:bg-white/8 hover:text-white"
                >
                    <span>✓</span>
                    <span>My tasks</span>

                    <span class="ml-auto rounded-md bg-white/10 px-1.5 py-0.5 text-xs">
                        12
                    </span>
                </a>

                <a
                    href="#projects"
                    class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition hover:bg-white/8 hover:text-white"
                >
                    <span>□</span>
                    <span>Projects</span>
                </a>

                <a
                    href="#calendar"
                    class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition hover:bg-white/8 hover:text-white"
                >
                    <span>▣</span>
                    <span>Calendar</span>
                </a>
            </nav>

            {{-- Workspace --}}
            <div class="mt-8 border-t border-white/10 pt-6">
                <p class="px-3 text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                    Workspace
                </p>

                <a
                    href="#team"
                    class="mt-3 flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium hover:bg-white/8 hover:text-white"
                >
                    <span
                        class="grid size-5 place-items-center rounded-md bg-amber-300 text-[10px] font-bold text-amber-950"
                    >
                        A
                    </span>

                    <span>Acme Studio</span>
                </a>
            </div>

            {{-- User --}}
            <div class="mt-auto flex items-center gap-3 border-t border-white/10 pt-5">
                <div
                    class="grid size-9 place-items-center rounded-full bg-gradient-to-br from-pink-300 to-violet-400 text-sm font-bold text-white"
                >
                    {{ $initials }}
                </div>

                <div>
                    <p class="text-sm font-semibold text-white">
                        {{ $displayName }}
                    </p>

                    <p class="text-xs text-slate-400">
                        Workspace member
                    </p>
                </div>

                <form method="POST" action="{{ route('logout') }}" class="ml-auto">
                    @csrf
                    <button type="submit" class="text-xs font-medium text-slate-400 transition hover:text-white">Sign out</button>
                </form>
            </div>
        </aside>

        {{-- Main Content --}}
        <main class="min-w-0 px-5 py-6 sm:px-8 lg:px-10 lg:py-8">

            {{-- Page Header --}}
@php
    $now = now()->setTimezone('Asia/Kuala_Lumpur');

    $greeting = match (true) {
        $now->hour >= 5 && $now->hour < 12 => 'Good morning',
        $now->hour >= 12 && $now->hour < 18 => 'Good afternoon',
        $now->hour >= 18 && $now->hour < 22 => 'Good evening',
        default => 'Good night',
    };
@endphp

<header class="flex flex-wrap items-center justify-between gap-4">
    <div>
        <p class="text-sm font-medium text-slate-500">
            {{ $now->format('l, F j') }}
        </p>

        <h1 class="mt-1 text-2xl font-bold tracking-tight sm:text-3xl">
            {{ $greeting }}, {{ $firstName ?: $displayName }} 👋
        </h1>
    </div>

    <div class="flex gap-2">
        <button
            type="button"
            class="rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-slate-500 shadow-sm"
        >
            ♧
        </button>

        <button
            type="button"
            class="rounded-xl bg-[#756cf1] px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-200"
        >
            ＋ New task
        </button>
    </div>
</header>



            {{-- Task Overview --}}
            <section
                class="mt-8 grid gap-4 sm:grid-cols-2 xl:grid-cols-4"
                aria-label="Task overview"
            >
                {{-- Completed Tasks --}}
                <article class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">
                    <div class="flex items-start justify-between">
                        <span class="grid size-10 place-items-center rounded-xl bg-indigo-50 text-lg text-[#756cf1]">
                            ✓
                        </span>

                        <span class="rounded-full bg-emerald-50 px-2 py-1 text-xs font-semibold text-emerald-600">
                            +12%
                        </span>
                    </div>

                    <p class="mt-5 text-3xl font-bold">
                        24
                    </p>

                    <p class="mt-1 text-sm text-slate-500">
                        Tasks completed
                    </p>
                </article>

                {{-- Tasks In Progress --}}
                <article class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">
                    <div class="flex items-start justify-between">
                        <span class="grid size-10 place-items-center rounded-xl bg-amber-50 text-lg text-amber-500">
                            ◷
                        </span>

                        <span class="rounded-full bg-rose-50 px-2 py-1 text-xs font-semibold text-rose-500">
                            +3 today
                        </span>
                    </div>

                    <p class="mt-5 text-3xl font-bold">
                        12
                    </p>

                    <p class="mt-1 text-sm text-slate-500">
                        Tasks in progress
                    </p>
                </article>

                {{-- Overdue Tasks --}}
                <article class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">
                    <div class="flex items-start justify-between">
                        <span class="grid size-10 place-items-center rounded-xl bg-rose-50 text-lg text-rose-500">
                            !
                        </span>

                        <span class="rounded-full bg-slate-100 px-2 py-1 text-xs font-semibold text-slate-500">
                            This week
                        </span>
                    </div>

                    <p class="mt-5 text-3xl font-bold">
                        5
                    </p>

                    <p class="mt-1 text-sm text-slate-500">
                        Overdue tasks
                    </p>
                </article>

                {{-- Productivity --}}
                <article class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">
                    <div class="flex items-start justify-between">
                        <span class="grid size-10 place-items-center rounded-xl bg-sky-50 text-lg text-sky-500">
                            ↗
                        </span>

                        <span class="rounded-full bg-emerald-50 px-2 py-1 text-xs font-semibold text-emerald-600">
                            On track
                        </span>
                    </div>

                    <p class="mt-5 text-3xl font-bold">
                        78%
                    </p>

                    <p class="mt-1 text-sm text-slate-500">
                        Weekly productivity
                    </p>
                </article>
            </section>

            {{-- Dashboard Content --}}
            <div class="mt-8 grid gap-6 xl:grid-cols-[minmax(0,1.55fr)_minmax(320px,.8fr)]">

                {{-- Today's Tasks --}}
                <section
                    id="my-tasks"
                    class="overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm"
                >
                    <header class="flex items-center justify-between border-b border-slate-100 px-5 py-5 sm:px-6">
                        <div>
                            <h2 class="font-bold">
                                Today’s tasks
                            </h2>

                            <p class="mt-1 text-sm text-slate-500">
                                You have 6 tasks for today
                            </p>
                        </div>

                        <a
                            href="#all-tasks"
                            class="text-sm font-semibold text-[#756cf1]"
                        >
                            View all
                        </a>
                    </header>

                    <div class="divide-y divide-slate-100">

                        {{-- Task: Review onboarding --}}
                        <div class="flex items-center gap-3 px-5 py-4 sm:px-6">
                            <button
                                type="button"
                                class="size-5 shrink-0 rounded-full border-2 border-slate-300"
                                aria-label="Complete task"
                            ></button>

                            <div class="min-w-0 grow">
                                <p class="truncate text-sm font-semibold">
                                    Review onboarding flow
                                </p>

                                <p class="mt-1 text-xs text-slate-500">
                                    Product design ·
                                    <span class="text-rose-500">
                                        Due 10:00 AM
                                    </span>
                                </p>
                            </div>

                            <span class="hidden rounded-md bg-rose-50 px-2 py-1 text-xs font-semibold text-rose-600 sm:block">
                                High
                            </span>

                            <div class="grid size-7 place-items-center rounded-full bg-pink-300 text-[9px] font-bold text-white">
                                MS
                            </div>
                        </div>

                        {{-- Task: Sprint recap --}}
                        <div class="flex items-center gap-3 px-5 py-4 sm:px-6">
                            <button
                                type="button"
                                class="grid size-5 shrink-0 place-items-center rounded-full bg-[#756cf1] text-xs text-white"
                                aria-label="Completed task"
                            >
                                ✓
                            </button>

                            <div class="min-w-0 grow">
                                <p class="truncate text-sm font-medium text-slate-400 line-through">
                                    Prepare sprint recap
                                </p>

                                <p class="mt-1 text-xs text-slate-400">
                                    Marketing · Completed
                                </p>
                            </div>

                            <span class="hidden rounded-md bg-slate-100 px-2 py-1 text-xs font-semibold text-slate-500 sm:block">
                                Medium
                            </span>

                            <div class="grid size-7 place-items-center rounded-full bg-sky-300 text-[9px] font-bold text-white">
                                JD
                            </div>
                        </div>

                        {{-- Task: Design system --}}
                        <div class="flex items-center gap-3 px-5 py-4 sm:px-6">
                            <button
                                type="button"
                                class="size-5 shrink-0 rounded-full border-2 border-slate-300"
                                aria-label="Complete task"
                            ></button>

                            <div class="min-w-0 grow">
                                <p class="truncate text-sm font-semibold">
                                    Design system check-in
                                </p>

                                <p class="mt-1 text-xs text-slate-500">
                                    Design team · Due 1:30 PM
                                </p>
                            </div>

                            <span class="hidden rounded-md bg-amber-50 px-2 py-1 text-xs font-semibold text-amber-600 sm:block">
                                Medium
                            </span>

                            <div class="grid size-7 place-items-center rounded-full bg-violet-300 text-[9px] font-bold text-white">
                                AK
                            </div>
                        </div>

                        {{-- Task: Campaign brief --}}
                        <div class="flex items-center gap-3 px-5 py-4 sm:px-6">
                            <button
                                type="button"
                                class="size-5 shrink-0 rounded-full border-2 border-slate-300"
                                aria-label="Complete task"
                            ></button>

                            <div class="min-w-0 grow">
                                <p class="truncate text-sm font-semibold">
                                    Finalize Q4 campaign brief
                                </p>

                                <p class="mt-1 text-xs text-slate-500">
                                    Marketing · Due 4:00 PM
                                </p>
                            </div>

                            <span class="hidden rounded-md bg-emerald-50 px-2 py-1 text-xs font-semibold text-emerald-600 sm:block">
                                Low
                            </span>

                            <div class="grid size-7 place-items-center rounded-full bg-emerald-300 text-[9px] font-bold text-white">
                                RB
                            </div>
                        </div>

                    </div>
                </section>

                {{-- Project Progress --}}
                <section
                    id="projects"
                    class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm sm:p-6"
                >
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="font-bold">
                                Project progress
                            </h2>

                            <p class="mt-1 text-sm text-slate-500">
                                Active projects this month
                            </p>
                        </div>

                        <button
                            type="button"
                            class="text-slate-400"
                            aria-label="Project options"
                        >
                            •••
                        </button>
                    </div>

                    <div class="mt-6 space-y-5">

                        {{-- Website Redesign --}}
                        <div>
                            <div class="flex justify-between text-sm">
                                <span class="font-semibold">
                                    Website redesign
                                </span>

                                <span class="font-semibold text-[#756cf1]">
                                    78%
                                </span>
                            </div>

                            <div class="mt-2 h-2 overflow-hidden rounded-full bg-indigo-50">
                                <div
                                    class="h-full w-[78%] rounded-full bg-[#756cf1]"
                                    role="progressbar"
                                    aria-valuenow="78"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                ></div>
                            </div>

                            <p class="mt-2 text-xs text-slate-500">
                                12 of 16 tasks completed
                            </p>
                        </div>

                        {{-- Mobile App --}}
                        <div>
                            <div class="flex justify-between text-sm">
                                <span class="font-semibold">
                                    Mobile app launch
                                </span>

                                <span class="font-semibold text-sky-500">
                                    45%
                                </span>
                            </div>

                            <div class="mt-2 h-2 overflow-hidden rounded-full bg-sky-50">
                                <div
                                    class="h-full w-[45%] rounded-full bg-sky-500"
                                    role="progressbar"
                                    aria-valuenow="45"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                ></div>
                            </div>

                            <p class="mt-2 text-xs text-slate-500">
                                9 of 20 tasks completed
                            </p>
                        </div>

                        {{-- Brand Guidelines --}}
                        <div>
                            <div class="flex justify-between text-sm">
                                <span class="font-semibold">
                                    Brand guidelines
                                </span>

                                <span class="font-semibold text-emerald-500">
                                    92%
                                </span>
                            </div>

                            <div class="mt-2 h-2 overflow-hidden rounded-full bg-emerald-50">
                                <div
                                    class="h-full w-[92%] rounded-full bg-emerald-500"
                                    role="progressbar"
                                    aria-valuenow="92"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                ></div>
                            </div>

                            <p class="mt-2 text-xs text-slate-500">
                                23 of 25 tasks completed
                            </p>
                        </div>

                    </div>
                </section>

            </div>
        </main>
    </div>

</body>
</html>
