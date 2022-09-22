<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">view videos</th>


    </tr>
  </thead>
  <tbody>
   
  @foreach ($cources as $cource)
  <tr>

      <th scope="row"> {{$cource->id}}</th>
      <td> {{$cource->name}}</td>
      <td> <a href="{{ route('course.video.show',$cource->id)}}" class="btn btn-primary">view video</a></td>
      </tr>

@endforeach
     
    </tbody>
</table>