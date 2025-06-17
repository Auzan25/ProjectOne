<div>    
    <flux:heading size="xl" level="1">{{ __('Inscription Clients') }}</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __('Gérer tous vos Clients') }}</flux:subheading>
    <flux:separator variant="subtle" class="mb-3" />

    <div class="flex justify-end mr-0 py-3 px-4 lg:px-12">
        {{-- <a href="user-create" wire:navigate.hover class="text-indigo-500 hover:text-indigo-700">Create</a> --}}
        <flux:button
            :href="route('admin.customer-actions')" wire:navigate icon-trailing="plus" class="bg-blue-600! text-white! hover:bg-blue-700!"
        >
            Nouvelle Inscription
        </flux:button>
    </div>

    <section class="mt-1">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex items-center justify-between d p-4">
                    <div class="flex">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input  type="text" wire:model.live="search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                                placeholder="Search" required="">
                        </div>
                    </div>
                    {{-- <div class="flex space-x-3">
                        <div class="flex space-x-3 items-center">
                            <label class="w-40 text-sm font-medium text-gray-900">User Type :</label>
                            <select 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="">All</option>
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                    </div> --}}
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-3">Nom</th>
                                <th scope="col" class="px-4 py-3">Prénom(s)</th>
                                <th scope="col" class="px-4 py-3">email</th>
                                <th scope="col" class="px-4 py-3">Téléphone</th>
                                <th scope="col" class="px-4 py-3">Date de création</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($customers as $customer)
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $customer->lastname }}
                                    </th>
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $customer->firstname }}
                                    </th>
                                    <td class="px-4 py-3">{{ $customer->email ? $customer->email : 'non renseigné' }}</td>
                                    <td class="px-4 py-3 text-green-500">
                                        <!-- Formatage du numéro de téléphone -->
                                        {{-- @php
                                            $formattedNumber = substr($customer->mobile_phone, 0, 4) . ' ' . substr($customer->mobile_phone, 4, 2) . ' ' . substr($customer->mobile_phone, 6, 3) . ' ' . substr($customer->mobile_phone, 9, 2) . ' ' . substr($customer->mobile_phone, 11);
                                        @endphp --}}
                                        <!-- Explications détaillées -->
                                        @php
                                            // On prend les 4 premiers caractères du numéro (+221)
                                            $part1 = substr($customer->mobile_phone, 0, 4); // Résultat: "+221"
                                            
                                            // On prend les 2 caractères suivants (77) à partir de la position 4
                                            $part2 = substr($customer->mobile_phone, 4, 2); // Résultat: "77"
                                            
                                            // On prend les 3 caractères suivants (777) à partir de la position 6
                                            $part3 = substr($customer->mobile_phone, 6, 3); // Résultat: "777"
                                            
                                            // On prend les 2 caractères suivants (77) à partir de la position 9
                                            $part4 = substr($customer->mobile_phone, 9, 2); // Résultat: "77"
                                            
                                            // On prend le reste du numéro (77) à partir de la position 11
                                            $part5 = substr($customer->mobile_phone, 11); // Résultat: "77"
                                            
                                            // On assemble toutes les parties avec des espaces entre elles
                                            $formattedNumber = $part1.' '.$part2.' '.$part3.' '.$part4.' '.$part5;
                                            // Résultat final: "+221 77 777 77 77"
                                        @endphp

                                        {{-- {{ $customer->mobile_phone }}</td> --}}
                                        {{ $formattedNumber }} <!-- Affiche le numéro formaté -->
                                    <td class="px-4 py-3">{{ \Carbon\Carbon::parse($customer->created_at)->format('d-m-Y H:i:s') }}</td>
                                    <td class="px-4 py-3 flex items-center justify-end">
                                        <flux:button :href="route('admin.customer.show', $customer->id)" wire:navigate icon-trailing="eye" size="xs"
                                            class="bg-blue-600! text-white! hover:bg-blue-700!" title="voir"></flux:button>
                                        {{-- <button class="px-3 py-1 bg-red-500 text-white rounded">X</button> --}}
                                    </td>
                                </tr>
                            @empty
                                <tr class="border-b dark:border-gray-700">
                                    <span>Aucun enregistrement.</span>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>

                <div class="py-4 px-3">
                    <div class="flex ">
                        <div class="flex space-x-4 items-center mb-3">
                            <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                            <select
                                wire:model.live="perPage"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                    {{ $customers->links() }}
                </div>
            </div>
        </div>
    </section>

</div>