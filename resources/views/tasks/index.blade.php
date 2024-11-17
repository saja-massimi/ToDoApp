<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mx-2">
        <a class="navbar-brand" href="#">To Do App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tasks.index')}}">All Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Add Task</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">Log Out</a>

                    </form>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h1>Welcome to The To Do App</h1>

        <a href="{{ route('tasks.create')}}" class="btn btn-primary">Add Task</a>
        <br>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Task</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Status</th>
                    <th scope="col" colspan="2" class="center">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($tasks as $task)



                <tr>
                    <th scope="row">{{$task->task_id}}</th>
                    <td>{{$task->title}}</td>
                    <td>{{$task->priority}}</td>
                    <td>{{$task->due_date}}</td>
                    <td>{{ $task->status ? 'Completed' : 'In Progress' }}</td>


                    <td><a href="{{ route('tasks.edit', $task->task_id) }}" class="btn btn-primary">Edit</a></td>
                    <td><a href="{{ route('tasks.destroy', $task->task_id) }}" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>