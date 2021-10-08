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
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach ($organisations as $organisation)
      <tr>
            <td>{{$organisation->name}}</td>
            <td>{{$organisation->type->name}}</td>
            <td><a class="btn btn-primary" href="{{ route('organisations.show',['organisation'=> $organisation->id]) }}" role="button">Afficher</a></td>
            <td><a class="btn btn-primary" href="{{ route('organisations.edit',['organisation'=> $organisation->id]) }}" role="button">Modifier</a></td>
            <td><a class="btn btn-danger" href="{{ route('organisations.destroy',['organisation'=> $organisation->id]) }}" role="button">Supprimer</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>