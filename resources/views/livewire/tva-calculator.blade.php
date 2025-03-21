@section('title', 'Calcul de TVA')

<div class="bg-white p-6 shadow-lg rounded-lg">

    <h1 class="text-2xl font-semibold mb-6">@yield('title')</h1>

    <form wire:submit.prevent="calculate">
        <div class="mb-4">
            <label for="amount" class="block text-lg font-medium">Montant</label>
            <input type="text" id="amount" class="w-full mt-2 p-3 border border-gray-300 rounded-lg" wire:model="amount">
            @error('amount') 
                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> 
            @enderror
        </div>

        <div class="mb-4">
            <label for="price_type" class="block text-lg font-medium">Type de prix</label>
            <select id="price_type" class="w-full mt-2 p-3 border border-gray-300 rounded-lg" wire:model="selected_price_type">
                @foreach($price_types as $type)
                    <option value="{{ $type }}">{{ $type }}</option>
                @endforeach
            </select>
            @error('selected_price_type') 
                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> 
            @enderror
        </div>

        <div class="mb-4">
            <label for="rate" class="block text-lg font-medium">Taux de TVA</label>
            <select id="rate" class="w-full mt-2 p-3 border border-gray-300 rounded-lg" wire:model="selected_rate">
                @foreach($rates as $rate)
                    <option value="{{ $rate }}">{{ $rate }}%</option>
                @endforeach
            </select>
            @error('selected_rate') 
                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> 
            @enderror
        </div>

        <div class="mb-4">
            <button type="submit" class="w-full bg-green-500 text-white font-semibold p-3 rounded-lg">
                Calculer
            </button>
        </div>
    </form>

    @if($amount)
        <div>
            <p class="text-lg">
                Vous avez saisi un prix <strong>{{ $selected_price_type }}</strong> de <strong>{{ is_numeric($amount) ? number_format($amount, 2) : '0.00' }}
                €</strong>.<br>
                Le montant de la TVA est de : <strong>{{ is_numeric($tva_amount) ? number_format($tva_amount, 2) : '0.00' }}
                €</strong>.<br>
                Le montant <strong>{{ $selected_price_type === 'HT' ? 'TTC' : 'HT' }}</strong> est donc de <strong>{{ number_format($result_price, 2) }} €</strong>.
            </p>
        </div>
    @endif
</div>
