<x-main :title="__('Users list')">
    <div class="flex flex-col p-5">
        <x-filter/>
        <x-table :fields="$table['fields']" :actions="$table['actions']" :rows="$users" :model="'users'"/>
    </div>
</x-main>
