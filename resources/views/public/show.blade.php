<x-app-layout>
    <h1>{{$ad->title}}</h1>
    <p>Description : {{$ad->description}}</p>
    <p>Catégorie : {{$ad->category}}</p>
    <p>{{$ad->price}}€</p>
    <p>Lieu : {{$ad->place}}</p>
    <img style="width:150px;" src="{{$ad->image}}" target="_blank">
</x-app-layout>
