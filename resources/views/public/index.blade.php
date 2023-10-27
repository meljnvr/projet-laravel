<x-app-layout>

<form method="GET" action="/public">
        <x-primary-button type="submit" name="sort" value="increasing">Prix : par ordre croissant</x-primary-button>
        <x-primary-button type="submit" name="sort" value="decreasing">Prix : par ordre décroissant</x-primary-button>
        <x-primary-button type="submit" name="sort" value="">Reset</x-primary-button>
</form>

@foreach($ads as $ad)
        <div>
            <a href="/public/show/{{$ad->id}}">{{$ad->title}} {{$ad->price}}€</a>
            {{$ad->description}}
    </div>
@endforeach

</x-app-layout>