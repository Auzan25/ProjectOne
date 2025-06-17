<div>

    <!-- resources/views/faq/index.blade.php -->
    <div class="py-12 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <!-- En-tête animé -->
        <div class="text-center mb-16 animate-fade-in">
            <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white sm:text-5xl sm:tracking-tight lg:text-6xl">
                Foire aux Questions
            </h1>
            <p class="mt-5 max-w-xl mx-auto text-xl text-gray-500 dark:text-gray-300">
                Trouvez rapidement des réponses à vos questions sur le CRM Auchan
            </p>
        </div>

        <!-- Conteneur des FAQ -->
        <div class="max-w-3xl mx-auto space-y-6">
            <!-- FAQ pour les clients -->
            <div class="bg-white dark:bg-zinc-800 rounded-2xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl">
                <div class="p-6 bg-gradient-to-r from-blue-600 to-blue-500">
                    <h2 class="text-2xl font-bold text-white">Questions Clients</h2>
                </div>
                
                <div class="divide-y divide-gray-200 dark:divide-zinc-700">
                    <!-- Question 1 -->
                    <div x-data="{ open: false }" class="transition-all duration-200">
                        <button @click="open = !open" class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 dark:hover:bg-zinc-700 transition-colors">
                            <span class="text-lg font-medium text-gray-900 dark:text-white">Comment accéder à mon espace client ?</span>
                            <svg :class="{ 'rotate-180': open }" class="w-5 h-5 text-blue-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-4 text-gray-600 dark:text-gray-300">
                            <p>Pour accéder à votre espace client :</p>
                            <ul class="list-disc pl-5 mt-2 space-y-1">
                                <li>Rendez-vous sur le portail client Auchan CRM</li>
                                <li>Cliquez sur "Connexion" en haut à droite</li>
                                <li>Entrez vos identifiants fournis par votre gestionnaire</li>
                                <li>Si vous avez oublié votre mot de passe, utilisez la fonction "Mot de passe oublié"</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Question 2 -->
                    <div x-data="{ open: false }" class="transition-all duration-200">
                        <button @click="open = !open" class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 dark:hover:bg-zinc-700 transition-colors">
                            <span class="text-lg font-medium text-gray-900 dark:text-white">Comment suivre l'état de ma commande ?</span>
                            <svg :class="{ 'rotate-180': open }" class="w-5 h-5 text-blue-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-4 text-gray-600 dark:text-gray-300">
                            <p>Dans votre espace client :</p>
                            <ol class="list-decimal pl-5 mt-2 space-y-1">
                                <li>Accédez à la section "Mes Commandes"</li>
                                <li>Sélectionnez la commande concernée</li>
                                <li>Vous verrez l'état actuel (En préparation, Expédiée, Livrée)</li>
                                <li>Pour les commandes expédiées, un numéro de suivi est disponible</li>
                            </ol>
                            <p class="mt-2 text-sm text-blue-600 dark:text-blue-400">Une notification email est également envoyée à chaque changement d'état.</p>
                        </div>
                    </div>

                    <!-- Question 3 -->
                    <div x-data="{ open: false }" class="transition-all duration-200">
                        <button @click="open = !open" class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 dark:hover:bg-zinc-700 transition-colors">
                            <span class="text-lg font-medium text-gray-900 dark:text-white">Comment contacter mon gestionnaire de compte ?</span>
                            <svg :class="{ 'rotate-180': open }" class="w-5 h-5 text-blue-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-4 text-gray-600 dark:text-gray-300">
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <p class="font-medium">Depuis le CRM :</p>
                                    <ul class="list-disc pl-5 mt-1 space-y-1">
                                        <li>Ouvrez la section "Contacts"</li>
                                        <li>Recherchez votre gestionnaire</li>
                                        <li>Cliquez sur "Envoyer un message"</li>
                                    </ul>
                                </div>
                                <div>
                                    <p class="font-medium">Autres méthodes :</p>
                                    <ul class="list-disc pl-5 mt-1 space-y-1">
                                        <li>Email : gestionnaire@auchan.sn</li>
                                        <li>Téléphone : +221 33 123 45 67</li>
                                        <li>Via le chat intégré (en bas à droite)</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ pour les administrateurs -->
            <div class="bg-white dark:bg-zinc-800 rounded-2xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl mt-12">
                <div class="p-6 bg-gradient-to-r from-purple-600 to-purple-500">
                    <h2 class="text-2xl font-bold text-white">Questions Administrateurs</h2>
                </div>
                
                <div class="divide-y divide-gray-200 dark:divide-zinc-700">
                    <!-- Question 4 -->
                    <div x-data="{ open: false }" class="transition-all duration-200">
                        <button @click="open = !open" class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 dark:hover:bg-zinc-700 transition-colors">
                            <span class="text-lg font-medium text-gray-900 dark:text-white">Comment créer un nouveau client dans le système ?</span>
                            <svg :class="{ 'rotate-180': open }" class="w-5 h-5 text-purple-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-4 text-gray-600 dark:text-gray-300">
                            <p>Processus de création d'un nouveau client :</p>
                            <ol class="list-decimal pl-5 mt-2 space-y-1">
                                <li>Accédez à la section "Clients"</li>
                                <li>Cliquez sur "Nouveau Client"</li>
                                <li>Remplissez le formulaire avec les informations requises</li>
                                <li>Assignez un gestionnaire de compte si nécessaire</li>
                                <li>Validez pour enregistrer</li>
                            </ol>
                            <p class="mt-2 text-sm text-purple-600 dark:text-purple-400">Astuce : Vous pouvez importer plusieurs clients via le module d'import CSV.</p>
                        </div>
                    </div>

                    <!-- Question 5 -->
                    <div x-data="{ open: false }" class="transition-all duration-200">
                        <button @click="open = !open" class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 dark:hover:bg-zinc-700 transition-colors">
                            <span class="text-lg font-medium text-gray-900 dark:text-white">Comment générer un rapport des ventes mensuelles ?</span>
                            <svg :class="{ 'rotate-180': open }" class="w-5 h-5 text-purple-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-4 text-gray-600 dark:text-gray-300">
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <p class="font-medium">Méthode rapide :</p>
                                    <ul class="list-disc pl-5 mt-1 space-y-1">
                                        <li>Accédez au tableau de bord "Ventes"</li>
                                        <li>Sélectionnez la période (mois en cours par défaut)</li>
                                        <li>Cliquez sur "Exporter le rapport"</li>
                                        <li>Choisissez le format (PDF, Excel, CSV)</li>
                                    </ul>
                                </div>
                                <div>
                                    <p class="font-medium">Méthode avancée :</p>
                                    <ul class="list-disc pl-5 mt-1 space-y-1">
                                        <li>Utilisez le module "Analyse"</li>
                                        <li>Créez un rapport personnalisé</li>
                                        <li>Sauvegardez le modèle pour un usage futur</li>
                                        <li>Planifiez des envois automatiques</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Question 6 -->
                    <div x-data="{ open: false }" class="transition-all duration-200">
                        <button @click="open = !open" class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 dark:hover:bg-zinc-700 transition-colors">
                            <span class="text-lg font-medium text-gray-900 dark:text-white">Comment attribuer des permissions spécifiques à un utilisateur ?</span>
                            <svg :class="{ 'rotate-180': open }" class="w-5 h-5 text-purple-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-4 text-gray-600 dark:text-gray-300">
                            <p>Gestion des permissions :</p>
                            <ol class="list-decimal pl-5 mt-2 space-y-1">
                                <li>Accédez à "Administration > Utilisateurs"</li>
                                <li>Sélectionnez l'utilisateur concerné</li>
                                <li>Onglet "Permissions"</li>
                                <li>Cochez les cases correspondant aux droits nécessaires</li>
                                <li>Vous pouvez aussi assigner un rôle prédéfini</li>
                                <li>Cliquez sur "Enregistrer"</li>
                            </ol>
                            <div class="mt-3 p-3 bg-yellow-50 dark:bg-yellow-900/20 rounded-lg">
                                <p class="text-sm text-yellow-700 dark:text-yellow-300">⚠️ Attention : Les changements de permissions sont appliqués immédiatement après enregistrement.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Question 7 -->
                    <div x-data="{ open: false }" class="transition-all duration-200">
                        <button @click="open = !open" class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 dark:hover:bg-zinc-700 transition-colors">
                            <span class="text-lg font-medium text-gray-900 dark:text-white">Comment résoudre les problèmes de synchronisation avec l'ERP ?</span>
                            <svg :class="{ 'rotate-180': open }" class="w-5 h-5 text-purple-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-4 text-gray-600 dark:text-gray-300">
                            <p>Procédure de dépannage :</p>
                            <ul class="list-disc pl-5 mt-2 space-y-1">
                                <li>Vérifiez l'état de la connexion dans "Paramètres > Intégrations"</li>
                                <li>Consultez les logs de synchronisation</li>
                                <li>Lancez une synchronisation manuelle pour tester</li>
                                <li>Vérifiez que les APIs de l'ERP sont accessibles</li>
                                <li>Redémarrez le service de synchronisation si nécessaire</li>
                            </ul>
                            <div class="mt-3 p-3 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                                <p class="text-sm text-blue-700 dark:text-blue-300">ℹ️ Pour une assistance technique avancée, contactez l'équipe IT via le ticket système.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script pour les animations -->
    @push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            // Animation d'entrée progressive des éléments
            Alpine.data('animateStagger', () => ({
                init() {
                    this.$el.querySelectorAll('.faq-item').forEach((el, index) => {
                        el.style.transitionDelay = `${index * 100}ms`;
                        el.classList.add('opacity-0', '-translate-y-2');
                        
                        const observer = new IntersectionObserver((entries) => {
                            entries.forEach(entry => {
                                if (entry.isIntersecting) {
                                    el.classList.remove('opacity-0', '-translate-y-2');
                                    observer.unobserve(entry.target);
                                }
                            });
                        });
                        
                        observer.observe(el);
                    });
                }
            }));
        });
    </script>
    @endpush

    <!-- Styles supplémentaires -->
    @push('styles')
    <style>
        .animate-fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        [x-cloak] { display: none !important; }
        
        .faq-item {
            transition: all 0.4s ease-out;
        }
    </style>
    @endpush

</div>
