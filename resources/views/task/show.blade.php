@extends('layouts.layout')

@section('content')

    <h2 class="rajdhani-light" style="margin-left: 15px;">SEARCH->UPDATE/DELETE TASK</h2>

    <!-- Task Selection Form -->
    <form action="{{ route('task.show') }}" method="GET" style="margin-left: 15px; margin-bottom: 15px;">
        @csrf
        <label for="id_task" class="rajdhani-light">CHOOSE A TASK :</label>
        <select name="id_task" id="id_task" class="rajdhani-light">
            @foreach ($tasks as $task)
                <option value="{{ $task->id }}" {{ ($selectedTask && $selectedTask->id == $task->id) ? 'selected' : '' }}>
                    {{ $task->id }} - {{ $task->task_description }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="rajdhani-light" style="padding: 8px 15px; margin-left: 10px;">VIEW TASK</button>
    </form>

    @if ($selectedTask)
        <div class="rajdhani-light" style="margin-left: 10px; margin-bottom: 15px;">
            <article class="grid-item">

                <p><b>TASK ID:</b> {{ $selectedTask->id }} | <b>Project ID:</b> {{ $selectedTask->project_id }} | <b>Programmer ID:</b> {{ $selectedTask->programmer_id }}</p>
                <p><b>{{ $selectedTask->task_kind }}</b> | <b>Description:</b> {{ $selectedTask->task_description }}</p>
                <p><b>Task progress:</b> {{ $selectedTask->task_status }}</p>

                @if($selectedTask->date_init)
                    <p><b>Started:</b> {{ $selectedTask->date_init }}</p>
                @endif
                @if($selectedTask->date_delivered)
                    <p><b>Delivered:</b> {{ $selectedTask->date_delivered }}</p>
                @endif
                @if($selectedTask->date_approved)
                    <p><b>Released:</b> {{ $selectedTask->date_approved }}</p>
                @endif

            </article>
        </div>

        <div class="rajdhani-light" style="display: flex; align-items: flex-start; padding: 0px 10px 20px 15px;">
            <!-- UPDATE BUTTON -->
            <form action="{{ route('task.update', $selectedTask->id) }}" method="GET">
                <button type="submit" class="rajdhani-light" style="padding: 10px 20px; margin: 0px 10px 20px 0px;">UPDATE TASK</button>
            </form>

            <!-- DELETE FORM -->
            <form action="{{ route('task.delete', $selectedTask->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="rajdhani-light" style="padding: 10px 20px; margin: 0px 10px 20px 0px;">DELETE TASK</button>
            </form>
        </div>
    @else
        <p>No tasks available.</p>
    @endif

@endsection