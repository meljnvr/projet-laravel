<x-app-layout>
    @foreach($ads as $ad)
        <div>
            <a href="{{route('ads.show', $ad->id)}}">{{$ad->title}}</a>
            @if (Auth::user()->id === $ad->author_id or Auth::user()->role === "admin")
                <a href="{{route('ads.edit', $ad->id)}}">Update</a>
            @endif
        </div>
    @endforeach
    <a href="{{route('ads.create')}}">New</a>
</x-app-layout>