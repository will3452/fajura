<div>
    <input x-ref="selected" value="{{ $selectedString }}" type="hidden" name="services_id" required>
    <div class="flex flex-wrap" >
        @foreach($services as $service)
            @livewire('service-selector-item', ['service'=>$service], key($service->id))
        @endforeach
    </div>
</div>
