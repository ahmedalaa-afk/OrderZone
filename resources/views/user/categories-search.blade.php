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
            <li>
                <a href="#" class="mx-3 link-dark link-offset-2"
                    wire:click.prevent="selectSuggestion('{{ $suggestion }}')">
                    {{ ucwords(str_replace('-', ' ', $suggestion)) }}
                </a>
                <hr>
            </li>
            @endforeach
        </ul>
    </div>
    @endif
</div>