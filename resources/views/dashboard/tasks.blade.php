<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


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


                            <td>
                                <form method="POST" action="{{ route('tasks.destroy' , $task->task_id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('tasks.destroy', $task->task_id) }}" class="btn btn-danger" onclick="event.preventDefault();
                                                this.closest('form').submit();">Delete</a>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>


    </x-app-layout>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>