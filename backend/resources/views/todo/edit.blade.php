@if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Error:</strong>
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
@endif
<form action="{{route('todos.update', [$selected->id]) }}" method = 'Post'>
	{{ csrf_field()  }}
	<input type="hidden" name="_method" value="put">
	<input type="text" value= "{{$selected->task}}" name = "newtaskname">
	<input type="submit">
	<a href="{{ route('todos.index')  }}">back</a>

</form>