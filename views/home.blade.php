@extends('app')
@section('title')
{{$title}}
@endsection
@section('content')
@if ( !$domains->count() )
There is no e-mail domain!
@else
<div class="">
  @foreach( $domains as $domain )
  <div class="list-group">
	<div class="table">
			<?php
				$servername = "localhost";
				$username = "root";
				$password = "root";
				$dbname = "BEC";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} 

				$sql = "SELECT id, firstname, lastname FROM MyData";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					echo "<table><tr><th>ID</th><th>Name</th></tr>";
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td></tr>";
					}
					echo "</table>";
				} else {
					echo "0 results";
				}
				$conn->close();
			?>
		</div>
    <div class="list-group-item">
      <h3><a href="{{ url('/'.$domains->slug) }}">{{ $domains->title }}</a>
          @if($domain->active == '1')
          <button class="btn" style="float: right"><a href="{{ url('edit/'.$domain->slug)}}">Edit Domain</a></button>
          @else
          <button class="btn" style="float: right"><a href="{{ url('edit/'.$domain->slug)}}">Edit Draft</a></button>
          @endif
        @endif
      </h3>
      <p>{{ $domain->created_at->format('M d,Y \a\t h:i a') }}</a></p>
    </div>
    <div class="list-group-item">
      <article>
        {!! str_limit($domain->body, $limit = 1500, $end = '....... <a href='.url("/".$domain->slug).'>Read More</a>') !!}
      </article>
    </div>
  </div>
  @endforeach
  {!! $domains->render() !!}
</div>
@endif
@endsection