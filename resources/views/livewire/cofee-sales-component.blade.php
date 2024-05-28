<div>
    <div class="p-6 bg-white border-b border-gray-200 flex">
        <div class="p-6">
            <div>
                <label>Quantity</label><br />
                <input wire:model="quantity" id="quantity" type="text" />
            </div>
            @error('quantity')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="p-6">
            <div>
                <label>Unit Cost</label><br />
                <input wire:model="unitcost" id="unitCost" type="text" />
            </div>
            @error('unitcost')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="p-6">
            <label>Cost</label><br />
            <span id="itemcost"> @if(!empty($itemcost)) &#163; @endif {{ $itemcost }}</span>
        </div>
        <div class="p-6">
            <label>Selling Price</label><br />
            <span id="sellingprice" > @if(!empty($itemsellingcost))&#163; @endif{{ $itemsellingcost }}</span>
        </div>
        <div class="p-6">
            <button type="button" id="recordSale" class="text-white bg-red-700 py-3 px-3 border" wire:click="saveSale">Record Sale</button>
        </div>
    </div>
</div>
