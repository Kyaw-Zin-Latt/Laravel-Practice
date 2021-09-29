<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Owner</th>
        <th>Control</th>
        <th>Created_at</th>
    </tr>
    </thead>
    <tbody>
    @foreach(\App\Category::with("user")->get() as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->title }}</td>
            <td>{{ $category->user->name }}</td>
            <td>
                <a href="{{ route("category.edit",$category->id) }}" class="btn btn-outline-info">Edit</a>
                <form class="d-inline-block" action="{{ route("category.destroy",$category->id) }}" method="post">
                    @csrf
                    @method("delete")
                    <button class="btn btn-outline-danger">Delete</button>
                </form>
            </td>
            <td>
                <span class="small">
                    <i class="fas fa-calendar-alt"></i>
                    {{ $category->created_at->format("d M, Y") }}
                    <br>
                    <i class="fas fa-clock"></i>
                    {{ $category->created_at->format("h:i A") }}
                </span>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
