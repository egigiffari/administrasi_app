<!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <!-- Profile Icon -->
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset(Auth::user()->image) }}" alt="">{{Auth::user()->name}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="{{route('user.profile')}}"> Profile</a></li>
                    <li>
                      <a href="{{route('user.edit', Auth::id())}}">
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}<i class="fa fa-sign-out pull-right"></i></a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  </ul>
                </li>
                <!-- /Profile Icon -->

                <!-- Notification -->
                <li role="presentation" id="notification-group" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    @inject('notifications', 'App\Notification')
                    <?php $notification = $notifications::where('user_id', Auth::id())->where('is_read', 0)->limit(6)->get(); ?>

                    @if(count($notification) > 0)                   
                    <span class="badge bg-green">{{ count($notification) }}</span>
                    @endif
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    @foreach ($notification as $notif)
                    @if($notif->request_id != 0)
                    <li>
                      <a href="{{ route('request.pengajuan.show', $notif->request_id) }}">
                        <span class="image"><img src="{{asset($notif->request->applicant->image)}}" alt="Profile Image" /></span>
                        <span>
                          <span class="btn btn-info btn-xs"><strong>{{ substr($notif->request->applicant->name, 0, 13)}}</strong></span>
                          <span class="time">{{ $notif->updated_at->diffForHumans() }}</span>
                          <br>
                          @if($notif->request->status == 'on proses')
                          <span class="btn btn-primary btn-xs">{{$notif->request->status}}</span>
                          @elseif($notif->request->status == 'revision')
                          <span class="btn btn-warning btn-xs">{{$notif->request->status}}</span>
                          @elseif($notif->request->status == 'perbaikan')
                          <span class="btn btn-danger btn-xs">{{$notif->request->status}}</span>
                          @elseif($notif->request->status == 'hold')
                          <span class="btn btn-info btn-xs">{{$notif->request->status}}</span>
                          @elseif($notif->request->status == 'approve')
                          <span class="btn btn-success btn-xs">{{$notif->request->status}}</span>
                          @endif
                        </span>
                        <br>
                        <span class="message">
                          {{$notif->request->code . ' - ' . $notif->request->categories->name}}
                        </span>
                      </a>
                    </li>
                    <!-- @elseif($notif->request_report_id != 0)
                      <li>
                        <a href="{{ route('request.report.show', $notif->request_report_id) }}">
                          <span class="image"><img src="{{asset($notif->report->applicant->image)}}" alt="Profile Image" /></span>
                          <span>
                            <span class="btn btn-info btn-xs"><strong>{{ substr($notif->report->applicant->name, 0, 13) }}</strong></span>
                            <span class="time">{{ $notif->updated_at->diffForHumans() }}</span>
                            <br>
                            @if($notif->report->status == 'on proses')
                            <span class="btn btn-primary btn-xs">{{$notif->report->status}}</span>
                            @elseif($notif->report->status == 'revision')
                            <span class="btn btn-warning btn-xs">{{$notif->report->status}}</span>
                            @elseif($notif->report->status == 'perbaikan')
                            <span class="btn btn-danger btn-xs">{{$notif->report->status}}</span>
                            @elseif($notif->report->status == 'hold')
                            <span class="btn btn-info btn-xs">{{$notif->report->status}}</span>
                            @elseif($notif->report->status == 'approve')
                            <span class="btn btn-success btn-xs">{{$notif->report->status}}</span>
                            @endif
                            </span>
                          <span class="message">
                            {{'Laporan ' . $notif->report->categories->name}}
                          </span>
                        </a>
                      </li> -->
                      @endif
                    @endforeach()
                    <!-- <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li> -->
                  </ul>
                </li>
                <!-- /Notification -->
              </ul>
            </nav>
          </div>
        </div>
<!-- /top navigation -->