<x-layout>
    <div class="card col-sm-10 mt-5 mx-auto">
        <h3 class="card-header">Laten we uw oppas account aanmaken</h3>
        <form method="POST" action="/sitters" class="card-body" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="aboutField" class="form-label">Schrijf wat informatie over jou</label>
                <textarea required class="form-control" id="aboutField" rows="3" name="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="imageField">Jou foto</label>
                <input type="file" name="image" id="imageField" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary text-end">Doorgaan met</button>
        </form>
    </div>
</x-layout>
