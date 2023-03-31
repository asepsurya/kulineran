  <!-- offer sectio slider -->
  <div class="bg-white">
    <div class="container">
        <div class="offer-slider">
            @foreach ($banner as  $item)
           
            <div class="cat-item px-1 py-3">
                <a class="d-block text-center shadow-sm" >
                    <img alt="#" src="/storage/{{ $item->banner }}" class="img-fluid rounded">
                </a>
            </div>
               @endforeach  
           
        </div>
    </div>
</div>