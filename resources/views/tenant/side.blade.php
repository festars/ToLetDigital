<ol class="list-reset">
    <li class="py-2">
        <a href="{{ route('tenant.dashboard') }}" class="list-item-anchor">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-icon">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
            </svg>
            <span class="mx-2">Tenant</span>
        </a>
    </li>
    <li class="my-2">
        <a href="{{ route('tenant.invoice',['type' => 'paid']) }}" class="list-item-anchor">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-icon">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
            </svg>
            <span class="mx-2">Paid Invoices</span>
        </a>
    </li>

     <li class="my-2">
        <a href="{{ route('tenant.invoice',['type' => 'unpaid']) }}" class="list-item-anchor">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-icon">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
            </svg>
            <span class="mx-2">Unpaid Invoices</span>
        </a>
    </li>

    <li class="my-2">
        <a href="/tenant/tasks" class="list-item-anchor">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-icon">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
            </svg>
            <span class="mx-2">Tasks</span>
        </a>
    </li>

    <li class="my-2">
        <a href="{{ route('complains.index') }}" class="list-item-anchor">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-icon">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
            </svg>
            <span class="mx-2">Complains</span>
        </a>
    </li>


     <li class="my-2">
        <a href="/tenant/notices" class="list-item-anchor">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-icon">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
            </svg>
            <span class="mx-2">Online Notices</span>
        </a>
    </li>
    
     <li class="my-2">
        <a href="/tenant/reports" class="list-item-anchor">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-icon">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
            </svg>
            <span class="mx-2">My Reports</span>
        </a>
    </li>
</ol>

