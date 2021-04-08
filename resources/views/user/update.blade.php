<x-layout>
    <div class="card col-sm-10 mt-5 mx-auto">
        <h3 class="card-header">Update je profiel</h3>
        <form action="{{route('user.update',$user->id)}}" method="POST" class="p-2">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="nameField">Voor-en achternaam</label>
                <input type="text" name="name" id="nameField" class="form-control" value="{{$user->name}}">
            </div>
            <div class="mb-3">
                @include('components.countries')
            </div>
            <div class="mb-3">
                <label for="cityField">Stad</label>
                <input type="text" name="city" id="cityField" class="form-control" value="{{$user->city}}">
            </div>
            <button type="submit" class="btn btn-primary">Bijwerken</button>
        </form>
    </div>
</x-layout>