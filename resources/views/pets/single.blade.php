<x-layout>
    <div class="card m-5">
        <div class="card-header"><h3>{{$pet->name}}</h3></div>
        <div class="card-body">
            <h5 class="card-title">Hello, i'm {{$pet->name}} and i'm looking for a petsitter.</h5>
            <p class="card-text">
                My owner will pay you ${{$pet->hourly_rate}}/hour if you help me
            </p>
        </div>
    </div>
</x-layout>