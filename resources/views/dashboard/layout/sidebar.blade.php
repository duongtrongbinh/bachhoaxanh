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
          <li class="nav-item">
              <a class="nav-link " href="/vouchers">
                  <i class="bi bi-grid"></i>
                  <span>Vouchers</span>
              </a>
          </li>

          <li class="nav-item">
              <a class="nav-link " href="/flash-sales">
                  <i class="bi bi-grid"></i>
                  <span>Flash Sale</span>
              </a>
          </li>

          <li class="nav-item">
              <a class="nav-link " href="/admin/orders">
                  <i class="bi bi-grid"></i>
                  <span>orders</span>
              </a>
          </li>
      </ul>
  </aside><!-- End Sidebar-->
