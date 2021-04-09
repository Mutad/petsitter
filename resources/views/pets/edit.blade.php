<x-layout>
    <div class="card col-sm-10 mt-5 mx-auto">
        <h3 class="card-header">Werk de informatie van uw huisdier bij</h3>
        <form action="{{ route('pets.update', $pet) }}" enctype="multipart/form-data" method="POST" class="m-2">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nameField">Naam van het huisdier</label>
                <input type="text" name="name" id="nameField" class="form-control" value="{{ $pet->name }}">
            </div>
            <div class="mb-3">
                <label for="imageField">Pet's afbeelding</label>
                <input type="file" name="image" id="imageField" class="form-control">
            </div>
            <div class="mb-3">
                <label for="descField">Over uw huisdier</label>
                <textarea type="text" name="description" id="descField" class="form-control"
                    rows="3">{{ $pet->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="typeField">Type huisdier</label>
                <select name="type" id="typeField" class="form-control">
                    <option value="cat" @if ($pet->type == 'cat') selected @endif>Kat</option>
                    <option value="dog" @if ($pet->type == 'dog') selected @endif>Hond</option>
                    <option value="chicken" @if ($pet->type == 'chicken') selected @endif>Kip/haan</option>
                    <option value="other" @if ($pet->type == 'other') selected @endif>Alle overige dieren</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="weightField">Gewicht van het huisdier</label>
                <input type="number" step="0.01" name="weight" id="weightField" class="form-control"
                    value="{{ $pet->weight }}">
            </div>
            <div class="mb-3">
                <label for="hourlyField">Uurtarief</label>
                <input type="number" step="0.01" name="hourly_rate" id="hourlyField" class="form-control"
                    value="{{ $pet->hourly_rate }}">
            </div>
            <button type="submit" class="btn btn-primary">Bijwerken</button>
        </form>
    </div>
</x-layout>
