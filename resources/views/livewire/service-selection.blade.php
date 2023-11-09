<div>
    <div class="col-span-12 sm:col-span-12 text-center" style="display:none;" id="add_err"><div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-12 text-white"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> All fields must be filled out! <i data-feather="x" onclick="return closeAddAlert();" class="w-4 h-4 ml-auto"></i> </div></div>
        <div class="mb-6">
            <div class="col-span-12 sm:col-span-4"> <label>Request Selection Info</label>
                <select wire:model="selectService" required="" name="service_id" id="service_id" class="input w-full border border-gray-300 mt-2 flex-1 @error('service_id') border-theme-6 @enderror">
                    <option value="">Select a service</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div wire:loading>
            <h4>Loading...</h4>
        </div>
        @if ($selectedService)
            <div class="mb-6">
                <div class="col-span-12 sm:col-span-4">
                    <label>Request Description:</label>
                    <textarea  class="input w-full border-gray-300 mt-2 flex-1" name="description" id="description" cols="30" rows="5" readonly>{{ $selectedService->description }}</textarea>
                </div>
            </div>
        @endif

    </div>

</div>
