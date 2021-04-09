<x-layout>
    <div class="card col-sm-10 mt-5 mx-auto">
        <h3 class="card-header">Maak een service</h3>
        <form class="card-body" action="{{route('services.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="titleField">Servicetitel</label>
                <input type="text" name="title" id="titleField" class="form-control">
            </div>
            <div class="mb-3">
                <label for="descField">Dienstbeschrijving</label>
                <input type="text" name="description" id="descField" class="form-control">
            </div>
            <div class="mb-3">
                <label for="costField">Kosten</label>
                <input type="numer" name="cost" id="costField" class="form-control">
            </div>
            <div class="mb-3">
                <label for="payField">Betaling per</label>
                <select class="form-select" name="payment_per" id="payField">
                    <option value="night">Nacht</option>
                    <option value="walk">Wandelen</option>
                    <option value="hour">Uur</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Creëer service</button>
        </form>
    </div>
</x-layout>