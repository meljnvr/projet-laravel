<x-app-layout>
    <h1>{{$ad->title}}</h1>
    <p>Description : {{$ad->description}}</p>
    <p>Catégorie : {{$ad->category}}</p>
    <p>{{$ad->price}}€</p>
    <p>Lieu : {{$ad->place}}</p>
    <p>Mail : {{ $ad->author->email }}</p>
    <p>Date de fin : {{ $ad->expiration_date }}</p>
    <!-- vérifie si l'annonce a des images -->
    @if ($ad->images->count() > 0)
        <ul>
            @foreach ($ad->images as $image)
                <li>
                    <img style="width:150px;" src="{{ asset('storage/' . $image->file_path) }}">
                </li>
            @endforeach
        </ul>
    @endif
    <!-- affichage du bouton uptade seulemnt si l'annonce appartient au user connecté ou si on est admin -->
    @if (Auth::user()->id === $ad->author_id or Auth::user()->role === "admin")
        <a href="{{route('ads.edit', $ad->id)}}">Update</a>
    @endif
</x-app-layout>
