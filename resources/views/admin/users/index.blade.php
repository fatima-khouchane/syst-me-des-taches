<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table class="table" border="1" style="width: 900px">
  <thead>
    <tr>
      <th scope="col">nom</th>
      <th scope="col">email</th>
      <th scope="col">role</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $items )


    <tr>

      <td>{{ $items->name }}</td>
      <td>{{ $items->name }}</td>
            <td>
                @foreach ($items->roles as $role )
                {{ $role->name }}

                @endforeach
            </td>
                  <td>
                    <form action="{{ route('delete', $items->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                     </form><br>
                    <a href="{{ route('edit',['user'=>$items->id]) }}">edit</a>
                </td>



    </tr>

     @endforeach
  </tbody>
</table>
</body>
</html>
