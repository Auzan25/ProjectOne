<div>
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Gestion des Rôles & Permissions') }}
    </h2>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-gray-100">Création & Attribution de Roles & Permissions</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <a href="#" wire:navigate.hover class="p-6 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                        <div class="flex justify-between items-start">
                            <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white">Gestion des Rôles</h3>
                            <span class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-100 text-xs font-semibold px-2.5 py-0.5 rounded-full">{{ $roleCount }}</span>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300">Créer, modifier et gérer les rôles dans votre application.</p>
                    </a>
                    
                    <a href="#" wire:navigate class="p-6 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                        <div class="flex justify-between items-start">
                            <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white">Gestion des Permissions</h3>
                            <span class="bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-100 text-xs font-semibold px-2.5 py-0.5 rounded-full">{{ $permissionCount }}</span>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300">Définir et organiser les permissions pour diverses actions.</p>
                    </a>
                    
                    <a href="#" wire:navigate class="p-6 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                        <div class="flex justify-between items-start">
                            <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white">Attribution de Rôle Utilisateur</h3>
                            <span class="bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-100 text-xs font-semibold px-2.5 py-0.5 rounded-full">{{ $userCount }}</span>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300">Affecter des rôles aux utilisateurs et contrôler leurs accès.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>