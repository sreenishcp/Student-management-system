@if(isset($mark_list))
{{ Form::model($mark_list, ['route' => ['marklist.update', $mark_list->id], 'method' => 'post','files'=>true]) }}
@else
{{ Form::open(['route' => 'marklist.store']) }}
@endif
@if ($errors->any())
<div class="alert alert-danger" style="margin-left: 40%;">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<h2 style="text-align: center">Add Mark</h2>
<table class="center">
    <tr>
        <td>
            <label for="lname">Student</label>
        </td>
        <td>
            @if(isset($mark_list))
            {!!Form::select('student_id',$students,$mark_list->student_id,array('class' => 'select'))!!}
            @else
                {!!Form::select('student_id',$students,'',array('class' => 'select'))!!}
                @endif
        </td>
    </tr>
    <tr>
        <td>
            <label for="fname">Term:</label>
        </td>
        <td>
            @if(isset($mark_list))
                {!!Form::select('term',array(''=>'select','One'=>'One','Two'=>'Two'),$mark_list->term,array('class' => 'select'))!!}
            @else
                {!!Form::select('term',array(''=>'select','One'=>'One','Two'=>'Two'),'',array('class' => 'select'))!!}
            @endif
        </td>
    </tr>
    <tr>
        <td>
            <label for="lname">Maths:</label>
        </td>
        <td>
            {!! Form::number('maths', null, ['class' => '',"step"=>"any"]) !!}
        </td>
    </tr>
    <tr>
        <td>
            <label for="lname">History:</label>
        </td>
        <td>
            {!! Form::number('history', null, ['class' => '',"step"=>"any"]) !!}
        </td>
    </tr>
    <tr>
        <td>
            <label for="lname">Science:</label>
        </td>
        <td>
            {!! Form::number('science', null, ['class' => '']) !!}
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" value="Submit">
            <a href="{{url('/marklist')}}"><input type="button" value="Cancel"></a>
        </td>
    </tr>
</table>
{!! Form::close() !!}

<style>
.select
{
width: 100%
}
.center {
  margin-left: auto;
  margin-right: auto;

}
</style>