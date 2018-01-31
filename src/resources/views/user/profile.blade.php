<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>User Index</title>
    </head>
    <body>
      <table>
        <thead><tr>
          <th> User Id </th>
          <th> User Name </th>
          <th> Default style</th>
          <th> All styles </th>
        </tr></thead>
        <tbdoy>
          <tr>
            <td>{{$user['id']}}</td>
            <td>{{$user['user_name']}}</td>
            <td>{{$user->default_style}}</td>
            <td>{{$user->styles}}</td>
          </tr>
      </tbody>
    </table>
  </body>
</html>
