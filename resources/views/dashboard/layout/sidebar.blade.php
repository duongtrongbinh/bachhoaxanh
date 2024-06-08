  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              <a class="nav-link " href="{{ route('dashboard') }}">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard</span>
              </a>
          </li><!-- End Dashboard Nav -->
          @foreach (config('sidebar') as $item)
              <li class="nav-heading">{{ $item['title'] }}</li>
              @foreach ($item['subtitle'] as $value)
                  <li class="nav-item">
                      <a class="nav-link collapsed" href="#">
                          <i class="{{ $value['icon'] }}"></i>
                          <span>{{ $value['title'] }}</span>
                      </a>
                  </li><!-- End Profile Page Nav -->
              @endforeach
          @endforeach
{{--          User--}}
          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#user" data-bs-toggle="collapse" href="#">
                      <i class="bi bi-journal-text"></i><span>Khách Hàng</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="user" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('user.create') }}">
                          <i class="bi bi-circle"></i><span>Thêm mới</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('user.index') }}">
                          <i class="bi bi-circle"></i><span>Danh sách khách hàng</span>
                      </a>
                  </li>
              </ul>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#comment" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-journal-text"></i><span>Bình luận</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="comment" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('comment.index') }}">
                          <i class="bi bi-circle"></i><span>Danh sách bình luận</span>
                      </a>
                  </li>
              </ul>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#post" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-journal-text"></i><span>Bài viết</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="post" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('post.create') }}">
                          <i class="bi bi-circle"></i><span>Thêm mới</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('post.index') }}">
                          <i class="bi bi-circle"></i><span>Danh sách bài viết</span>
                      </a>
                  </li>
              </ul>
          </li>
      </ul>
  </aside><!-- End Sidebar-->
