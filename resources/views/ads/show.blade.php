<x-app-layout>
    <h1>{{$ad->title}}</h1>
    <p>Catégorie : {{$ad->category}}</p>
    <p>Description : {{$ad->description}}</p>
    <p>Etat : {{$ad->state}}</p>
    <p>{{$ad->price}}€</p>
    <p>Lieu : {{$ad->place}}</p>
    <p>Type de livraison : {{ $ad->delivery }}</p>
    @if ($ad->expiration_date)
        <p>Date de fin : {{ $ad->expiration_date }}</p>
    @endif
    <div>
        @if ($ad->brand)
            <p>Marque : {{ $ad->brand }}</p>
        @endif
        @if ($ad->year)
            <p>Année : {{ $ad->year }}</p>
        @endif
        @if ($ad->dimensions)
            <p>Dimensions : {{ $ad->dimensions }}</p>
        @endif
        @if ($ad->garanties)
            <p>Garanties : {{ $ad->garanties }}</p>
        @endif
    </div>
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
    <p>Mail : {{ $ad->author->email }}</p>
    @if ($ad->open_to_discussion)
        <p>Ouvert aux discussion</p>
    @endif
    <!-- affichage du bouton uptade seulemnt si l'annonce appartient au user connecté ou si on est admin -->
    @if (Auth::user()->id === $ad->author_id or Auth::user()->role === "admin")
        <a href="{{route('ads.edit', $ad->id)}}">Update</a>
    @endif
</x-app-layout>
