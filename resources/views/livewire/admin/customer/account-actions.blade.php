<div>

    {{-- <flux:modal.trigger name="create-task">
        <flux:button class="">Créer une tâche</flux:button>
    </flux:modal.trigger> --}}
    
    <flux:modal name="edit-card" class="md:w-96" :dismissible="false">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Données de la carte fidélité</flux:heading>
                <flux:text class="mt-2">Modification du Solde</flux:text>
            </div>
    
            <flux:input wire:model="cardNumber" label="N° de la Carte" type="text" value="{{ $customer->loyaltyCard->card_number }}" disabled />

            <flux:input wire:model="balance" label="Solde" value="{{ $customer->loyaltyCard->balance }}" />

            <flux:input wire:model="barcode" label="Code-barres" type="text" value="{{ $customer->loyaltyCard->barcode }}" disabled />
    
            <div class="flex">
                <flux:spacer />
    
                <flux:button type="submit" variant="primary" wire:click="updateBalance">Mettre à jour</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
