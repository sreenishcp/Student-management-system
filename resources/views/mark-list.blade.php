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

<h2 style="text-align: center">Mark List</h2>
<a href="{{url('/')}}"><button class="student">Home</button></a>
<a href="{{url('marklist/add-mark')}}"><button class="student">Add Mark</button></a>
<table class="center">
  <tr>
    <th style="width: 10%">#</th>
    <th>Student ID</th>
    <th>Name</th>
    <th>Maths</th>
    <th>Science</th>
    <th>History</th>
    <th>Term</th>
    <th>Total</th>
    <th>Created On</th>
    <th>Action</th>
  </tr>
  @foreach ($marklists as $marklist)
    <tr>
      <td>{{ (($marklists->currentPage() - 1 ) * $marklists->perPage() ) + $loop->iteration }}</td>
      <td>{{$marklist['student']['student_id']}}</td>
      <td>{{$marklist['student']['name']}}</td>
      <td>{{$marklist->maths}}</td>
      <td>{{$marklist->science}}</td>
      <td>{{$marklist->history}}</td>
      <td>{{$marklist->term}}</td>
      <td>{{($marklist->maths+$marklist->science+$marklist->history)}}</td>
      <td>{{date("M d,Y h:i A",strtotime($marklist->created_at))}}</td>
      <td><a href="{{url('marklist/edit/'.$marklist->id)}}"><u>Edit</u></a>/<a href="{{url('marklist/delete/'.$marklist->id)}}" onclick="return confirm('Do you want to delete?');">Delete</a> </td>
    </tr>  
  @endforeach


</table>

</body>
</html>
