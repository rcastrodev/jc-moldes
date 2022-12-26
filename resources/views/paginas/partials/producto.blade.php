<a href="{{ route('producto', ['id'=> $p->id ]) }}" class="card producto text-decoration-none bg-light d-flex justify-content-center align-items-center py-5 px-3 text-dark" style="height: 410px;">
    @if (count($p->images))
        @if (count($p->images()->where('name', 'image')->get()))
            @if (Storage::disk('public')->exists($p->images()->first()->image))
                <img src="{{ asset($p->images()->first()->image) }}" class="img-fluid img-product mb-3" style="min-height:229px; max-height:229px; object-fit: cover;">
            @else
                <img src="{{ asset('images/default.jpg') }}" class="img-fluid img-product mb-3" style="min-height:229px; max-height:229px; object-fit: cover;">
            @endif 
        @else
            <img src="{{ asset('images/default.jpg') }}" class="img-fluid img-product mb-3" style="min-height:229px; max-height:229px; object-fit: cover;">  
        @endif
    @else
        <img src="{{ asset('images/default.jpg') }}" class="img-fluid img-product mb-3" style="min-height:229px; max-height:229px; object-fit: cover;">
    @endif
    <div class="card-body d-block w-100" style="border-top: 1px solid #D9D9D9;">
        <p class="card-text text-center mb-0 ">
            <span class="font-size-16 text-dark d-block mb-3" style="font-weight: 300;">{{ $p->category->name }}</span>
            <span class="fw-bold font-size-18">{{ Str::limit($p->name, 20) }}</span>
        </p>
    </div>
</a>

