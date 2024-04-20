<div>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <table class="table table-info">
        <thead>
            <tr>

                <th>id</th>
                <th>Name</th>
                <th>City</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                
            <tr>
                <td>1</td>
                <td>Hassan</td>
                <td>Daska</td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
  </body>
  </html>
</div>
