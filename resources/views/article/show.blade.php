<x-layout>
    <div class="container-fluid bg-secondary-grey text-center" style="max-width: 1100px; margin: 0 auto;">
        <div class="row justify-content-center align-items-center mt-5 pt-3 bg-custom-sfondo">
            <h1 class="display-1 text-white">
                Titolo : {{ $article->title }}
            </h1>
        </div>
    </div>

    
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <img src="{{ Storage::url($article->image)}}" alt="" class="img-fluid my-3">
           <div class="text-center">
            <h2> {{$article->subtitle}}</h2>
            <div class="my-3 text-muted-fst-italic">
                <p>Redatto da {{$article->user->name}} il {{$article->created_at->format('d/m/Y')}}</p>
            </div>
           </div>
           <hr>
           <p>{{$article->body}}</p>
           <div class="row">
               <div class="col-md-3">
                   @if(Auth::user() && Auth::user()->is_revisor)
                   <form action="{{route('revisorRejectArticle', compact('article'))}}" method="POST">
                    @csrf
                    <button class="btn btn-danger text-white my-5" style="margin-right: 10px;">Rifiuta</button>
                </form>
                @endif
            </div>
            <div class="col-md-3 text-end">
                @if(Auth::user() && Auth::user()->is_revisor)
                <form action="{{route('revisorAcceptArticle', compact('article'))}}" method="POST">
                    @csrf
                    <button class="btn btn-success text-white my-5">Accetta</button>
                </form>
                @endif
                <div class="text-center">
                 <a href="{{route('articleIndex')}}" class="btn btn-info text-white my-5">Torna indietro</a>
                </div>
            </div>
        </div>
        </div>
    </div>
</x-layout>
