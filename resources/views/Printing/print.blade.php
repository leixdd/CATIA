

<div class="table-responsive">
  <table class="table table-bordered table-condensed table-hover" id="dataTable">
    <thead>
      <tr>
        <th>id</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Middlename</th>
        <th class="text-center">Course Fee</th>
        <th class="text-center">Payment</th>
        <th class="text-center">Balance</th>
      </tr>
    </thead>
    <tbody>
      @foreach($app_pro as $list_app)
      <tr>
        @foreach($list_app->other_infos as $list_app3)
          @foreach($course_x as $key => $value)
            @if($key == $list_app3->course_id)
              @if($value == "Computer Systems Servicing NCII")
              <td>{{$list_app->id}}</td>
              <td>{{$list_app->first_name}}</td>
              <td>{{$list_app->last_name}}</td>
              <td>{{$list_app->middle_name}}</td>
                @foreach($param as $key => $value)
                  @if($key == $list_app3->course_id)
                  <td class="text-center">{{$value}}</td>
                  @endif
                @endforeach
              <td class="text-center">{{$list_app3->App_Payment}}</td>
              <td class="text-center">{{$list_app3->remBal}}</td>
            </tr>
              @endif
            @endif
          @endforeach
        @endforeach
      @endforeach
    </tbody>
  </table>

</div>
