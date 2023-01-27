   <!-- Filters -->
   <div class="container">
    <div class="cat-slider">
        @foreach ($kategori as $item)
      
        <div class="cat-item px-1 py-3">
            <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="/search?idKategori={{ $item->id }}">
                <img alt="#" src="/storage/{{ $item->gambar }}" class="img-fluid mb-2">
                <p class="m-0 small">{{ $item->jenisKategori }}</p>
            </a>
        </div>
              
        @endforeach
    </div>
</div>