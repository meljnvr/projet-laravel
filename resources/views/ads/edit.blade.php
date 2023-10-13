<x-app-layout>
    <form method="POST" action="{{route('ads.show', $ad->id)}}" enctype="multipart/form-data">
        @csrf
        @method("PUT")
    
        <input type="text" name="title" placeholder="title" id="title" required value="{{$ad->title}}">
        <input type="text" name="description" placeholder="description" id="description" required value="{{$ad->description}}">
        <input type="text" name="category" placeholder="category" id="category" required value="{{$ad->category}}">
        <input type="text" name="price" placeholder="price" id="price" required value="{{$ad->price}}">€
        <input type="text" name="place" placeholder="place" id="place" required value="{{$ad->place}}">
        <input type="text" name="image" placeholder="image" id="image" required value="{{$ad->image}}">
        <input type="text" name="state" placeholder="state" id="state" required value="{{$ad->state}}">
        <input type="text" name="brand" placeholder="brand" id="brand" value="{{$ad->brand}}">
        <input type="text" name="year" placeholder="year" id="year" value="{{$ad->year}}">
        <input type="text" name="dimensions" placeholder="dimensions" id="dimensions" value="{{$ad->dimensions}}">
        <input type="text" name="delivery" placeholder="delivery" id="delivery" required value="{{$ad->delivery}}">
        <input type="date" name="expiration_date" id="expiration_date" value="{{$ad->expiration_date}}">
        <input type="text" name="garanties" placeholder="garanties" id="garanties" value="{{$ad->garanties}}">
        <div>
        <input type="checkbox" id="open_to_discussion" name="open_to_discussion" value="1" @if($ad->open_to_discussion) checked @endif>
            <label for="open_to_discussion">Open to discussion</label>
        </div>
        <button type="submit">Enregistrer</button>
        {{ $errors }}
    </form>
    <form method="POST" action="{{route('ads.destroy', $ad->id)}}">
        @csrf
        @method("DELETE")
        <button type=submit>Delete</button>
    </form>
</x-app-layout>