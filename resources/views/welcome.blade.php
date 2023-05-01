<x-main :title="__('Dashboard')">
    <div
        class="mb-4 rounded-lg bg-primary-100 px-6 py-5 text-base text-primary-600 font-semibold text-3xl"
        role="alert">
        Hello, {{Auth::user()->name}}
    </div>
</x-main>
