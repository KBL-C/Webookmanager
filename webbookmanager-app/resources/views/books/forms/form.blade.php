
{!! Form::model( [$categories, $book, ['route' => [$book->url(), $book->id], 'method' => $book->method(), 'enctype' => 'multipart/form-data']]) !!}
    @csrf
    <div class="mb-3">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', 'null', ['class' => 'form-control', 'placeholder' => 'Name']) !!}
    </div>

    <div class="mb-3">
        {!! Form::label('slug', 'Slug') !!}
        {!! Form::text('slug', 'null', ['class' => 'form-control', 'placeholder' => 'Name']) !!}
    </div>

    <div class="mb-3">
        {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description', 'null', ['class' => 'form-control', 'placeholder' => 'Name']) !!}
    </div>

    <div class="mb-3">
        {!! Form::label('author', 'Author') !!}
        {!! Form::text('author', 'null', ['class' => 'form-control', 'placeholder' => 'Name']) !!}
    </div>
    <div class="mb-3">
        {!! Form::label('price', 'Price') !!}
        {!! Form::number('price', 'null', ['class' => 'form-control', 'placeholder' => 'price']) !!}
    </div>
    <div class="mb-3">
        <select class="form-control" name="category">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
        </select>
    </div>
    <div class="mb-3">
        {!! Form::submit('Save', ['class' => 'btn btn-primary text-light']) !!}
    </div>

{!!  Form::close() !!}


<form>
    <div class="mb-3">
      <label for="name" class="form-label"> Name</label>
      <input type="text" class="form-control" id="name">
    </div>
    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control" id="slug">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description">
    </div>
    <div class="mb-3">
        <label for="author" class="form-label">Author</label>
        <input type="text" class="form-control" id="author">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" id="price">
    </div>

    <div class="mb-3">
        <select class="form-control" name="category">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary text-light float-end">Save</button>
</form>
