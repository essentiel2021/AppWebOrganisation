<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Test 1</title>
</head>
<body>
  <div class="row">

    <div class="col-lg-1">
    </div>
    <!-- /.col-lg-3 -->

    <div class="col-lg-10">

      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <!-- /.card -->

      <div class="card card-outline-secondary my-4">
        <div class="card-header">
          Ajouter une organisation
        </div>
        <div class="card-body">
          
          <form action="{{ route('organisations.store') }}" method="post">

            @csrf

            <div class="form-group">
              <label for="name">Nom de l'organisation</label>
              <input type="text" name="name" class="form-control" value="{{ old('name') }}">
              @error('name')
                <div class="error">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="category">Type</label>
              <select class="form-control" name="type">
                  <option value=""></option>
                  @foreach($types as $type)
                    <option value="{{ $type->id }}" @if(old('type') == $type->id) selected @endif>{{ $type->name }}</option>
                  @endforeach
              </select>
              @error('type')
                <div class="error">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="description">Description de l'organisation</label>
              <textarea class="form-control" name="description" cols="30" rows="5" placeholder="Contenu de l'article">{{ old('description') }}</textarea>
              @error('description')
                <div class="error">{{ $message }}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
          </form>

        </div>
      </div>
      <!-- /.card -->

    </div>
    <div class="col-lg-1"></div>
  </div>
</body>
</html>