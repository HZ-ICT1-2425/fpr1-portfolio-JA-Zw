<x-layout title="Dashboard" description="Een pagina waarop te zien is hoever Adriaan is met zijn opleiding.">
    <article>
        <h1>Dashboard</h1>
        @if($courses->count() > 0)
            <table>
                <tbody>
                    <tr>
                        <th>Vak (code)</th>
                        <th>Toets</th>
                        <th>EC</th>
                        <th>Cijfer</th>
                        <th>Behaald</th>
                    </tr>
                    @foreach($courses as $course)
                        @foreach($course->tests as $test)
                            <tr>
                                @if ($loop->first)
                                    <td @if($course->getPassed()) class="sh" @endif rowspan="{{$course->tests->count()}}">{{$course->name}} ({{$course->cu_code}})</td>
                                @endif
                                <td>{{$test->name}}</td>
                                <td>{{$test->weighing_factor * $course->credits}}</td>
                                <td>{{$test->best_grade ? : "" }}</td>
                                @if(($test->best_grade ?: 0) >= $test->lowest_passing_grade) <td class="sh">{{$test->weighing_factor * $course->credits}}</td>@else <td>0</td> @endif
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>

            <p>Behaalde studiepunten: <b>{{$ecsBehaald}}</b>/{{$ecsTotaal}}EP</p>
            <meter min="0" max="{{$ecsTotaal}}" value="{{$ecsBehaald}}" low="45" optimum="60"></meter>
        @else
        Er is geen data beschikbaar.
        @endif


    </article>
</x-layout>
