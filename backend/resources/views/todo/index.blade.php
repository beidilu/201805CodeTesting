<!DOCTYPE html>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
</head>

<body>

<div >
    <div class="container">
        <div class="col-md-offset-2 col-md-8">
            <div class="row">
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
                <form action="{{ route('todos.store')  }}" method = 'POST'>
                    {{ csrf_field()  }}

                    <p>Input something in the input box:</p>
                      <input type="text" name="taskname"  >
                    <p>Status: <input type="checkbox" name="status"></p>
                    
                    <div >
                        <input type="submit" class="btn btn-primary " value="Add Task">
                    </div>
                </form>

                @if (count($storedTasks) > 0)
                  <table class="table">
                    <thead>
                      <th>Task #</th>
                      <th>Name</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </thead>

                    <tbody>
                      @foreach ($storedTasks as $storedTask)
                        <tr>
                          <th>{{ $storedTask->id }}</th>
                          <td>{{ $storedTask->name }}</td>

                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                @endif

            </div>
            <ul>
                <li>Bug milk</li>
                <li>Code</li>
                <li>Sleep</l
            </ul>            
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="./js/todoapp.js"></script>

</body>
</html>