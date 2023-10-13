<x-app-layout>
    <form method="POST" action="{{route('ads.store')}}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="title" id="title" required>
        <input type="text" name="description" placeholder="description" id="description" required>
        <input type="text" name="category" placeholder="category" id="category" required>
        <input type="text" name="price" placeholder="price" id="price" required>€
        <input type="text" name="place" placeholder="place" id="place" required>
        <input type="text" name="image" placeholder="image" id="image" required>
        <input type="text" name="state" placeholder="state" id="state" required>
        <input type="text" name="brand" placeholder="brand" id="brand">
        <input type="text" name="year" placeholder="year" id="year">
        <input type="text" name="dimensions" placeholder="dimensions" id="dimensions">
        <input type="text" name="delivery" placeholder="delivery" id="delivery" required>
        <input type="date" name="expiration_date" id="expiration_date">
        <input type="text" name="garanties" placeholder="garanties" id="garanties">
        <div>
            <input type="checkbox" id="open_to_discussion" name="open_to_discussion" />
            <label for="open_to_discussion">Open to discussion</label>
        </div>
        {{ $errors }}
        <button type="submit">Enregistrer</button>
        <!-- {{$errors}}
        @error('name', 'description', 'date', 'status')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror -->
    </form>
</x-app-layout>

            $table->string('dimensions')->nullable;
            $table->date('expiration_date')->nullable;
            $table->string('delivery');
            $table->text('garanties')->nullable;
            $table->boolean('open_to_discussion');