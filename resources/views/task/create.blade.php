@extends('layouts.layout')

@section('content')
<h2 class="rajdhani-light" style="margin-left: 15px;">CREATE NEW TASK</h2>

<form action="{{ route('task.store') }}" method="post">
    @csrf

    <!-- Project Selection Dropdown -->
    <div class="rajdhani-light" style="margin-bottom: 5px;">
        <label for="project_id" class="rajdhani-light">PROJECT :</label>
        <select id="project_id" name="project_id" class="rajdhani-light" required>
            @foreach ($projects as $project)
                <option value="{{ $project->id }}">{{ $project->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Programmer Selection Dropdown -->
    <div class="rajdhani-light" style="margin-bottom: 5px;">
        <label for="programmer_id" class="rajdhani-light">PROGRAMMER :</label>
        <select id="programmer_id" name="programmer_id" class="rajdhani-light" required>
            @foreach ($programmers as $programmer)
                <option value="{{ $programmer->id }}">{{ $programmer->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Task Kind Enum Dropdown -->
    <div class="rajdhani-light" style="margin-bottom: 5px;">
        <label for="task_kind" class="rajdhani-light">TASK KIND :</label>
        <select id="task_kind" name="task_kind" class="rajdhani-light" required>
            @foreach (['FRONTOFFICE', 'BACKOFFICE', 'DATABASE'] as $kind)
                <option value="{{ $kind }}">{{ $kind }}</option>
            @endforeach
        </select>
    </div>

    <!-- Task Description -->
    <div class="rajdhani-light" style="margin-bottom: 5px;">
        <label for="task_description">TASK DESCRIPTION :</label>
        <input type="text" id="task_description" name="task_description" required>
    </div>

    <!-- Date Deadline -->
    <div class="rajdhani-light" style="margin-bottom: 5px;">
        <label for="date_deadline">DEADLINE :</label>
        <input type="date" id="date_deadline" name="date_deadline" required>
    </div>

    <!-- Submit Button -->
    <div class="rajdhani-light" style="margin-bottom: 5px;">
        <button type="submit" class="rajdhani-light" style="align-self: flex-start; padding: 10px 20px; margin: 0px 0px 20px 0px">CREATE TASK</button>
    </div>
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <article class="grid-item rajdhani-light">
        <p class="rajdhani-light" style="color: green;">{{ session('success') }}</p>
        <p><b>TASK ID : {{ session('created_task')->id }} | Project ID : {{ session('created_task')->project_id }} | Programmer ID : {{ session('created_task')->programmer_id }}</b></p>
        <p><b>{{ session('created_task')->task_kind }} | Task Description : {{ session('created_task')->task_description }}</b></p>
        <p><b>Task progress : {{ session('created_task')->task_status }}</b></p>
    </article>
@endif

@endsection
