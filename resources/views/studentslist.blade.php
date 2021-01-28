
<div class="card mb-3">
    <img src="https://cdn.pixabay.com/photo/2019/04/14/10/27/book-4126483_1280.jpg" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">List of students</h5>
        <p class="card-text">You can find here all the informatins about students in the system</p>

        <div class="col-md-12">
            <form action="search" method="GET">
                <div class="input-group">
                    <input placeholder="Enter student's first name" type="search" name="search" class="form-control" style="width: 200px">
                    <span class="input-group-prepend">
                        <p>
                        <button type="submit" class="btn btn-primary" style="margin-left: 30px" >Search</button>
                        </p>
                            <a href="{{url('/')}}">
                                
                                <button  type="sumbit" class="btn btn-dark" style="margin-left: 30px">   Clear</button>
                                      
                                    
                                
                            </a>
                    </span>
                </div>
            </form>
        </div>


        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">CNE</th>
                <th scope="col">First name</th>
                <th scope="col">Second Name</th>
                <th scope="col">Age</th>
                <th scope="col">Speciality</th>
                <th scope="col">Operations</th>

            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->cne }}</td>
                    <td>{{ $student->firstName }}</td>
                    <td>{{ $student->secondName }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->speciality }}</td>
                    <td>

                        <a href="{{ url('/edit/'.$student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ url('/destroy/'.$student->id) }}" class="btn btn-sm btn-warning">Delete</a>

                    </td>


                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>






