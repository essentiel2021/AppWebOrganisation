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
  <table class="table">
    <thead>
      <tr>
        <th scope="col"><a class="btn btn-primary" href="{{ route('organisations.create') }}" role="button">Ajouter une organisation</a></th>
      </tr>
    </thead>
    <tbody>
      
      @foreach ($organisations as $organisation)
      <div class="col-lg-10">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif
      </div>
      <tr>
            <td>{{$organisation->name}}</td>
            <td>{{$organisation->type->name}}</td>
            <td><a class="btn btn-primary" href="{{ route('organisations.show',['organisation'=> $organisation->id]) }}" role="button">Afficher</a></td>
            <td><a class="btn btn-primary" href="{{ route('organisations.edit',['organisation'=> $organisation->id]) }}" role="button">Modifier</a></td>
            <td>
              <form action="{{ route('organisations.destroy',['organisation'=> $organisation->id]) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Supprimer</button>
              </form>
            </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>