<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("タスク一覧") }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto p-10">
        @foreach($tasks as $task)
            <x-tasks.task-card-short :task="$task" />
        @endforeach
    </div>
</x-app-layout>
