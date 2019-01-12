<ol class="list-reset overflow-visible">
    <li class="py-2">
        <a href="{{ route('agent.dashboard')}}" class="list-item-anchor">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-icon">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
            </svg>
            <span class="mx-2">Dashboard</span>
        </a>
    </li>
    <li class="py-2">
        <a href="{{ route('rent.index')}}" class="list-item-anchor">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-icon">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
            </svg>
            <span class="mx-2">Rent Roll</span>
        </a>
    </li>
    <li class="my-2">
        <a href="{{route('owner.index')}}" class="list-item-anchor">
           <svg xmlns="http://www.w3.org/2000/svg" class="side-icon" viewBox="0 0 24 24">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
            </svg>
            <span class="mx-2">Property Owners</span>
        </a>
    </li>
    <li class="my-2">
        <a href="{{route('listing.index')}}" class="list-item-anchor">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-icon">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
            </svg>
            <span class="mx-2">Properties</span>
        </a>
    </li>

    <li class="my-2">
        <a href="{{route('room.index')}}" class="list-item-anchor">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-icon">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
            </svg>
            <span class="mx-2">Units</span>
        </a>
    </li>

    <li class="my-2">
        <a href="{{ route('tenant.index') }}" class="list-item-anchor">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-icon">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
            </svg>
            <span class="mx-2">Tenants</span>
        </a>
    </li>
    <li class="my-2">
        <a href="{{ route('invoice.index',['type' => 'unpaid']) }}" class="list-item-anchor">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-icon">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
            </svg>
            <span class="mx-2">Unpaid Invoices</span>
        </a>
    </li>

    <li class="my-2">
        <a href="{{ route('invoice.index',['type' => 'paid']) }}" class="list-item-anchor">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-icon">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
            </svg>
            <span class="mx-2">Paid Invoices</span>
        </a>
    </li>

    <li class="my-2">
        <a href="{{ route('agent.payment') }}" class="list-item-anchor">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-icon">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
            </svg>
            <span class="mx-2">Payments</span>
        </a>
    </li>

    <li class="my-2">
        <a href="{{ route('agent.complains') }}" class="list-item-anchor">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-icon">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
            </svg>
            <span class="mx-2">Complains</span>
        </a>
    </li>

     <li class="my-2">
        <a href="#" class="list-item-anchor">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-icon">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
            </svg>
            <span class="mx-2">Tasks</span>
        </a>
    </li>

     <li class="my-2">
        <a href="#" class="list-item-anchor">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-icon">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
            </svg>
            <span class="mx-2">Maintainance & Expenses</span>
        </a>
    </li>

    <li class="my-2">
        <a href="#" class="list-item-anchor">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-icon">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
            </svg>
            <span class="mx-2">Bulk Sms & Email</span>
        </a>
    </li>

     <li class="my-2">
        <a href="#" class="list-item-anchor">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-icon">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
            </svg>
            <span class="mx-2">Reports</span>
        </a>
    </li>

    <li class="my-2">
        <a href="#" class="list-item-anchor">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-icon">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
            </svg>
            <span class="mx-2">Rental Default Reporting</span>
        </a>
    </li>

    <li class="my-2">
        <a href="#" class="list-item-anchor">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-icon">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
            </svg>
            <span class="mx-2">Property Insuarance</span>
        </a>
    </li>

    <li class="my-2">
        <a href="#" class="list-item-anchor">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-icon">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
            </svg>
            <span class="mx-2">Rental Tax Filling</span>
        </a>
    </li>

    <li class="my-2">
        <a href="#" class="list-item-anchor">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-icon">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
            </svg>
            <span class="mx-2">Vacant Listing</span>
        </a>
    </li>

     <li class="my-2">
        <a href="#" class="list-item-anchor">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-icon">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
            </svg>
            <span class="mx-2">Tenant Screening</span>
        </a>
    </li>
</ol>

