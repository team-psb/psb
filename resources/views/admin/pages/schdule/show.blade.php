<div>
    @if ($schdule->image != null)
    <img src="{{ Storage::url($schdule->image) }}" class="img-fluid" alt="...">
    @endif
    <div class="card-body">
        <div class="card-body-content">
            <h5 class="card-title">{{ $schdule->title }}</h5>
            @if ($schdule->video)
                <iframe class="w-100" style="height: 400px" src="{{ $schdule->video ? $schdule->video : '' }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            @endif
            <p class="card-text">
                {!! $schdule->content !!}
            </p>
            <p class="card-text"><small class="text-muted">{{ $schdule->created_at->format('Y-m-d') }}</small></p>
        </div>
    </div>
</div>