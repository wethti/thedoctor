@extends('layouts.main')
@section('content')

<div>
    <h1>Subsections</h2>
    <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($subsections as $subsection)
            <tr>
                <td>{{ $subsection->id }}</td>
                <td>{{ $subsection->title }}</a></td>
                <td>{{ $subsection->description }}</td>
            </tr>
        @endforeach
        </tbody>
        </table>
        
    <div>
      <a href="{{ route('subsection.create') }}" class="btn-submit">Add subsection</a>
    </div>
</div>

@endsection