<x-layout>
    <div class="card col-sm-10 mt-5 mx-auto">
        <h3 class="card-header">Voeg je huisdier toe</h3>
        <form action="{{ route('pets.store') }}" enctype="multipart/form-data" method="POST" class="m-2">
            @csrf
            <div class="mb-3">
                <label for="nameField">Naam van het huisdier</label>
                <input type="text" name="name" id="nameField" class="form-control">
            </div>
            <div class="mb-3">
                <label for="imageField">Pet's afbeelding</label>
                <input type="file" name="image" id="imageField" class="form-control">
            </div>
            <div class="mb-3">
                <label for="descField">Over uw huisdier</label>
                <textarea type="text" name="description" id="descField" class="form-control" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="typeField">Type huisdier</label>
                <select name="type" id="typeField" class="form-control">
                    <option value="cat">Kat</option>
                    <option value="dog">Hond</option>
                    <option value="chicken">Kip/haan</option>
                    <option value="other">Alle overige dieren</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="weightField">Gewicht van het huisdier</label>
                <input type="number" name="weight" id="weightField" class="form-control">
            </div>
            <div class="mb-3">
                <label for="hourlyField">Uurtarief</label>
                <input type="number" name="hourly_rate" id="hourlyField" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Toevoegen</button>
        </form>
    </div>
</x-layout>
