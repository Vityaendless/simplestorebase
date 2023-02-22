<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot>
    <div>
        <p>{{ $title }}</p>
        <a href="/users/{{ $id }}/addresses">Return</a><br>
        <form action="" method="POST">
            @csrf
            <div>
                @php
                $cities_data = json_encode($cities);
                $streets_data = json_encode($streets);
                $buildings_data = json_encode($buildings);
                $appartments_data = json_encode($appartments);
                @endphp
                <div>
                    <label for="country">Country: </label><br>
                    <select id="country" name="country">
                        @foreach($countries as $country)
                        <option id="country" value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="city">City: </label><br>
                    <select id="city" name="city" style="display:none">
                    </select>
                </div>
                <div>
                    <label for="street">Street: </label><br>
                    <select id="street" name="street" style="display:none">
                    </select>
                </div>
                <div>
                    <label for="building">Building: </label><br>
                    <select id="building" name="building" style="display:none">
                    </select>
                </div>
                <div>
                    <label for="appartment">Appartment: </label><br>
                    <select id="appartment" name="appartment" style="display:none">
                    </select>
                </div>
                <div>
                    <br><input type="submit" value="Add address">
                </div>
        </form>
    </div>
</x-layout>
<script type="text/javascript">
function addOption(dataFromBase, dataFromSelect, getById, paramId) {
    const data = JSON.parse(dataFromBase);
    var value = dataFromSelect, 
    addInSelect = document.getElementById(getById);

    if(data){
        var options = '<option value="0"></option>';
        data.forEach(d => {
            if (d[paramId] == value ) {
                options += '<option value="'+d['id']+'">'+d['name']+'</option>';
            }
        });
        addInSelect.innerHTML = options;
        addInSelect.style.display = 'block';
    }  else {
        addInSelect.style.display = 'none';
    }
}

document.getElementById('country').addEventListener('change', function(){
    addOption('<?=$cities_data?>', this.value, 'city', 'country_id');
    s = document.getElementById('street'); s.value = 0;
    b = document.getElementById('building'); b.value = 0;
    a = document.getElementById('appartment'); a.value = 0;
});

document.getElementById('city').addEventListener('change', function(){
    addOption('<?=$streets_data?>', this.value, 'street', 'city_id');
    b = document.getElementById('building'); b.value = 0;
    a = document.getElementById('appartment'); a.value = 0;
});

document.getElementById('street').addEventListener('change', function(){
    addOption('<?=$buildings_data?>', this.value, 'building', 'street_id');
    a = document.getElementById('appartment'); a.value = 0;
});

document.getElementById('building').addEventListener('change', function(){
    addOption('<?=$appartments_data?>', this.value, 'appartment', 'building_id');
});
</script>