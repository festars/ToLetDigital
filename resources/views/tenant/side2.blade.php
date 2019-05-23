<ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('tenant.dashboard') }}">
              <i class="ni ni-tv-2 text-primary"></i> Tenants
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('tenant.invoice',['type' => 'paid']) }}">
              <i class="ni ni-planet text-blue"></i> Paid Invoices
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('tenant.invoice',['type' => 'unpaid']) }}">
              <i class="ni ni-pin-3 text-orange"></i> Unpaid Invoices
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/tenant/tasks">
              <i class="ni ni-single-02 text-yellow"></i> Tasks
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('complains.index') }}">
              <i class="ni ni-bullet-list-67 text-red"></i> Complains
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/tenant/notices">
              <i class="ni ni-key-25 text-info"></i> Online Notices
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/tenant/reports" >
              <i class="ni ni-circle-08 text-pink"></i> Reports
            </a>
          </li>
         
          
        </ul>