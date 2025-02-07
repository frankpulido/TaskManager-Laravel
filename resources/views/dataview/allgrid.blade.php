@extends('layouts.layout')

@section('title', $title ?? 'All Tasks Grid View')

@section('content')
<section class="grid-container">
    <section class="nested-grid rajdhani-light">
        @if (!empty($tasks))
            @foreach ($tasks as $task)
                <article class="grid-item">
                    <p><b>TASK ID</b> : <b>{{ $task['id'] }}</b> | Project ID : {{ $task['project_id'] }} | Programmer ID : {{ $task['programmer_id'] }}</p>
                    <p><b>{{ $task['task_kind'] }}</b> | Description : {{ $task['task_description'] }}</p>
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

                </article>
            @endforeach
        @else
            <p>No tasks in this status.</p>
        @endif
    </section>
</section>
@endsection