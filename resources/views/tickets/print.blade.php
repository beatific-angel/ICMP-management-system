<center>
    <h1>Ticket Information</h1>
    <table class="table" >
        <tr><th>Id</th><th>Name</th><th>Email</th><th>Course</th></tr>
        @foreach($students as $student)
            <tr><td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->course }}</td> </tr>
</center>
