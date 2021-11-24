<div class="mb-3">
    @if ($schdule->image != null)
    <img src="{{ Storage::url($schdule->image) }}" class="card-img-top" alt="...">
    @endif
    <div class="card-body">
        <h5 class="card-title">{{ $schdule->title }}</h5>
        <p class="card-text">{!! $schdule->content !!}</p>
        <p class="card-text"><small class="text-muted">{{ $schdule->created_at->format('Y-m-d') }}</small></p>
    </div>
</div>