<x-main :title="__('Project list')">
    <div class="flex flex-col p-5">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <x-table :actions="$table['actions']" :fields="$table['fields']" :rows="$projects" :model="'projects'" />
        </div>
    </div>
</x-main>
