@extends('app')

@section('content')
<div class = "container w-25 border p-4 my-4">
 <div class = "row mx-auto">
  <form action = "{{ route('categories.update', ['category'=>$category->id]) }}" method = "POST">
    @method('PATCH')
   @csrf
   @if (session('success'))
  <h6 class = "alert alert-success">{{ session('success')}}</h6>    
  @endif
  @error('name')
  <h6 class = "alert alert-danger">{{$message}}</h6>    
  @enderror
   <div class="mb-3">
    <label for="name" class="form-label">Titulo Categoria:</label>
    <input type="text" name="name" class="form-control" value = "{{$category->name}}">    
   </div>  
   <div class="mb-3">
    <label for="color" class="form-label">Color:</label>
    <input type="color" name="color" class="form-control">    
  </div>  
  <button type="submit" class="btn btn-primary">Actualizar categoria</button>
  </form>
  @if ($category->todos->count()> 0 )
  @foreach ( $category-> todos as $todo )
  <div class = "row py-1">
     <div class = "col-md-9 d-flex align-items-center">
      <a href="{{ route('todos-show', ['id' => $todo->id])}} ">{{$todo->title}}</a>
     </div>
     <div class = "col-md-3 d-flex justify-content-end">
       <form action="{{ route('todos-destroy', [$todo->id]) }}" method = "POST">
       @method('DELETE')
       @csrf
       <button type = "submit" class = "btn btn-danger btn-sm">Eliminar</button>
       </form>
      </div>
   </div>  
  @endforeach  
  @else
  No tiene tareas asociadas
  @endif
  <div>         
  </div>
</div>
@endsection