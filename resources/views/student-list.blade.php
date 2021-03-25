<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.center {
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
.student{
    margin-left: 70%;
    margin-right: 62px;
    /* margin-top: 25px; */
    margin-bottom: 20px;
    background-color: #00adff8c;
    border-radius: 3px;
    height: 26px;
    cursor: pointer;
  }
  .marklist{
    margin-left: 70%;
    margin-right: 62px;
    /* margin-top: 25px; */
    margin-bottom: 20px;
    background-color: #546ce48c;
    border-radius: 3px;
    height: 26px;
    cursor: pointer;
  }
</style>
</head>
<body>

<h2 style="text-align: center">Student List</h2>
<a href="{{url('marklist')}}"><button class="marklist">Marklist</button></a>
<a href="{{url('student/create')}}"><button class="student">Add Student</button></a>
<table class="center">
  <tr>
    <th style="width: 10%">#</th>
    <th>Student ID</th>
    <th>Name</th>
    <th>Age</th>
    <th>Gender</th>
    <th>Reporting Teacher</th>
    <th>Action</th>
  </tr>
  @foreach ($students as $student)
    <tr>
      <td>{{ (($students->currentPage() - 1 ) * $students->perPage() ) + $loop->iteration }}</td>
      <td>{{$student->student_id}}</td>
      <td>{{$student->name}}</td>
      <td>{{$student->age}}</td>
      <td>{{$student->gender}}</td>
      <td>{{$student['teacher']['name']}}</td>
      <td><a href="{{url('student/edit/'.$student->id)}}"><u>Edit</u></a>/<a href="{{url('student/delete/'.$student->id)}}" onclick="return confirm('Do you want to delete?');">Delete</a> </td>
    </tr>  
  @endforeach


</table>

</body>
</html>
