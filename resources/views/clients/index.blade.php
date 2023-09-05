<x-main :title="__('Clients list')">
    <div class="flex flex-col p-5">
        <x-filter/>
        <x-table :actions="$table['actions']" :fields="$table['fields']" :rows="$clients" :model="'clients'" />
    </div>
</x-main>
