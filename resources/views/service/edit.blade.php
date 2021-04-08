<x-layout>
    <div class="card col-sm-10 mt-5 mx-auto">
        <h3 class="card-header">Update Service</h3>
        <form class="card-body" action="{{route('services.update',$service)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="titleField">Servicetitel</label>
                <input type="text" name="title" id="titleField" class="form-control" value="{{$service->title}}">
            </div>
            <div class="mb-3">
                <label for="descField">Service description</label>
                <input type="text" name="description" id="descField" class="form-control" value="{{$service->description}}">
            </div>
            <div class="mb-3">
                <label for="costField">Kosten</label>
                <input type="numer" name="cost" id="costField" class="form-control" value="{{$service->cost}}">
            </div>
            <div class="mb-3">
                <label for="payField">Betaling per</label>
                <select class="form-select" name="payment_per" id="payField">
                    <option value="night" @if($service->payment_per == 'night')selected @endif>Nacht</option>
                    <option value="walk" @if($service->payment_per == 'walk')selected @endif>Wandelen</option>
                    <option value="hour" @if($service->payment_per == 'hour')selected @endif>Uur</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Service</button>
        </form>
    </div>
</x-layout>