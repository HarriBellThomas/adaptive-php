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
        <th> Style Id </th>
        <th> Style Name </th>
        <th> Style JSON </th>
        <th> Style Tags </th>
        <th> Style owen </th>
      </tr></thead>
      <tbdoy>
      <tr>
        <td>{{$style['id']}}</td>
        <td>{{$style['name']}}</td>
        <td>{{$style['style']}}</td>
        <td>{{$style->tags}}</td>
        <td>{{$style->user['user_name']}}</td>
      </tr>
    </tbody>
    </table>
  </body>
</html>
