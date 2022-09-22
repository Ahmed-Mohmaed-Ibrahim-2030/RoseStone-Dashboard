<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<a href="{{ route('create.category')}}" class="btn btn-primary">add new category</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">sub Category</th>

    </tr>
  </thead>
  <tbody>
   
  @foreach ($Categorys as $Category)
    <tr>
      <th scope="row"> {{$Category->id}}</th>
      <td> {{$Category->name}} </td>
      <td> @foreach ($Category->subCategory as $SubCategory) <div></div>{{$SubCategory->name}} <a href="{{ route('allcourses',['subCatID'=>$SubCategory->id]),}}" class="btn btn-primary">show course</a>  ,@endforeach</td> 
        
@endforeach
     
    </tr>
  }
  </tbody>
</table>