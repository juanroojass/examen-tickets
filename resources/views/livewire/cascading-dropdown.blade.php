<div>
    <div class="my-3">
        <select name="" id="" wire:model="selectedContinent" wire:change="changeContinent">
            <option value="-1">Please select continent</option>
            @foreach($continents as $continent)
                <option value="{{$continent['id']}}">{{$continent['name']}}</option>
            @endforeach
        </select>
    </div>
    <div>
        <!-- <p wire:loading>Loading...</p> -->
        <select name="" id="" wire:model="selectedCountry">
            <option value="-1">Please select country</option>
            @foreach($countries as $country)
                <option value="{{$country['id']}}">{{$country['name']}}</option>
            @endforeach

        </select>
    </div>
</div>
