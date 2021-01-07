<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>My Photos</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
  
    <table class="table table-bordered">
        <tr>
            
            <th>Image</th>
            <th style="width: 25%">Title</th>
            <th style="width: 25%">Description</th>
            <th style="width: 25%">Action</th>
            <th style="width: 25%">Comments</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            
            <td><img src="{{ Storage::url($post->image) }}" height="300" width="" alt="" /></td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->description }}</td>

            
            <td>

                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
            <td>
                <div class="input-group mb-3">
  <div class="input-group-prepend">
    <button class="btn btn-outline-secondary" type="button">Submit</button>
  </div>
  <input type="text" class="form-control" placeholder="Add Comment" aria-label="" aria-describedby="basic-addon1">
</div>
            </td>
        </tr>
        @endforeach
    </table>

  
    {!! $posts->links() !!}
</body>
</html>