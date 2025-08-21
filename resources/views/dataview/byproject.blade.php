@extends('layouts.layout')

@section('title', $title ?? 'Tasks By Project')

@section('content')
<section class="grid-container">
    <section class="nested-grid rajdhani-light">
        @if (!empty($by_project_tasks))
            @foreach ($by_project_tasks as $project_id => $tasks)
                <article class="grid-item">
                    <h3><b> Project ID : {{ $project_id }} | Title : {{ $projects[$project_id]['name'] }} </b></h3>
                    @if($projects[$project_id]['delivered'])
                        <h3 style="color: green;"><b>PROJECT RELEASED</b></h3>
                    @endif

                    @foreach ($tasks as $task)
                        <hr>
                        <p><b>TASK ID : {{ $task['id'] }} | Project ID : {{ $task['project_id'] }} | Programmer ID : {{ $task['programmer_id'] }}</b></p>
                        <p><b>{{ $task['task_kind'] }} | Description : {{ $task['task_description'] }}</b></p>
                        <p><b>Task progress : {{ $task['task_status'] }}</b></p>
                        
                        @if (!empty($task['date_init']))
                            <p>Started : {{ $task['date_init'] }}</p>
                        @endif
                        @if (!empty($task['date_delivered']))
                            <p>Delivered : {{ $task['date_delivered'] }}</p>
                        @endif
                        @if (!empty($task['date_approved']))
                            <p>Released : {{ $task['date_approved'] }}</p>
                        @endif

                        @if (empty($task['date_approved']))
                            @php
                                $deadline = \Carbon\Carbon::parse($task['date_deadline']);
                                $daysLeft = now()->diffInDays($deadline);
                            @endphp
                            @if ($daysLeft >= 0)
                                <p style="color: green;">Deadline {{ date('Y-m-d', $deadline->timestamp) }}. Days to deadline: {{ (int)$daysLeft }}</p>
                            @else
                                <p style="color: red;">Deadline {{ date('Y-m-d', $deadline->timestamp) }}. Behind schedule: {{ abs((int)$daysLeft) }} days</p>
                            @endif
                        @endif

                    @endforeach
                </article>
            @endforeach
        @else
            <p>No tasks in database.</p>
        @endif
    </section>
</section>
@endsection