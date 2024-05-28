<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Set new shipment cost 🚚') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form id="partnerForm" action="{{ route('saveShipment') }}" method="POST">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="p-6">
                            <label>Partner</label><br />
                            <input name="partner" id="partner" type="text" />
                            <span class="text-red-500" id="partnerErr" style="display:none">Please enter partner</span>
                        </div>
                        {{-- <div class="p-6">
                            <label>Shipping Cost</label><br />
                            <input name="shipment_cost" id="shipment_cost" type="text" />
                            <span class="text-red-500" id="shipmentErr" style="display:none">Please enter cost</span>
                        </div> --}}
                        <div class="p-6">
                            <button type="button" id="savePartner" class="text-white bg-red-700 py-3 px-3 border">Add Partner</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

