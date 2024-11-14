<div x-data @click.away="$wire.clearSuggestions()" class="advanced-search">
    <button type="button" class="category-btn">All Categories</button>
    <div class="input-group w-100">
        <input type="text" placeholder="What do you need?" wire:model="search" wire:keyup="updateSuggestions">
    </div>

    <!-- Suggested Text -->
    @if(!empty($suggestions))
    <div class="suggestions"
        style="position: absolute; background: white; border: 1px solid #ccc; width: 100%; z-index: 10;">
        <ul>
            @foreach($suggestions as $suggestion)
            <li wire:click="selectSuggestion('{{ $suggestion }}')">{{ $suggestion }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>