<x-main :title="__('Tasks list')">
    <div class="flex flex-col p-5">
        <x-table :fields="$table['fields']" :actions="$table['actions']" :rows="$tasks" :model="'tasks'"/>
    </div>
</x-main>
