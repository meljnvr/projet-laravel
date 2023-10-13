<x-app-layout>

@foreach($ads as $ad)
        <div>
            <a href="/public/show/{{$ad->id}}">{{$ad->title}}</a>
            {{$ad->description}}
    </div>
@endforeach

</x-app-layout>