<x-app-layout>

    <form method="GET" action="/dashboard/ads">
        <x-primary-button type="submit" name="sort" value="price">Sort by price</x-primary-button>
        <x-primary-button type="submit" name="sort" value="">Reset</x-primary-button>
    </form>

    @foreach($ads as $ad)
        <div>
            <a href="{{route('ads.show', $ad->id)}}">{{$ad->title}} {{$ad->price}}€</a>
            @if (Auth::user()->id === $ad->author_id or Auth::user()->role === "admin")
                <a href="{{route('ads.edit', $ad->id)}}">Update</a>
            @endif
        </div>
    @endforeach
    <a href="{{route('ads.create')}}">New</a>
</x-app-layout>