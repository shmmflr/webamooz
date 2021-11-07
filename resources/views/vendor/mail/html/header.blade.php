<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="{{asset('img/weblogo.png')}}"
                     style="height: auto!important;width: auto!important;"
                     class="logo"
                     alt="My Logo">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
