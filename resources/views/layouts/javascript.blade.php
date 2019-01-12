<script>
        window.App = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
            'signedIn' => Auth::check(),
            'countries' => $countries,
            'currencies' => $currencies,
            'periods' => $periods,
            'payments' => $payments,
            
        ]) !!};

    </script>
