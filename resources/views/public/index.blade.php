<x-app-layout>

<form method="GET" action="/public">
        <x-primary-button type="submit" name="sort" value="price">Sort by price</x-primary-button>
        <x-primary-button type="submit" name="sort" value="">Reset</x-primary-button>
</form>

@foreach($ads as $ad)
        <div>
            <a href="/public/show/{{$ad->id}}">{{$ad->title}} {{$ad->price}}€</a>
            {{$ad->description}}
    </div>
@endforeach

</x-app-layout>