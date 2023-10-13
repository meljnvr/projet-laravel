<x-app-layout>
    <h1>{{$ad->title}}</h1>
    <p>Description : {{$ad->description}}</p>
    <p>Catégorie : {{$ad->category}}</p>
    <p>{{$ad->price}}€</p>
    <p>Lieu : {{$ad->place}}</p>
    <p>Mail : {{ $ad->author->email }}</p>
    <img style="width:150px;" src="{{$ad->image}}" target="_blank">
    <!-- affichage du bouton uptade seulemnt si l'annonce appartient au user connecté -->
    @if (Auth::user()->id === $ad->author_id or Auth::user()->role === "admin")
        <a href="{{route('ads.edit', $ad->id)}}">Update</a>
    @endif
</x-app-layout>
