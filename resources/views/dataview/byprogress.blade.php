@extends('layouts.layout')

@section('title', $title ?? 'Tasks By Progress')

@section('content')
<section class="grid-container-cases-4">
    @foreach ($categorizedTasks as $progress => $tasks)
        <section class="nested-grid-cases rajdhani-light">
            <h2>{{ strtoupper($progress) }}</h2>
            @if (!empty($tasks))
                @foreach ($tasks as $task)
                    <article class="grid-item">
                        <p><b>TASK ID</b> : <b>{{ $task['id'] }}</b> | Project ID : {{ $task['project_id'] }} | Programmer ID : {{ $task['programmer_id'] }}</p>
                        <p><b>{{ $task['task_kind'] }}</b> | Description : {{ $task['task_description'] }}</p>
                        <p>Task progress : {{ $task['task_status'] }}</p>
                        
                        @if (!empty($task['date_init']))
                            <p>Started : {{ $task['date_init'] }}</p>
                        @endif
                        @if (!empty($task['date_delivered']))
                            <p>Delivered : {{ $task['date_delivered'] }}</p>
                        @endif
                        @if (!empty($task['date_approved']))
                            <p>Released : {{ $task['date_approved'] }}</p>
                        @endif
                        
                    </article>
                @endforeach
            @else
                <p>No tasks in this status.</p>
            @endif
        </section>
    @endforeach
</section>
@endsection