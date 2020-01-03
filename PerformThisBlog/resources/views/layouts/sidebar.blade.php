       <!-- Sidebar navigation -->
      <div id="slide-out" class="side-nav fixed blue darken-1">
        <ul class="custom-scrollbar">
          <!-- Logo -->
          <li>
            <div class="logo-wrapper waves-light bg-white">
              <a href="#"><img src="{{asset('images/logo-small.png')}}" class="img-fluid flex-center"></a>
            </div>
          </li>
          <!--/. Logo -->
           
          

            <ul class="collapsible collapsible-accordion mt-5">
               <li><a class="text-white" href="{{route('article.create')}}">
              <i class="fas fa-chevron-right"></i> Compose </a>
            </li>

             <li><a class="text-white" href="{{route('article.index')}}">
              <i class="fas fa-chevron-right"></i> My Articles </a>
            </li>
                <li>
              @if($user->blogger)
               <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i> Profile<i
                    class="fas fa-angle-down rotate-icon"></i></a>
                <div class="collapsible-body">
                  <ul class="list-unstyled">
                    <li><a href="{{route('profile.edit', $user->blogger->id) }}"><i class="fas fa-user mr-3"></i>Edit</a>
                    </li>
                    <li><a href="{{route('profile.show', $user->blogger->slug) }}" target="_blank"><i class="fas fa-table mr-3"></i>View</a>
                    </li>

                  </ul>
                </div>
              </li>
             
              @else
              <li>
              <a class="text-white" href="{{route('profile.create') }}">
             
              <i class="fas fa-chevron-right"></i> Profile </a>
            </li>
             @endif


             

            </ul>
          </li>
          <!--/. Side navigation links -->
        </ul>
        <div class="sidenav-bg mask-strong"></div>
      </div>
      <!--/. Sidebar navigation -->