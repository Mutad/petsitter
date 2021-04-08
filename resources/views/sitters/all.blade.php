<x-layout>
    <div class="card col-sm-10 mt-5 mx-auto">
        <div class="card-header">
            <h3>Sitters</h3>
        </div>
        <div class="list-group list-group-flush">
            @forelse ($sitters as $sitter)
                <a href="/sitters/{{ $sitter->id }}" class="list-group-item">
                    <div class="d-flex justify-content-between">
                        <p class="m-0">{{ $sitter->user->name }}</p>
                        @if ($sitter->user->country && $sitter->user->city)
                            <p class="m-0">{{ $sitter->user->country }}, {{ $sitter->user->city }}</p>
                        @endif
                    </div>
                    <small class="d-flex align-items-center">
                        <img height="15px" class="m-1" src="https://img.icons8.com/ios/100/000000/star--v1.png" />
                        {{ $sitter->rating }}
                    </small>
                </a>
            @empty
                Geen sitters gevonden
            @endforelse
        </div>
        @if ($sitters->hasPages())
            <div class="card-footer d-flex justify-content-center">
                {{ $sitters->links() }}
            </div>
        @endif
    </div>
    </div>
</x-layout>
