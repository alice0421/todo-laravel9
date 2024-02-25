@props(['task'])

@php
$today = (new DateTime())->setTime(0, 0, 0)->format('Y-m-d');
$interval = (new DateTime())->setTime(0, 0, 0)->diff((new DateTime($task->end_date))->setTime(0, 0, 0))->days;
@endphp

<div class="w-[450px] h-[200px] bg-white p-5 shadow-md rounded-lg mb-2 grid grid-cols-8 grid-rows-3 gap-x-4 place-items-center">
    <input 
        type="checkbox"
        class="col-start-1 col-end-2 row-start-1 row-end-2 w-6 h-6 rounded-full text-gray-400 focus:ring-0 focus:ring-transparent"
    >
    <h1 class="col-start-2 col-end-9 row-start-1 row-end-2 w-full text-2xl font-semibold underline">
        {{ $task->name }}
    </h1>
    <p class="col-start-2 col-end-9 row-start-2 row-end-3 w-full h-full text-base line-clamp-2">
        {{ $task->description }}
    </p>
    <div class="col-start-2 col-end-9 row-start-3 row-end-4 place-self-end w-full flex justify-between">
        @if($today < $task->end_date && $interval == 1)
            <p class="text-base">〆 明日</p> <!-- 終了日が明日 ->「明日」と表示 -->
        @elseif($task->start_date < $task->end_date && $today < $task->start_date)
            <p class="text-base">{{ $task->start_date }} ~</p> <!-- 終了日が明日でない && 開始日と終了日が違う && 開始日が今日より前 -> 開始日を表示 -->
        @elseif($interval == 0) 
            <p class="text-base text-blue-600 font-semibold">〆 今日</p> <!-- 終了日が今日 ->「今日」と青く表示 -->
        @elseif($task->end_date < $today)
            @if($interval == 1) 
                <p class="text-base text-red-600 font-semibold">〆 昨日</p> <!-- 終了日が昨日 -> 「昨日」と赤く表示 -->
            @elseif(1 < $interval && $interval < 7) 
                <p class="text-base text-red-600 font-semibold">〆 {{ $interval }}日前</p> <!-- 終了日が1週間以内前 -> 「◯日前」と赤く表示 -->
            @elseif(7 < $interval && $interval < 30)
                <p class="text-base text-red-600 font-semibold">〆 {{ floor($interval / 7) }}週間前</p> <!-- 終了日が1週間以上前 -> 「◯週間前」と赤く表示 -->
            @elseif(30 <= $interval)
                <p class="text-base text-red-600 font-semibold">〆 1ヶ月以上前</p> <!-- 終了日が30日以上前 -> 「1ヶ月以上前」と赤く表示 -->
            @endif
        @else
            <p class="text-base">〆 {{ $task->end_date }}</p> <!-- 開始日 < 今日 < 終了日 -> 終了日を表示 -->
        @endif
        <a href="#">
            <button
                type="button"
                class="w-32 h-6 rounded-full text-base text-center"
                style="background-color: {{ $task->category->color }};"
            >
                {{ $task->category->name }}
            </button>
        </a>
    </div>
</div>
