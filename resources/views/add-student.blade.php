    @if(isset($student))
        {{ Form::model($student, ['route' => ['student.update', $student->id], 'method' => 'post','files'=>true]) }}
    @else
        {{ Form::open(['route' => 'student.store']) }}
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h2 style="text-align: center">Add Students</h2>
    <table class="center">
        <tr>
            <td>
                <label for="fname">Name:</label>
            </td>
            <td>
                {!! Form::text('name', null, ['class' => '']) !!}
            </td>
        </tr>
        <tr>
            <td>
                <label for="lname">Age:</label>
            </td>
            <td>
                {!! Form::number('age', null, ['class' => '']) !!}
            </td>
        </tr>
        <tr>
            <td>
                <label for="lname">Gender:</label>
            </td>
            <td>
                {!! Form::radio('gender', 'M','', ['class' => '']) !!}Male
                {!! Form::radio('gender', 'F', '',['class' => '']) !!}Female
            </td>
        </tr>
        <tr>
            <td>
                <label for="lname">Teacher</label>
            </td>
            <td>
                @if(isset($student))
                {!!Form::select('teacher_id',$teachers,$student->teacher_id,array('class' => 'select'))!!}
             @else
                 {!!Form::select('teacher_id',$teachers,'',array('class' => 'select'))!!}
                 @endif
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="Submit">
                <a href="{{url('/')}}"><input type="button" value="Cancel"></a>
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