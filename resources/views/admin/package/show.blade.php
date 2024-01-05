@extends('admin.layout.app')

@section('content')
<div class="dashboard-box table-opp-color-box">
  <h4>Packages List</h4>
  {{-- <p>Nonummy hac atque adipisicing donec placeat pariatur quia ornare nisl.</p> --}}
  <div class="table-responsive">
      <table class="table">
          <thead>
              <tr>
                  <th>Name</th>
                  <th>Date</th>
                  <th>Destination</th>
                  <th>status</th>
                  <th>action</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($packages as $package)
            <tr>
              <td>
                  <span class="package-name">{{$package->title}}</span>
              </td>
              <td>{{$package->date}}</td>
              <td>{{$package->destination}}</td>
              <td><span class="badge text-white {{$package->status=='active'?'bg-success':($package->status=='pending'? 'bg-warning':'bg-danger')}}">{{$package->status=='active'?'Active':($package->status=='pending'? 'Pending':'Epired')}}</span></td>
              <td class="d-flex justify-content-between ">
                <a class="btn btn-warning" href="{{route('Packages.edit',$package->id)}}"><i class="far fa-edit text-white"></i></a>
                
                <form method="POST" action="{{route('Packages.destroy',$package->id)}}">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt text-white"></i></button>
                </form>
                
              </td>
          </tr>
            @endforeach
          </tbody>
      </table>
  </div>
</div>
<div class="d-flex justify-content-center">
  {{$packages->links()}}
</div>
@endsection