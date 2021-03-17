
<div class="card mb-3">
  <img src="https://www.indstate.edu/sites/default/files/media/Images/Banners/banner-international.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">List Of Students</h5>
    <p class="card-text">You can find all the information of Students here.</p>
  
    <table class="table">
      <thead class="thead-light">
        <tr>
          <th scope="col">CNE</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Age</th>
          <th scope="col">Last Name</th>
          <th scope="col">Operations</th>
        </tr>
      </thead>
      <tbody>
        @foreach($students as $student)
        <tr>
          <td>{{$student->cne}}</td>
          <td>{{$student->FirstName}}</td>
          <td>{{$student->LastName}}</td>
          <td>{{$student->age}}</td>
          <td>{{$student->specialty}}</td>
          <td>
            <a href="{{ url('/edit/'.$student->id) }}" class="btn btn-sm btn-warning">Edit</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>



